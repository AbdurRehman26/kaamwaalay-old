<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Campaign;
use App\Data\Models\User;
use App\Notifications\CampaignNotification;
use Cache;
class CampaignRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Campaign Class.
     *
     * @var    object
     * @access public
     **/
    public $model;

    /**
     * This is the prefix of the cache key to which the
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
     *
     * Example: Campaign-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'campaign';
    protected $_cacheTotalKey = 'total-campaign';

    public function __construct(Campaign $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->serviceProviderProfileRepo = app('ServiceProviderProfileRepository');

    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = Cache::get($this->_cacheKey.$id);

        if ($data == null || $refresh == true) {
            $query = $this->model->with('plan')->find($id);
            if ($query != null) {

                $data = new \stdClass;
                foreach ($query->getAttributes() as $column => $value) {
                    $data->{$column} = $query->{$column};
                }

                $data->plan = $query->plan;
                Cache::forever($this->_cacheKey.$id, $data);
            } else {
                return null;
            }
        }
        return $data;
    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {
        $this->builder = $this->builder
            ->where('user_id', '=', $data['user_id'])
            ->orderByRaw("FIELD(STATUS, 'pending') DESC");   
        return  parent::findByAll($pagination, $perPage);
    
    }

    public function create(array $input = [])
    {
        
        $return = parent::create($input);
        if($return) {
            $this->serviceProviderProfileRepo->update(['id'=>$input['user_id'],'is_featured'=>1]);
        }

        return $return;
        
    }

    public function updateCampaign($input)
    {
        $model = $this->model
            ->where('user_id', '=', $input['service_provider_user_id'])
            ->where('is_completed', '=', 0)
            ->where('status', '!=', Campaign::EXPIRED)
            ->first();
        if($model) {
            if($input['type'] == 'view') {
                $model->views++;
            }else{
                $model->clicks++;
            }

            $getPlanViews = $this->findById($model->id);
            $consumptionPercent = round(($model->clicks/$model->views)*100);
            $consumption = (int) $consumptionPercent;
            $intervals = [25,50,75,100];
            if(in_array($consumption, $intervals)){
                $data = new \stdClass;
                $data->user_id = $model->user_id;
                $data->remaining_views = ($getPlanViews->plan->quantity-$model->views).' view(s)';
                $data->title = $getPlanViews->plan->quantity.' view(s)';
                $data->consumption = $consumption.'%';
                $user = User::find($data->user_id);
                $data->message = $user->first_name.' '.$user->last_name.' , you have used '.$data->consumption.' of '.$data->title.'. Remaining '.$data->remaining_views; 
                $this->sendNotification($data);
            }
            if($getPlanViews && !empty($getPlanViews->plan->quantity) && $model->views == $getPlanViews->plan->quantity ) {
                $model->is_completed = 1;
                $model->status = Campaign::EXPIRED;
            }

            if($model->save()) {
                Cache::forget($this->_cacheKey.$model->id);
                $planCount = $this->model->where('user_id','=', $input['service_provider_user_id'])->where('status', '!=', Campaign::EXPIRED)->count();
                if($planCount == 0){
                    $serviceProviderProfile = $this->serviceProviderProfileRepo->findByAttribute('user_id',$input['service_provider_user_id']);
                    $this->serviceProviderProfileRepo->update(['id' => $serviceProviderProfile->id,'is_featured'=> 0 ]);
                    $data = new \stdClass;
                    $data->user_id = $model->user_id;
                    $data->message = 'Your featured profile subscription has ended. To restart this subscription, you must purchase the subscription again.'; 
                    $this->sendNotification($data);
                }
                return true;
            }

        }

        return false;
    }
    public function sendNotification($data){
           $event = new \StdClass();
           $event->body =  $data; 
           $event->to = User::find($data->user_id);   
           $event->message = $data->message;
           $event->to->notify(new CampaignNotification($event));
    }
}
