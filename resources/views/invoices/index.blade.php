@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Invoices</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            {{-- <a class="btn btn-primary mb-3" href="{{ route('sales.create') }}">Add New Sale Details </a> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sale Customer Name</th>
                                        <th>Invoice Number</th>
                                        <th>Date</th>
                                        <th>Total Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoices as $index => $invoice)
                                        <tr>
                                            <td>{{ $index +=1}}</td>
                                            {{-- <td>{{ $invoice->sale_id ? $invoice->sale->customername : 'N/A' }}</td> --}}
                                            {{-- <td>{{ $invoice->sale_id ? optional($invoice->sale)->customername : 'N/A' }}</td> --}}
                                            <td>
                                                @if ($invoice->sale_id)
                                                    {{ $invoice->sale->customername ?? 'N/A' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $invoice->invoicenumber }}</td>
                                            <td>{{ $invoice->date }}</td>
                                            <td>{{ $invoice->totalprice }}</td>
                                            <td>
                                                <a class="btn btn-primary upcube-btn" href="{{ route('sales.showinvoice', ['invoice' => $invoice->id]) }}">View</a>
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