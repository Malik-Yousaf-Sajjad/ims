<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Sale::all();  
        // return view('index', compact('cruds'));
        return view('index', ['cruds' => $cruds, 'editRouteName' => 'sale.destroy', 'deleteRouteName' => 'sale.edit', 'heading' => 'Sales', 'supplier' => 'Customer']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('create',  ['message' => 'Sale', 'supplier' => 'Customer', 'routeName' => 'sale.store', 'products' => $products, 'productRoute' => 'product.create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->get('product_id'));
        $product = Product::findOrFail($request->product_id);

        // Check if there is enough quantity in stock
        if ($product->quantity < $request->qty) {
            return view('welcome', ['error' => 'Product Quantity is less than you are selling']);
        }
        $category = Product::where('id', $request->get('product_id'))->value('product_name');
        $crud = new Sale;  
        $crud->supplier =  $request->get('supplier');
        $crud->product_id =  $request->get('product_id');
        $crud->category =  $category;    
        $crud->date = $request->get('date');  
        $crud->description = $request->get('description');  
        $crud->qty = $request->get('qty');  
        $crud->unit_price = $request->get('unit_price');  
        $crud->total_price = $request->get('total_price');  
        $crud->save();
         // Update the product's quantity
         $product->quantity -= $request->qty;
         $product->save();
 
         return redirect()->route('sale.index')->with('success', 'Sale recorded successfully');
 
        // return $this->index();  
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
        $crud= Sale::find($id);
        $products = Product::all();  
        // return view('edit', compact('crud', 'products'));
        return view('edit', ['crud' => $crud, 'supplier' => 'Customer', 'products' => $products, 'routeName' => 'sale.update', 'productRoute' => 'product.create']);  
  
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
        // dd($request->get('product_id'));
        $product = Product::findOrFail($request->product_id);
        $sale = Sale::findOrFail($id);

        // Calculate the difference in quantity
        if ($product->quantity < $request->qty) {
            // return redirect()->back()->withErrors('Not enough stock available');
            return view('welcome', ['error' => 'Product Quantity is less than you are selling']);

        }
        $category = Product::where('id', $request->get('product_id'))->value('product_name');
        $crud = Sale::find($id);  
        $crud->supplier =  $request->get('supplier');
        $crud->product_id =  $request->get('product_id');
        $crud->category =  $category;            
        $crud->date = $request->get('date');  
        $crud->description = $request->get('description');  
        $crud->qty = $request->get('qty');  
        $crud->unit_price = $request->get('unit_price');  
        $crud->total_price = $request->get('total_price');  
        $crud->save();
        $product->quantity -= $request->qty;
        $product->save();
        return redirect()->route('sale.index')->with('success', 'Purchase recorded successfully');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Sale::find($id);
        $product = Product::findOrFail($crud->product_id);
        $product->quantity += $crud->qty;
        $product->save();
        $crud->delete(); 
        // return $this->index();
        return redirect()->route('sale.index')->with('success', 'Purchase recorded successfully');

    }
}
