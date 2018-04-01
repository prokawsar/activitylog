<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }


    public function addActivity(Request $request)
    {

        return redirect(route('home'))->with('status', 'Activity Added');
    }


    public function disableActivity($id)
    {

        return redirect(route('home'))->with('status', 'Activity Disabled');
    }


    public function deleteActivity($id)
    {

        return redirect(route('home'))->with('status', 'Activity Deleted');
    }
}
