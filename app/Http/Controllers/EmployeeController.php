<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    public function index(){

        $data=Employee:: all();
        return view('employees.index',['employee_list'=> $data])->with('article_name','employee');
    }

    public function create(){

        return view('employees.add')->with('article_name','employee');
    }

    public function store(){

        $attributes= request()->validate([
            'employee_name'=>'required',
            'employee_designation'=>'required'
            

        ]); 
               
        Employee::create($attributes); 
        session()->flash('success', 'Your Registration Completed Successfully');
        return redirect("/create_employee")->with('Successfully Created')->with('article_name','employee');
        
    }
    
    function edit($id){

        $data= Employee::find($id);
        return  view('employees.edit',['employee_row'=> $data])->with('article_name','employee');

    }

    function update($id){
        $attributes= request()->validate([
            'employee_name'=>'required',
            'employee_designation'=>'required'
            

        ]); 
               
        Employee::where('id', $id)->update($attributes);
        session()->flash('success', 'Delete Completed Successfully');
        return redirect("edit/{id}")->with('Successfully deleted')->with('article_name','employee');
    }

    function delete($id){

        DB::table('employees')->where('id', $id)->delete();
        session()->flash('success', 'Delete Completed Successfully');
        return redirect("/employees")->with('Successfully deleted')->with('article_name','employee');

    }

    function ajaxRequestStore(Request $request)

    {

       


        


            // Store Data in DATABASE from HERE 


            return response()->json(['success'=>'Added new records.']);

            

    }


       




}
