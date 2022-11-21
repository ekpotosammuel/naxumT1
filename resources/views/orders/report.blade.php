@extends("layouts.app")

@section("title")
    Report
@endsection


@section("content")

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('components.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Order</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12">
                    <form method="GET">
                        <div class="row">
                            <label class="col-md-1" for="distributor">Distributor</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <input type="text" class="form-control" id="distributor" name="distributor" placeholder="Eg, Dell"> --}}
                                    <select class="form-control auto-complete" id="distributor" name="distributor">
                                        <option></option>
                                        @foreach($distributors as $key => $distributor)
                                            <option value="{{ $distributor->id }}">{{ $distributor->first_name .' '.$distributor->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1" for="date_filter">From</label>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $from }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $to }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-primary">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-colored" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Purchaser</th>
                                    <th>Distributor</th>
                                    <th>Referred Distributors</th>
                                    <th>Order Date</th>
                                    <th>Percentage</th>
                                    <th>Commission</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->invoice_number }}</td>
                                        <td>{{ $order->purchaser->username }}</td>
                                        <td>{{ $order->purchaser->referrer->username ?? "" }}</td>
                                        <td>{{ $order->getTotalDistributor($order->purchaser->referrer->id ?? null) }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->getTotalCommission($order->getTotalDistributor($order->purchaser->referrer->id ?? null)).'%' }}</td>
                                        <td>{{ ($order->getTotalCommission($order->getTotalDistributor($order->purchaser->referrer->id ?? null)) / 100) * $order->amount  }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    @include('components.footer')
</div>
<!-- End of Content Wrapper -->
@endsection


@section("script")
    <script type="text/javascript">
        $(document).ready(function() {
            $('.auto-complete').select2({
                placeholder: "Search Distributor",
                allowClear: true,
                width: 'resolve'
            });
        });
    </script>
@endsection

