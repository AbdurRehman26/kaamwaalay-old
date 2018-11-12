<?php

namespace App\Helper;

use Illuminate\Http\Request as ServerRequest;
use \Request;
use \DateTime;
use \DateInterval;
use \DatePeriod;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Hashids\Hashids;

class Helper
{

    const ENCODE_PADDING = 10;

    public static function getIp() {
        $ip = request()->server('HTTP_X_REAL_IP');
        if (empty($ip)) {
            $ip = request()->server('HTTP_X_FORWARDED_FOR');
            if (empty($ip)) {
                $ip = request()->ip();
            }
        }
        return $ip;
    }
    public static function getRequestInfo(ServerRequest $request)
    {
        $ip_address = $request->server('HTTP_X_REAL_IP');
        if (empty($ip_address)) {
            $ip_address = $request->server('HTTP_X_FORWARDED_FOR');
            if (empty($ip_address)) {
                $ip_address = $request->ip();
            }
        }

        $info = new \StdClass;
        $info->ip = $ip_address;
        $info->agent = $request->server('HTTP_USER_AGENT');
        return $info;
    }
    public static function getTimeRange(Carbon $start, Carbon $end)
    {
        $interval = $start->diff($end);
        $i = 0;
        $hours = [];
        while ($i < $interval->h) {
            array_push($hours, $i);
            $i++;
        }
        return $hours;
    }
    public static function getDateRange($start, $end, $intervalDuration = 'P1D', $format = 'Y-m-d')
    {
        $begin = new DateTime($start);
        $end = new DateTime($end);
        $end = $end->modify('+1 day');
        $interval = new DateInterval($intervalDuration);
        $daterange = new DatePeriod($begin, $interval, $end);

        $dates = [];
        foreach ($daterange as $date) {
            $dates[] =  $date->format($format);
        }
        return $dates;
    }

    public static function getReportInterval($start, $end)
    {
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        if ($start->diffInDays($end) >= 1 && $start->diffInDays($end) <= 31) {
            return 'days';
        } elseif ($start->diffInDays($end) > 31 && $start->diffInDays($end) <= 365) {
            return 'month';
        } elseif ($start->diffInDays($end) == 0) {
            return 'today';
        } else {
            return 'year';
        }
    }


    /**
     * Create a length aware custom paginator instance.
     *
     * @param  Collection  $items
     * @param  int  $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */

    public static function paginate($data = array(), $perPage = 10)
    {

        $resutls = [];
        $others  = [];
        //Get current page form url e.g. &page=6

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data

        $collection = new Collection($data);

        //Slice the collection to get the items to display in current page

        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view

        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
        $lastPage = 0;
        $currentPage = 0;
        $next =0;
        if (!empty($paginatedSearchResults)) {
            foreach ($paginatedSearchResults->items() as $value) {
                $resutls[] = $value;
            }

            $lastPage = $paginatedSearchResults->lastPage();
            $currentPage = $paginatedSearchResults->currentPage();

            $next =$lastPage-$currentPage;
            if ($next < 0) {
                $next = 0;
            }
        }

        return  ['next' => $next, 'data' => $resutls];
    }


    public static function getPaginate($data = array(), $perPage = 10)
    {

        $resutls = [];
        //Get current page form url e.g. &page=6

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data

        $collection = new Collection($data);

        //Slice the collection to get the items to display in current page

        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view

        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        if (!empty($paginatedSearchResults)) {
            foreach ($paginatedSearchResults->items() as $value) {
                $resutls[] = $value;
            }
        }

        return $resutls;
    }


    public static function getFileUrl($url, $isIdentity = false, $isApi = true)
    {
        $currentFileSystem = config('filesystems.default');
        if ($currentFileSystem == 'local' || $currentFileSystem == 'public') {
            if ($isIdentity) {
                $path = config('id_endpoint').'/files/'.$url;
            } elseif ($isApi) {
                $path = config('api_endpoint').'/files/'.$url;
            } else {
                $path = '/files/'.$url;
            }
            return \URL::to($path, [], config('app.is_secure', false));
        } elseif ($currentFileSystem == 'ftp') {
            $path = config('app.cdn_endpoint').'/'.$url;
            return \URL::to($path, [], config('app.is_secure', false));
        } else {
            $storageUrl = \Storage::url($url);
            $storageUrl = str_replace('%40', '@', $storageUrl);
            return $storageUrl;
        }
    }


