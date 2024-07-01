<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Product;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Employee::all();  
        return view('employee/index', ['cruds' => $cruds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('employee.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Employee;  
        $crud->name =  $request->get('name');
        $crud->date = $request->get('date');  
        $crud->working_hours = $request->get('working_hours');
        $crud->pay = $request->get('pay');       
        $crud->save();
        return redirect()->route('employee.index')->with('success', 'Purchase recorded successfully');
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
        $crud= Employee::find($id);
        $products = Product::all();  
        return view('employee.edit', ['crud' => $crud, 'products' => $products]);  
  
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
        $crud = Employee::find($id);  
        $crud->name =  $request->get('name');
        $crud->date = $request->get('date');  
        $crud->working_hours = $request->get('working_hours');
        $crud->pay = $request->get('pay');    
        $crud->save();
        return redirect()->route('employee.index')->with('success', 'Purchase recorded successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Employee::find($id); 
        $crud->delete(); 
        return redirect()->route('employee.index')->with('success', 'Purchase recorded successfully');
    }
}
