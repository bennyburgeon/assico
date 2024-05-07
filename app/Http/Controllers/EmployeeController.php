<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;
use App\DataTables\EmployeeDataTable;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
      public function index(EmployeeDataTable $dataTable)
      {
          return $dataTable->render('employee.view');
      }
      
      public function datatables(EmployeeDataTable $dataTable)
      {
          return $dataTable->ajax();
      }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $company = Company::all();
        return view('employee.index', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      $validated = $request->validate([

        'name' => 'required',
        'email' => 'required',
        'company' => 'required',
        'join_date' => 'required',
        'mobile_number' => 'required',
        
    ]);
        $data = new Employee();
        if ($request->file('image')) {
          $path = Storage::putFile('image', $request->file('image'));
          // $file = $request->file('image');
          // $filename = date('YmdHi') . $file->getClientOriginalName();
          // $file->store('image/employee', $filename);
          // $data->image = $filename;
          $data->image = $path;
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->company = $request->company;
        $data->join_date = $request->join_date;
        $data->mobile_number = $request->mobile_number;
        $data->created_by = Auth::user()->admin_id;
        $data->save();
        return redirect()->route('employee.index');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = Employee::find($id);
      $company = Company::all();
        return view('employee.edit', compact('data','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = Employee::find($id);
      if ($request->file('image')) {
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('image/employee/'), $filename);
        $data->image = $filename;
      }
      $data->name = $request->name;
      $data->email = $request->email;
      $data->company = $request->company;
      $data->join_date = $request->join_date;
      $data->mobile_number = $request->mobile_number;
      $data->created_by = Auth::user()->admin_id;
      $data->save();
      return redirect()->route('employee.index');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $data = Employee::find(decrypt($id));
     $image_path=public_path('image/employee/' . $data->image);
          
     if(file_exists($image_path)){
         unlink($image_path);
     }
      $data->delete();
      return redirect()->route('employee.index');
    }
}