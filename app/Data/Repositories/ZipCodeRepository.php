<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ZipCode;

class ZipCodeRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of ZipCode Class.
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
     * Example: ZipCode-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'zip-code';
    protected $_cacheTotalKey = 'total-zip-code';

    public function __construct(ZipCode $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

     public function findByAll($pagination = false,$perPage = 10, $data = [])
    {       
        if (!empty($data['zip_code'])) {
            $this->builder = $this->builder
                                ->select('zip_code as id')
                                ->where('zip_code', 'LIKE', '%'.$data['zip_code'].'%');
        }
        return parent::findByAll($pagination, $perPage, $data);
    }

    public function findById($id, $refresh = false, $details = false, $encode = true) {
        $data = $this->cache()->get($this->_cacheKey.$id);
        if ($data == NULL || $refresh == true) {
            $query = $this->model->where('id','=', $id)->first();
            if ($query != NULL) {

                $data = new \stdClass;
                foreach ($query->getAttributes() as $column => $value) {
                    $data->{$column} = $query->{$column};
                }
                $this->cache()->forever($this->_cacheKey.$id, $data);
            } else {
                return null;
            }
        }
        return $data;
    }
}
