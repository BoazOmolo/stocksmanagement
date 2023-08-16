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
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <a class="btn btn-primary mb-3" href="{{ route('products.create') }}">Add New Product Details </a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        <th>Stock Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $index => $product)
                                        <tr>
                                            <td>{{ $index +=1}}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category_id ? $product->category->name : 'N/A' }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->buyingprice }}</td>
                                            <td>{{ $product->sellingprice }}</td>
                                            <td>{{ $product->stockquantity }}</td>
                                            <td>
                                                <a class="btn btn-primary upcube-btn" href="">View</a>
                                                <a class="btn btn-secondary upcube-btn" href="">Edit</a>
                                                <form action="" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger upcube-btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection