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
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <a class="btn btn-primary mb-3" href="{{ route('sales.create') }}">Add New Sale Details </a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>Product Name</th> --}}
                                        <th>Customer Name</th>
                                        {{-- <th>Quantity</th>
                                        <th>Price</th> --}}
                                        <th>Total Price</th>
                                        <th>Payment Mode</th>
                                        <th>Payment Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $index => $sale)
                                        <tr>
                                            <td>{{ $index +=1}}</td>
                                            {{-- <td>{{ $sale->product_id ? $sale->product->name : 'N/A' }}</td> --}}
                                            {{-- <td>{{ $sale->product_id ? ($sale->product ? $sale->product->name : 'N/A') : 'N/A' }}</td> --}}
                                            <td>{{ $sale->customername }}</td>
                                            {{-- <td>{{ $sale->quantity }}</td>
                                            <td>{{ $sale->price }}</td> --}}
                                            <td>{{ $sale->invoice->totalprice ?? 'N/A' }}</td>
                                            <td>{{ $sale->paymentmode }}</td>
                                            {{-- <td>{{ $sale->paymentstatus }}</td> --}}
                                            <td>
                                                <div style="
                                                    background-color: {{ $taskStatusColors[$sale->paymentstatus] }};
                                                    padding: 5px;
                                                    display: inline-block;
                                                    border-radius: 10px;
                                                ">
                                                    {{ $sale->paymentstatus }}
                                                </div>
                                            </td>
                                            <td>{{ $sale->date }}</td>
                                            <td>
                                                <a class="btn btn-primary upcube-btn" href="{{ route('sales.show', $sale->id ) }}">View</a>
                                                <form action="{{ route('sales.destroy', $sale->id ) }}" method="POST" class="d-inline">
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