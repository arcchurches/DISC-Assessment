<?php

namespace App\Http\Controllers;

use Session;
use App\Organization;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($shortname = null){
        if(empty($shortname)){
            $shortname = getenv('SHORT_NAME');
        }
        $params['organization'] = Organization::where('shortname', $shortname)->first();
        if(!$params['organization']){
            return view('notfound');
        }
        Session::put('organization_id', $params['organization']->id);

        return view('index', ['params' => $params]);
    }
}
