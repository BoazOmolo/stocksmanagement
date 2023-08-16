@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Add the content to display the sale details and invoice number here -->
            <h4>Invoice Number: {{ $invoice->invoicenumber }}</h4>
            <p>Customer Name: {{ $invoice->sale->customername ?? 'N/A' }}</p>
            <p>Date: {{ $invoice->date }}</p>
            <p>Total Price: {{ $invoice->totalprice }}</p>
            <!-- Add more invoice details here as needed -->

            <!-- Display product details -->
            <h5>Product Details:</h5>
            @if ($invoice->sale->product_id)
                <p>Product Name: {{ $invoice->sale->product->name }}</p>
                <p>Quantity: {{ $invoice->sale->quantity }}</p>
                <p>Price: {{ $invoice->sale->price }}</p>
            @else
                <p>Product Name: N/A</p>
                <p>Quantity: N/A</p>
                <p>Price: N/A</p>
            @endif

            <!-- Add a print button -->
            <button onclick="window.print()" class="btn btn-primary">Print</button>
            
            <!-- Add a link to go back to the invoices index -->
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back to Invoices</a>
        </div>
    </div>
</div>
@endsection
