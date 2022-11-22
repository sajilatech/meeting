<?php

namespace App\Http\Controllers;
use App\Models\AssignTask;
use App\Models\MeetingPlanner as ModelsMeetingPlanner;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MeetingPlanner extends Controller
{
    //
   public function index(){
    $data=ModelsMeetingPlanner:: all();
   
        return view('meeting_planner.index', ['plan_list'=> $data])->with('article_name','meeting');;

    }

    public function create_data(){

        $currentTime = Carbon::now();
        $currentTime->setTimezone("Europe/Paris");
        $select_time=ltrim($currentTime->format('h:ia'), '0');

        $data=AssignTask::whereDate('starttime', '<', $select_time)
        ->whereDate('endtime', '>', $select_time)
        ->whereDate('created_at',  Carbon::now())
        ->get();

        return view('meeting_planner.create', ['plan_list'=> $data])->with('article_name','meeting');;

    }

    public function store_data(){
        $currentTime = Carbon::now();
        $currentTime->setTimezone("Europe/Paris");
        $select_time=ltrim($currentTime->format('h:ia'), '0');

        $data=AssignTask::whereDate('starttime', '<', $select_time)
        ->whereDate('endtime', '>', $select_time)
        ->whereDate('created_at',  Carbon::now())
        ->get();
        return view('meeting_planner.create', ['plan_list'=> $data])->with('article_name','meeting');;

    }

        
    
}
