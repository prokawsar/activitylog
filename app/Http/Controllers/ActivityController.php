<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Log;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }


    public function addActivity(Request $request)
    {
        $activity = new Activity();
        $activity->name = $request->activity;
        $activity->save();

        return redirect(route('home'))->with('status', 'Activity Added');
    }


    public function saveLog(Request $request)
    {
//        dd($request->id);
        foreach ($request->id as $id) {
            $log = new Log();
            $log->activity_id = $id;
            $log->save();
        }

        return redirect(route('home'))->with('status', 'Log Added');
    }

    public function enableActivity($id)
    {
        $activity = Activity::find($id);
        $activity->enable = 1;
        $activity->save();

        return redirect(route('home'))->with('status', 'Activity Enabled');
    }


    public function disableActivity($id)
    {
        $activity = Activity::find($id);
        $activity->enable = 0;
        $activity->save();
        return redirect(route('home'))->with('status', 'Activity Disabled');
    }


    public function deleteActivity($id)
    {

        return redirect(route('home'))->with('status', 'Activity Deleted');
    }
}
