<?php

namespace App\Http\Controllers;

use Session;
use App\Result;
use App\Organization;
use App\Mail\ResultsSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendResultController extends Controller
{
    public function post(Request $request){
        $results = new Result;
        $results->name = $request->name;
        $results->answers = json_encode(Session::get('answers'));
        $results->organization_id = Session::get('organization_id');
        $results->save();

        $params['name'] = $request->name;
        $params['display'] = $results->viewable();
        $params['organization'] = Organization::find(Session::get('organization_id'));
        Mail::to($params['organization']->results_email)
            ->send(new ResultsSent($params));



        $request->session()->flash('alert-success', 'Shared Successfully!');
        return view('results', ['params' => $params]);
    }
}
