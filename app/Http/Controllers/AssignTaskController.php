<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\AssignTask;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use File;
class AssignTaskController extends Controller
{
   
    public function index(){

        if(auth()->user()->type=='1'){
            $data=AssignTask:: all();

        }
        else{

            $data=AssignTask:: all()->where('id','=',auth()->user()->id);
        }
        
        return view('assign_task.index',['task_list'=> $data])->with('article_name','assign_task');
    
    }

    public function create_data(){
        $data=Employee:: all();

        return view('assign_task.add',['employee_list'=> $data])->with('article_name','assign_task');
    }
    

    public function store_data(){
  
        $attributes= request()->validate([
            'task'=>'required',
             'starttime'=>'required',
            'endtime'=>'required',
            'employee_id'=>'required'
            

        ]); 
       

   
   // $this->create_file($attributes);

   
        AssignTask::create($attributes); 
        $data=Employee:: all();
        session()->flash('success', 'Your Registration Completed Successfully');
         return redirect("assign_task")->with(['employee_list'=> $data])->with('article_name','assign_task');
        // return view('assign_task.add',['employee_list'=> $data]);
    }


    function create_file($attributes){

        $this->starttime    = $attributes['starttime'];
        $this->endtime      = $attributes['endtime'];
        $this->date     = date('dmY');
        $data= Employee::find($attributes['employee_id']);
       
        $this->nama=$data['employee_name'];
    
        $data = $this->nama.", is busy from ".$this->starttime."to". $this->endtime ;
        $file = "upload_file/".$this->nama."_freebusy";
        $namafile = "$file.txt";  
        Storage::disk('local')->put($namafile, $data);
       /*  File::put(public_path($file), $namafile);
        return Response::download(public_path($file.$namafile)); */
    }
 
    function edit(Request $request){
        $id = $request->rpt_id;
        $employees=Employee:: all();
        $data= AssignTask::find($id);
        return  view('assign_task.edit',['employee_list'=>$employees,'row'=> $data])->with('article_name','assign_task');

    }
    
    function update($id){

        $attributes= request()->validate([
            'task'=>'required',
             'starttime'=>'required',
            'endtime'=>'required',
            'employee_id'=>'required'
            

        ]); 
        
               
        AssignTask::where('id', $id)->update($attributes);
        session()->flash('success', 'Delete Completed Successfully');
        return redirect("edit_task")->with('Successfully deleted')->with('article_name','assign_task');

    }
    function delete($id){

        DB::table('assign_tasks')->where('id', $id)->delete();
        session()->flash('success', 'Delete Completed Successfully');
        return redirect("/assign_task_view")->with('Successfully deleted')->with('article_name','assign_task');

    }
}
