<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Expense::all();  
        return view('expenses/index', ['cruds' => $cruds]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Expense;  
        $crud->expenses =  $request->get('expenses');    
        $crud->date = $request->get('date');   
        $crud->amount = $request->get('amount');  
        $crud->save();
        return redirect()->route('expense.index')->with('success', 'Purchase recorded successfully');
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
        $crud= Expense::find($id);
        $expenseCategories = Expense::all();  
        return view('expenses/edit', ['crud' => $crud, 'expenseCategories' => $expenseCategories]);  
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
        $crud = Expense::find($id);  
        $crud->expenses =  $request->get('expenses');    
        $crud->date = $request->get('date');
        $crud->amount = $request->get('amount');   
        $crud->save();
        return redirect()->route('expense.index')->with('success', 'Purchase recorded successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Expense::find($id);
        $crud->delete(); 
        return redirect()->route('expense.index')->with('success', 'Purchase recorded successfully');    }
}
