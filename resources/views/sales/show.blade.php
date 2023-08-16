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
                    <p class="card-text">Product Name: {{ $sale->product_id ? $sale->product->name ?? 'N/A' : '' }}</p>
                    <p class="card-text">Customer Name: {{ $sale->customername }}</p>
                    <p class="card-text">Quantity: {{ $sale->quantity }}</p>
                    <p class="card-text">Price: {{ $sale->price }}</p>
                    <p class="card-text">Total Price: {{ $sale->totalprice }}</p>
                    <p class="card-text">Payment Mode: {{ $sale->paymentmode }}</p>
                    <p class="card-text">Payment Status: {{ $sale->paymentstatus }}</p>
                    <p class="card-text">Date: {{ $sale->date }}</p>
                </div>
            </div>
            <div>
                <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
            </div>
        </div>
    </div>
</div>  
@endsection