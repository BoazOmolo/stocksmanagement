@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Add the content to display the sale details and invoice number here -->
            <h4>Invoice Number: {{ $invoice->invoicenumber }}</h4>
            <p>Customer Name: {{ $invoice->sale->customername ?? 'N/A' }}</p>
            <p>Date: {{ $invoice->date }}</p>
            <p>Payment Status: {{ $invoice->sale->paymentstatus }}</p>
            <p>Payment Mode: {{ $invoice->sale->paymentmode }}</p>
            <p>Grand Total: {{ $invoice->totalprice }}</p>
            <!-- Add more invoice details here as needed -->

            <!-- Display product details -->
            <h5>Product Details:</h5>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                    @if ($invoice->sale && $invoice->sale->products)
                        @foreach($invoice->sale->products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>  
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->price }}</td>
                                <td>{{ $product->pivot->quantity * $product->pivot->price }}</td>
                            </tr> 
                        @endforeach
                    @endif
                </tbody>
            </table>

            <!-- Add a print button -->
            <button onclick="window.print()" class="btn btn-primary">Print</button>
            
            <!-- Add a link to go back to the invoices index -->
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
