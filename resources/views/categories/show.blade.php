@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Categories</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            
            <h1> Details</h1>

            <div class="card">
                <div class="card-body">
                    <p class="card-text">Name: {{ $category->name }}</p>
                    <p class="card-text">Description: {{ $category->description }}</p>
                </div>
            </div>

            <h2>Products in this Category</h2>
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stock Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->products as $index => $product)
                                <tr>
                                    <td>{{ $index +=1}}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->stockquantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                          

            <div>
                <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
            </div>
        </div>
    </div>
</div>  
@endsection