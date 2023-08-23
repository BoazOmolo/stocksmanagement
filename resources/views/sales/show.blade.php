@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Sales</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sales</a></li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            
            <h1>Sale Details</h1>
           
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Customer Name: {{ $sale->customername }}</p>
                        <p class="card-text">Grand Total: {{ $sale->invoice->totalprice }}</p>
                        <p class="card-text">Payment Mode: {{ $sale->paymentmode }}</p>
                        <p class="card-text">Payment Status: {{ $sale->paymentstatus }}</p>
                        <p class="card-text">Date: {{ $sale->date }}</p>

                        <!-- Display other sales with the same sale_id -->
                        <h3>Sales Made</h3>
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sale->products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>  
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>{{ $product->pivot->price }}</td>
                                        <td>{{ $product->pivot->quantity * $product->pivot->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
           
            <div>
                <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
            </div>
        </div>
    </div>
</div>  
@endsection
