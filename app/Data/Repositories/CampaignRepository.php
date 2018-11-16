<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Campaign;
use App\Data\Models\User;
use App\Data\Models\Plan;
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
        $data = parent::findById($id, $refresh, $details, $encode);
        if($data) {
            $planQuery = Plan::where('id','=',$data->plan_id)->withTrashed()->first();
            if ($planQuery) {
                $data->plan = $planQuery;    
            }
            return $data;
        }
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
        $checkOtherCampaigns = false;
        if($model) {
            if($input['type'] == 'view') {
                $model->views++;
            }else{
                $model->clicks++;
            }

            $getPlanViews = $this->findById($model->id);
            $planViewsCount = $getPlanViews->plan->quantity;
            $myView = $getPlanViews->views;
            $intervals = [];
            $intervals["25"] = (int)ceil((25/100) * $planViewsCount);
            $intervals["50"] = (int)ceil((50/100) * $planViewsCount);
            $intervals["75"] = (int)ceil((75/100) * $planViewsCount);

            if(in_array($myView, $intervals)){
                $data = new \stdClass;
                $data->user_id = $model->user_id;
                $data->remaining_views = ($getPlanViews->plan->quantity-$myView).' view(s)';
                $data->title = $getPlanViews->plan->quantity.' view(s)';
                $data->consumption = array_search($myView, $intervals).'%';
                $user = User::find($data->user_id);
                $data->message = '<strong>'.$user->first_name.' '.$user->last_name.'</strong>, you have used <strong>'.$data->consumption.'</strong> of <strong>'.$data->title.'</strong>. Remaining <strong>'.$data->remaining_views.'</strong>'; 
                $this->sendNotification($data);
            }
            
            if($getPlanViews && !empty($planViewsCount) && $myView == $planViewsCount ) {

                $model->is_completed = 1;
                $model->status = Campaign::EXPIRED;
                $data = new \stdClass;
                $data->user_id = $model->user_id;
                $checkOtherCampaigns = true;
            }
            if($model->save()) {

                Cache::forget($this->_cacheKey.$model->id);

                if($checkOtherCampaigns) {
                    $myPlanCount = $this->model->where('user_id','=', $input['service_provider_user_id'])->where('status', '!=', Campaign::EXPIRED)->count();

                    if($myPlanCount == 0){

                        $serviceProviderProfile = $this->serviceProviderProfileRepo
                            ->findByAttribute('user_id',$input['service_provider_user_id']);

                        $this->serviceProviderProfileRepo->update(['id' => $serviceProviderProfile->id,'is_featured'=> 0 ]);

                        $data->message = 'Your featured profile campaign plan has ended. To restart this campaign, you must purchase the campaign plan again.'; 

                        $this->sendNotification($data);

                    }else {
                        
                        $data->message = 'Your current campaign plan has ended. Your next campaign has begun.'; 
                    }

                    $this->sendNotification($data);
                }
                $checkOtherCampaigns = false;
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
