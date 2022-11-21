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
                <h1 class="h3 mb-0 text-gray-800">Sales</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-colored" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Distributor Name</th>
                                    <th>Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sn = 0 @endphp
                                @foreach([] as $key => $distributor)
                                @php $sn++  @endphp
                                    <tr>
                                        <td>{{ $sn }}</td>
                                        <td>{{ $distributor->first_name. ' '.$distributor->last_name }}</td>
                                        <td>{{ rand(0,0) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

@endsection

