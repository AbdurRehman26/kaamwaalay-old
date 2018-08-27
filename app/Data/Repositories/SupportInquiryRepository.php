<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\SupportInquiry;
use App\Data\Models\Role;
use Cache,StdClass;
use DB;

class SupportInquiryRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of SupportInquiry Class.
     *
     * @var object
     * @access public
     *
     **/
    public $model;

    /**
     *
     * This is the prefix of the cache key to which the
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
     *
     * Example: SupportInquiry-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'SupportInquiry';
    protected $_cacheTotalKey = 'total-SupportInquiry';

    public function __construct(SupportInquiry $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->roleRepo = app('RoleRepository');
        $this->userRepo = app('UserRepository');

    }

    public function findById($id, $refresh = false, $details = false, $encode = true) {
        $data = Cache::get($this->_cacheKey.$id);

        if ($data == NULL || $refresh == true) {
            $query = $this->model->with('support_question')->find($id);
            if ($query != NULL) {

                $data = new \stdClass;
                foreach ($query->getAttributes() as $column => $value) {
                    $data->{$column} = $query->{$column};
                }

                $data->support_question = $query->support_question;
                $data->role = new StdClass;
                if($data->support_question){
                    $roleData = $this->roleRepo->findById($data->support_question->role_id);
                    if($roleData){
                        $data->role  =  $roleData;    
                    }                    
                }
                if($data->user_id){
                    $userData = $this->userRepo->findById($data->user_id);
                    if($userData){
                        $data->name     = $userData->first_name.' '.$userData->last_name;
                        $data->email    = $userData->email;
                    }
                }
                Cache::forever($this->_cacheKey.$id, $data);
            } else {
                return null;
            }
        }
        return $data;
    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] ) {

        $this->builder = $this->builder
        ->leftJoin('users', 'support_inquiries.user_id', '=', 'users.id');
        //->where('users.role_id', '<>', Role::ADMIN)
        ;

        if(!empty($data['type_id'])){
            $this->builder = $this->builder->where('users.role_id', '=' , $data['type_id']);
            // ->leftJoin('support_questions', 'support_inquiries.support_question_id', '=', 'support_questions.id')
            // ->where('support_questions.role_id', '=' , $data['type_id'])
            ;
        }

        if(!empty($data['keyword'])){
            $this->builder = $this->builder
            //->select('support_inquiries.id')
            //->leftJoin('users', 'support_inquiries.user_id', '=', 'users.id')
            ->where(function($query) use ($data) {
              //  $query->orWhere('name', 'LIKE', '%'.$data['keyword'].'%');
                //$query->orWhere('support_inquiries.email', 'LIKE', '%'.$data['keyword'].'%');
                $query->orWhere('users.email', 'LIKE', '%'.$data['keyword'].'%');
                $query->orWhere(DB::raw('concat(users.first_name," ",users.last_name)') , 'LIKE' , '%'.$data['keyword'].'%');

                //$query->orWhere('users.first_name', 'LIKE', '%'.$data['keyword'].'%');
                //$query->orWhere('users.last_name', 'LIKE', '%'.$data['keyword'].'%');

            })
            ;            
        }

        $this->builder = $this->builder
        ->select('support_inquiries.id')
        ->orderBy('support_inquiries.created_at', 'DESC')
        ;
        $modelData['data'] = [];
        $count = $this->builder->count();
        $modelData['data'] = parent::findByAll($pagination, $perPage, $data);

        $modelData['data']['inquiry_count'] = $count;
        return $modelData;
        //return  parent::findByAll($pagination, $perPage);
    
    }
}
