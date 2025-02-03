<?php

namespace App\Data\Repositories;

use App\Events\UserMessaged;
use App\Models\JobMessage;
use Carbon\Carbon;
use DB;
use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;

class JobMessageRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of JobMessage Class.
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
     * Example: JobMessage-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'job-message';
    protected $_cacheTotalKey = 'total-job-message';

    public function __construct(JobMessage $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function create(array $data = [])
    {
        $input = $data;

        //$job = app('JobRepository')->findById($data['job_id']);

        //$input['reciever_id'] = $job->user_id;

        // if(isset($input['trigger_online_status'])) {
        //     // UserIsOnline::dispatch((object)['user_is_online' => $input['trigger_online_status'], 'job_bid_id' => $input['job_bid_id']]);
        //     // return ['user_is_online' => $input['trigger_online_status']];
        // }
        if(isset($input['strict_chat'])) {
            // $message = $input['text'];
            // $containsDigits = preg_match_all("/(<!\d)?\d{5,}(!\d)?/", $message);
            // $containsEmail = preg_match_all("/\S+@\S+\.\S+/i", $message);
            // $containsUrl = preg_match_all("/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/i", $message);
            // $containsGeneral = preg_match_all("/((house)|(flat)|(society)|(appartment)|(block)|(road)|(home))/i", $message);

            // \Log::info(json_encode($message));
            // \Log::info(json_encode($containsGeneral));
            // \Log::info(json_encode($containsDigits));
            // \Log::info(json_encode($containsUrl));

            // if($containsDigits || $containsUrl || $containsGeneral || $containsEmail) {
            //     return null;
            // }

        }
        unset($input['strict_chat']);
        $message = parent::create($input);
        $job = app('JobRepository')->findById($input['job_id']);
        $message->job_status = $job->status;
        //$user = app('UserRepository')->findById($message->sender_id);
        UserMessaged::dispatch($message);
     //    UserIsOnline::dispatch((object)['user_is_online' => true,
     //     'job_bid_id' => $input['job_bid_id'],
     //     'sender_id' => $message->sender_id,
     //     'chat_id' => $message->id,
     //     'sender_name' => $user->first_name .' '. $user->last_name
     // ]);
        return $message;
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] )
    {

        $this->builder = $this->model->orderBy('id', 'desc');
        if(empty($input['job_bid_id'])) {
            return false;
        }
        $this->builder = $this->builder->where('job_bid_id', '=', $input['job_bid_id']);            

        //$data = parent::findByAll($pagination, $perPage, $input);

        if(isset($input['before'])) {
            $input['before'] = (int) $input['before'];
            $perPage = isset($input['limit'])? (int)$input['limit'] : $perPage;
            $this->builder = $this->builder->where('id', '<', $input['before'])->limit($perPage);
        }else {
            $input['after'] = (int) $input['after'];
            $perPage = isset($input['limit'])? (int)$input['limit'] : $perPage;
            $this->builder = $this->builder->where('id', ($input['after'] == 0? '>' : '<'), $input['after'])->limit($perPage);
        }
        $ids = $this->builder;
        $sql = $ids->toSql();
        $binds = $ids->getBindings();
        $models = DB::select($sql, $binds);
        $data = ['data'=>[]];    
        if ($models) {
            foreach ($models as &$model) {
                $model = $this->findById($model->id, !empty($input['refresh']), !empty($input['details']));
                if ($model) {
                    $data['data'][] = $model;
                }
            }
        }
        $ids = $ids->paginate($perPage);
        if ($pagination == true) {
            $data['pagination'] = [];
            $data['pagination']['total'] = $ids->total();
            $data['pagination']['current'] = $ids->currentPage();
            $data['pagination']['first'] = 1;
            $data['pagination']['last'] = $ids->lastPage();
            $data['pagination']['from'] = $ids->firstItem();
            $data['pagination']['to'] = $ids->lastItem();
            if($ids->hasMorePages()) {
                if ( $ids->currentPage() == 1) {
                    $data['pagination']['previous'] = -1;
                } else {
                    $data['pagination']['previous'] = $ids->currentPage()-1;
                }
                $data['pagination']['next'] = $ids->currentPage()+1;
            } else {
                $data['pagination']['previous'] = $ids->currentPage()-1;
                $data['pagination']['next'] =  $ids->lastPage();
            }
            if ($ids->lastPage() > 1) {
                $data['pagination']['pages'] = range(1,$ids->lastPage());
            } else {
                $data['pagination']['pages'] = [1];
            }
        }

        return $data;

    }
public function findById($id, $refresh = false, $details = false, $encode = true)
{
    $data = parent::findById($id, $refresh, $details, $encode);
    $data->user = app('UserRepository')->findById($data->sender_id);
    if($data) {
        $data->formatted_created_at = Carbon::parse($data->created_at)->format('M d, Y, h:m a');
    }

    return $data;
}
    /**
* This method will fetch single model by attribute
* and will return output back to client as json
*
* @access public
* @return mixed
*
* @author Usaama Effendi <usaamaeffendi@gmail.com>
**/
public function findByCriteria($criteria, $refresh = false, $details = false, $encode = true, $whereIn = false, $count = false)
{

    $model = $this->model->newInstance()
    ->where($criteria);

    if($whereIn) {
        $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);

    }

    if($count) {
        return $model->count();
    }

    $model = $model->first(['id']);

    if ($model != null) {
        $model = $this->findById($model->id, $refresh, $details, $encode);
    }
    return $model;
}

}
