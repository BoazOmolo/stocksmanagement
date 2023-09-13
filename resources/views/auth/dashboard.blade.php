@extends('layouts.admin')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                                    <h4 class="mb-2">{{ isset($totalsales) ? $totalsales : '' }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-secondary rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                            
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Products Nearly Out of Stock</p>
                                    <h4 class="mb-2">{{ isset($totalstock) ? $totalstock : '' }}</h4>
                                    <div>
                                        <a class="btn btn-secondary" href="{{ route('products.almostoutstock') }}">View</a>
                                    </div>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="ri-alert-line font-size-24"></i> 
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Products Out of Stock</p>
                                    <h4 class="mb-2">{{ isset($totaloutofstock) ? $totaloutofstock : '' }}</h4>
                                    <div>
                                        <a class="btn btn-secondary" href="{{ route('products.outstock') }}">View</a>
                                    </div>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-danger rounded-3">
                                        <i class="ri-alert-fill font-size-24"></i>  
                                    </span>
                                </div>
                               
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Invoices</p>
                                    <h4 class="mb-2">{{ isset($invoices) ? $invoices : '' }}</h4>
                                    <div>
                                        <a class="btn btn-secondary" href="{{ route('invoices.index') }}">View</a>
                                    </div>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-ticket-fill font-size-24"></i>  
                                    </span>
                                </div>
                               
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div><!-- end row -->
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Transactions</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Name</th>
                                            <th>Payment Status</th>
                                            <th>Payment Mode</th>
                                            {{-- <th>Quantity</th> --}}
                                            <th>Total Price</th>
                                            
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @if(isset($sales))
                                            @foreach($sales as $index => $sale)
                                                <tr>
                                                    <td>{{ $index +=1}}</td>
                                                    <td>{{ $sale->customername }}</td>
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
                                                    <td>{{ $sale->paymentmode }}</td>
                                                    {{-- <td>{{ $sale->quantity }}</td> --}}
                                                    <td>{{ $sale->invoice->totalprice ?? 'N/A' }}</td>
                                                </tr>   
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">No sales data available.</td>
                                            </tr>
                                        @endif
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                
            </div>
            <div class="row">
                
                <!-- end col -->
                <div class="col-10">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-end d-none d-md-inline-block">
                                <div class="dropdown">
                                    <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">This Years<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Revenue</h4>

                            <div class="text-center pt-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5>Today</h5>
                                            <p class="text-muted text-truncate mb-0">Total Price: Ksh. {{ isset($todayTotalPrice) ?  $todayTotalPrice : '' }}</p>
                                            <p class="text-muted text-truncate mb-0">Count: {{ isset($todayCount) ? $todayCount : ''}}</p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5>Last Week</h5>
                                            <p class="text-muted text-truncate mb-0">Total Price: Ksh. {{ isset($lastWeekTotalPrice) ? $lastWeekTotalPrice : '' }}</p>
                                            <p class="text-muted text-truncate mb-0">Count: {{ isset($lastWeekCount) ? $lastWeekCount : '' }}</p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div>
                                            <h5>Last Month</h5>
                                            <p class="text-muted text-truncate mb-0">Total Price: Ksh. {{ isset($lastMonthTotalPrice) ? $lastMonthTotalPrice : '' }}</p>
                                            <p class="text-muted text-truncate mb-0">Count: {{ isset($lastMonthCount) ? $lastMonthCount : '' }}</p>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                       
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <!-- end row -->
        </div>
        
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
    
@endsection