    public static function paginator($data, $paginate)
    {
        $data['pagination'] = [];
        $data['pagination']['to'] = ($paginate->total() > 0)?$paginate->firstItem():1;
        $data['pagination']['from'] = ($paginate->total() > 0)?$paginate->lastItem():1;
        $data['pagination']['total'] = $paginate->total();
        $data['pagination']['current'] = $paginate->currentPage();
        $data['pagination']['first'] = 1;
        $data['pagination']['last'] = $paginate->lastPage();

        if ($paginate->hasMorePages()) {
            if ($paginate->currentPage() == 1) {
                $data['pagination']['previous'] = 0;
                $data['pagination']['prev'] = 0;
            } else {
                $data['pagination']['previous'] = $paginate->currentPage()-1;
                $data['pagination']['prev'] = $paginate->currentPage()-1;
            }
            $data['pagination']['next'] = $paginate->currentPage()+1;
        } else {
            $data['pagination']['previous'] = $paginate->currentPage()-1;
            $data['pagination']['prev'] = $paginate->currentPage()-1;
            $data['pagination']['next'] =  $paginate->currentPage();
        }
        if ($paginate->lastPage() > 1) {
            $data['pagination']['pages'] = range(1, $paginate->lastPage());
        } else {
            $data['pagination']['pages'] = [1];
        }

                // return data
        return $data;
    }

    /**
     * Create a length aware custom paginator instance.
     *
     * @param  Collection  $items
     * @param  int  $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function pagination($data = array(), $perPage = 10)
    {

        $resutls = [];
        $others  = [];
        //Get current page form url e.g. &page=6

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data

        $collection = new Collection($data);

        //Slice the collection to get the items to display in current page

        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view

        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
        $lastPage = 0;
        $currentPage = 0;
        $next =0;
        if (!empty($paginatedSearchResults)) {
            foreach ($paginatedSearchResults->items() as $value) {
                $resutls[] = $value;
            }

            $lastPage = $paginatedSearchResults->lastPage();
            $currentPage = $paginatedSearchResults->currentPage();

            $next =$lastPage-$currentPage;
            if ($next < 0) {
                $next = 0;
            }
        }

        return  ['next' => $next, 'data' => $resutls, 'total'=>$lastPage];
    }

    public static function encodeId($id, $userId = 0, $byPassRequest = false)
    {
        if ($byPassRequest) {
            $salt = config('app.id_key').'|';//.$userId;
            $hash = new Hashids($salt, self::ENCODE_PADDING);
            $encoded = $hash->encode($id);
            return $encoded;
        }
        $requestUser = Request::user();
        if ($requestUser) {
            $salt = config('app.id_key').'|';//.$requestUser->id;
            $hash = new Hashids($salt, self::ENCODE_PADDING);
            $encoded = $hash->encode($id);
            return $encoded;
        } else {
            $salt = config('app.id_key').'|';
            $hash = new Hashids($salt, self::ENCODE_PADDING);
            $encoded = $hash->encode($id);
            return $encoded;
        }
    }

    public static function decodeId($id, $userId = 0, $byPassRequest = false)
    {
        if ($byPassRequest) {
            $salt = config('app.id_key').'|';//.$userId;
            $hash = new Hashids($salt, self::ENCODE_PADDING);
            $decode = $hash->decode($id);
            $decode = (is_array($decode) && (count($decode) > 0))?$decode[0]:0;
            return $decode;
        }
        $requestUser = Request::user();
        if ($requestUser) {
            $salt = config('app.id_key').'|';//.$requestUser->id;
            $hash = new Hashids($salt, self::ENCODE_PADDING);
            $decode = $hash->decode($id);
            $decode = (is_array($decode) && (count($decode) > 0))?$decode[0]:0;
            return $decode;
        } else {
            $salt = config('app.id_key').'|';
            $hash = new Hashids($salt, self::ENCODE_PADDING);
            $decode = $hash->decode($id);
            $decode = (is_array($decode) && (count($decode) > 0))?$decode[0]:0;
            return $decode;
        }
    }

    public static function makeArray($data , $key = false)
    {
        $array = [];
        foreach ($data as $obj) {
            if(empty($key)){
                $array[] = $obj[0];
                continue;
            }
            $obj = (object) $obj;
            if(!empty($obj->{$key})) {
                $array[] = $obj->{$key};
            }

        }
        return $array;
    }


    public static function checkYoutubeVideoId($id)
    {
        $headers = get_headers('https://www.youtube.com/oembed?format=json&url=http://www.youtube.com/watch?v=' . $id);
        $response = false;
        if(is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false){
         $response = true;
     } else {
         $response = false;
     }
     return $response;
 }

}
