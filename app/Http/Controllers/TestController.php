<?php

namespace App\Http\Controllers;

use Session;
use App\Organization;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request, $shortname = null){
        $lang = $request->query('lang');
        if(empty($shortname)){
            $shortname = getenv('SHORT_NAME');
        }
        $params['organization'] = Organization::where('shortname', $shortname)->first();
        if(!$params['organization']){
            return view('notfound');
        }
        Session::put('organization_id', $params['organization']->id);
        if($lang && $lang == 'es'){
            return view('es', ['params' => $params]);
        } else if($lang && $lang == 'en'){
            return view('en', ['params' => $params]);
        } else {
            return view('en', ['params' => $params]);
        }
    }
}
