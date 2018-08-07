<?php

namespace Psm\Http\Controllers\Api\V1;


use Psm\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


abstract class ApiResourceController extends Controller
{
    public $_repository;
    const   PER_PAGE = 10;

    public function __constructor($repository)
    {
        $this->_repository = $repository;
    }


    //Get all records
    public function index(Request $request)
    {

        $input = $request->validated();
        
        $per_page = self::PER_PAGE ? self::PER_PAGE : config('app.per_page');
        $pagination = !empty($input['pagination']) && $input['pagination'] == 'true' ? true : false; 

        $data = $this->_repository->findByAll($pagination, $per_page, $input);

        $output = ['response' => ['data' => $data['data'], 'pagination' => !empty($data['pagination']) ? $data['pagination'] : false   , 'message' => 'Success']];
        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }


    //Get single record
    public function show(Request $request, $id)
    {
        $input = $request->validated();

        $input['id'] = $id;

        $data = $this->_repository->findById($input['id'], $refresh = false, $input, $encode = true);

        $output = ['response' => ['data' => $data, 'message' => 'Success']];

        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }


    //Create single record
    public function store(Request $request)
    {

        $input = $request->validated();

        $data = $this->_repository->create($input);

        $output = ['response' => ['data' => $data, 'message' => 'Record added successfully']];
        
        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }

    //Update single record
    public function update(Request $request, $id)
    {   

        $input = $request->validated();
        $input['id'] = $id;

        $data = $this->_repository->update($input);
        
        $output = ['response' => ['data' => $data, 'message' => 'Record updated successfully']];

        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }


    //Delete single record
    public function destroy(Request $request, $id)
    {
        $input = $request->validated();
        $input['id'] = $id;

        $data = $this->_repository->deleteById($input['id']);

        $output = ['response' => ['data' => $data, 'message' => 'Success']];

        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }



    public function rules($value = '')
    {
        return [];
    }

    public function input($value = '')
    {
        return [];
    }

}