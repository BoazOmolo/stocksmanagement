<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::pluck('name', 'id');

        return view('products.create',compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = Auth::user()->name;

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->buyingprice = $request->input('buyingprice');
        $product->sellingprice = $request->input('sellingprice');
        $product->stockquantity = $request->input('stockquantity');
        $product->status = 1;
        $product->createdby = $username;
        $product->updatedby = "";
        $product->deletedby = "";

        if ($request->has('category_id')) {
            $product->category_id = $request->input('category_id');
        }

        $product->save();

        Session::flash('successcode','success');
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        // $tasks = Task::pluck('name', 'id');
        $categories = Category::all();
        
        return view('products.edit', compact('product','categories'));
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
        $username = Auth::user()->name;

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->buyingprice = $request->input('buyingprice');
        $product->sellingprice = $request->input('sellingprice');
        $product->stockquantity = $request->input('stockquantity');
        $product->status = 1;
        $product->createdby = $username;
        $product->updatedby = "";
        $product->deletedby = "";

        if ($request->has('category_id')) {
            $product->category_id = $request->input('category_id');
        }

        $product->save();

        unset($product->updated_at);

        Session::flash('successcode','success');
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $username = Auth::user()->name;

        $product = Product::findOrFail($id);
        $product->deletedby = $username;
        $product->save();

        $product->delete();

        Session::flash('successcode','warning');
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function almostoutstock ()
    {
        $products = Product::where('stockquantity', '>', 0)->where('stockquantity', '<', 30)->get();
        return view('products.almostoutstock', compact('products'));
    }

    public function outstock ()
    {
        $products = Product::where('stockquantity', '<=', 0)->get();
        return view('products.outstock', compact('products'));
    }
}
