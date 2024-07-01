<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Purchase::all();  
        // return view('index', compact('cruds'));
        return view('index', ['cruds' => $cruds, 'editRouteName' => 'purchase.destroy', 'deleteRouteName' => 'purchase.edit', 'heading' => 'Purchases', 'supplier' => 'Supplier']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('create', ['message' => 'Purchase', 'supplier' => 'Supplier', 'routeName' => 'purchase.store','products' => $products, 'productRoute' => 'product.create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $category = Product::where('id', $request->get('hidden_product_id'))->value('product_name');
        $crud = new Purchase;  
        $crud->supplier =  $request->get('supplier');
        $crud->product_id =  $request->get('hidden_product_id');
        $crud->category =  $category;        
        $crud->date = $request->get('date');  
        $crud->description = $request->get('description');  
        $crud->qty = $request->get('qty');  
        $crud->unit_price = $request->get('unit_price');  
        $crud->total_price = $request->get('total_price');  
        $crud->save();
        $product = Product::findOrFail($request->product_id);
        $product->quantity += $request->get('qty'); 
        $product->save();
        return redirect()->route('purchase.index')->with('success', 'Purchase recorded successfully');
        } catch (\Exception $e) {
            // dd('Something went wrong. Please enter your supplier and category fields properly.');
            return view('error', ['message' => 'Something went wrong. Please enter your supplier and category fields properly.']);
        }

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
        $crud= Purchase::find($id);
        // dd($productId);  
        $products = Product::all();
        // return view('edit', compact('crud', 'products'));
        return view('edit', ['crud' => $crud, 'supplier' => 'Supplier', 'products' => $products, 'routeName' => 'purchase.update', 'productRoute' => 'product.create']);  
  
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
        $category = Product::where('id', $request->get('product_id'))->value('product_name');

        // dd($request->get('supplier'));  
        $crud = Purchase::find($id);  
        $crud->supplier =  $request->get('supplier');
        $crud->product_id =  $request->get('product_id');
        $crud->category =  $category;          
        $crud->date = $request->get('date');  
        $crud->description = $request->get('description');  
        $crud->qty = $request->get('qty');  
        $crud->unit_price = $request->get('unit_price');  
        $crud->total_price = $request->get('total_price');
        // dd($crud);  
        $crud->save();
        $product = Product::findOrFail($request->product_id);
        $purchases = Purchase::where('product_id', $request->product_id)->get();
        $product->quantity = 0;
        foreach ($purchases as $key => $purchase) {
                $product->quantity += $purchase->qty;
        }
        $product->save();
        return redirect()->route('purchase.index')->with('success', 'Purchase recorded successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Purchase::find($id);
        $product = Product::findOrFail($crud->product_id);
        $product->quantity -= $crud->qty;
        $product->save();  
        $crud->delete(); 
        return redirect()->route('purchase.index')->with('success', 'Purchase recorded successfully');
    }
}
