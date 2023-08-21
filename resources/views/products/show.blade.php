@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Products</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            
            <h1>Product Details</h1>

            <div class="card">
                <div class="card-body">
                    <p class="card-text">Product Name: {{ $product->name }}</p>
                    <p class="card-text">Product Category: {{ $product->category_id ? $product->category->name ?? 'N/A' : '' }}</p>      
                    <p class="card-text">Description: {{ $product->description }}</p>
                    <p class="card-text">Buying Price: {{ $product->buyingprice }}</p>
                    <p class="card-text">Selling Price: {{ $product->sellingprice }}</p>
                    <p class="card-text">Stock Quantity: {{ $product->stockquantity }}</p>
                </div>
            </div>
            <div>
                <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
            </div>
        </div>
    </div>
</div>  
@endsection