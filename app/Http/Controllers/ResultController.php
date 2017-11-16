<?php

namespace App\Http\Controllers;

use Session;
use App\Result;
use App\Organization;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index($shortname){
        if (Session::has('answers')){
            $answers = Session::get('answers');
        } else {
            return redirect()->back();
        }
        $results = new Result;
        $results->answers = json_encode($answers);
        $params['display'] = $params['display'] = $results->viewable();
        $params['organization'] = Organization::where('shortname', $shortname)->first();
        return view('results', ['params' => $params]);
    }

    public function post(Request $request){
        $answers = $request->answers;
        Session::put('answers', $answers);

        $results = new Result;
        $results->answers = json_encode($answers);
        $params['display'] = $params['display'] = $results->viewable();
        $params['organization'] = Organization::find(Session::get('organization_id'));
        return view('view', ['params' => $params]);
    }
}
