@extends('masterpage')
@section('title', 'Show Product')
@section('css')

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/multicheck/multicheck.css" />
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />

@stop

@section('content')

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Show Products
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->

            @if (session('error'))
                <div class="alert alert-danger" id="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card bg-success">
                        <div class="card-body">
                            <h1 class="card-title p-3 mt-3 text-white">Product List</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Manufacture Name</th>
                                            <th>Quantity In Stock</th>
                                            <th>Unit Price</th>
                                            <th>Expiry Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $pro)
                                            <tr>
                                                <td>{{ $pro->product_name }}</td>
                                                <td>{{ $pro->manufacturer_name }}</td>
                                                <td>{{ $pro->quantity_in_stock }}</td>
                                                <td>{{ 'Rs.' . $pro->unit_price }}</td>
                                                <td>{{ $pro->expiry_date }}</td>
                                                <td>
                                                    <a href="" class="btn btn-primary btn-sm text-white">
                                                        <i class=" far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/showProduct/delete/') }}/{{ $pro->product_id }}"
                                                        class="btn btn-danger btn-sm text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Manufacture Name</th>
                                            <th>Quantity In Stock</th>
                                            <th>Unit Price</th>
                                            <th>Expiry Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Matrix-admin. Designed and Developed by
            <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->


@stop

@section('js')

    <!-- this page js -->
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>

    <script>
        const myTimeout = setTimeout(closeAlert, 3000);

        function closeAlert() {
            document.getElementById("alert").style.display = 'none';
        }
    </script>
@stop
