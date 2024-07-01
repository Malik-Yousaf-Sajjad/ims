<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Product::all();  
        // return view('index', compact('cruds'));
        return view('product/index', ['cruds' => $cruds]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Product;  
        $crud->product_name =  $request->get('product_name');
        $crud->supplier =  $request->get('supplier');
        $crud->customer =  $request->get('customer');
        $crud->employee =  $request->get('employee');
        $crud->save();
        return redirect()->route('product.index')->with('success', 'Sale recorded successfully');
 
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
        $crud= Product::find($id);
        // return view('edit', compact('crud', 'products'));
        return view('product/edit', ['crud' => $crud]);  
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
        $crud = Product::find($id);  
        $crud->product_name =  $request->get('product_name');
        $crud->supplier =  $request->get('supplier');
        $crud->customer =  $request->get('customer');
        $crud->employee =  $request->get('employee');
        $crud->save();
        return redirect()->route('product.index')->with('success', 'Purchase recorded successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Product::find($id);
        $crud->delete(); 
        return redirect()->route('product.index')->with('success', 'Purchase recorded successfully');
    }
}
