<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configurations for uploaded content
    |--------------------------------------------------------------------------
    |
    */
    'service' => [
        'folder' => 'service/orignal',
        'rules' => [
            'mimes:jpeg,jpg,png',
            // 'max:' . 10*1024*1024,
        ],
        
        /*'thumb' => [
            'folder' => 'service/thumb/',
            'height' => 400,
            'width' => 400,
            'method' => 'fit',
        ],*/
        /*'zip' => [
            'folder' => 'service/zip/',
        ],*/
        'url' => [
            'folder' => 'service'
        ]
    ],
    'service_provider' => [
        'folder' => 'service_provider/orignal',
        'rules' => [
            'mimes:jpeg,jpg,png',
            // 'max:' . 10*1024*1024,
        ],
        
        /*'thumb' => [
            'folder' => 'service/thumb/',
            'height' => 400,
            'width' => 400,
            'method' => 'fit',
        ],*/
        /*'zip' => [
            'folder' => 'service/zip/',
        ],*/
        'url' => [
            'folder' => 'service_provider'
        ]
    ],
    
    'user' => [
        'folder' => 'user/orignal',
        'rules' => [
            'mimes:jpeg,jpg,png',
        ],
        
    ],
    'job' => [
        'folder' => 'job/orignal',
        'rules' => [
            'mimes:jpeg,jpg,png',
        ],
    ],
];
