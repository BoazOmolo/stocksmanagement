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
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h4 class="card-title">Add New Sale Details</h4>
                            <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="customername" id="customername" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Select Payment Mode</label>
                                    <div class="col-sm-10">
                                        <select name="paymentmode" id="paymentmode" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled>Select Payment Mode</option>
                                            <option value="Mobile Money">Mobile Money</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Select Payment Status</label>
                                    <div class="col-sm-10">
                                        <select name="paymentstatus" id="paymentstatus" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled>Select Payment Status</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="start_date" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="date" id="date" required>
                                    </div>
                                </div>
                                 
                                <div id="form-wrapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Select Item</label>
                                                <select name="product_id[]" class="form-control">
                                                    <option value="">Select the Item</option>
                                                    @foreach($products as $productId => $productName)
                                                        <option value="{{ $productId }}">{{ $productName }}</option>
                                                    @endforeach
                                                </select>  
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Quantity</label>
                                                <input class="form-control" type="number" name="quantity[]" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Price</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="number" name="price[]" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success add-repeater">Add</button>
                                                        <button class="btn btn-danger remove-repeater">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Upcube.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productSelect = document.getElementById('product_id');
        const stockQuantityDiv = document.getElementById('stock-quantity');

        productSelect.addEventListener('change', function () {
            const selectedProductId = productSelect.value;
            if (selectedProductId !== '') {
                const selectedProduct = {!! json_encode($products) !!}[selectedProductId];
                const stockQuantity = selectedProduct.stockquantity;
                stockQuantityDiv.textContent = stockQuantity;
            } else {
                stockQuantityDiv.textContent = '';
            }
        });
    });
</script>
