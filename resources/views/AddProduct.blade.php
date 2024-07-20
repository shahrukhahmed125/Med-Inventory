@extends('masterpage')
@section('title', 'Add Product')
@section('css')

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css" />
    <link href="../dist/css/style.min.css" rel="stylesheet" />

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
                                    Add Product
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
            @if (session('success'))
                <div class="alert alert-success" id="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card bg-success">
                        <div class="card-body">
                            <h1 class="card-title p-3 mt-3 text-white">Add Product</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('create_product') }}" method="post">
                        @csrf
                        <div class="card p-5">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="fname" name="product_name"
                                            placeholder="E.g: Panadol" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Manufacturer Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="fname" name="manufacturer_name"
                                            placeholder="E.g: GlaxoSmithKline (GSK)" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Quantity In Stock</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="fname" name="quantity_in_stock"
                                            placeholder="E.g: 1000" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Unit Price</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="fname" name="unit_price"
                                            placeholder="E.g: Rs.30" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Expiry Date <small
                                            class="text-muted">(dd/mm/yyyy)</small></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control date-inputmask" id="date-mask"
                                            name="expiry_date" placeholder="E.g: 25/12/2023" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success text-white">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

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

        <!-- This Page JS -->
        <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
        <script src="../dist/js/pages/mask/mask.init.js"></script>
        <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
        <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
        <script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
        <script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
        <script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
        <script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
        <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/libs/quill/dist/quill.min.js"></script>

        <script>
            //***********************************//
            // For select 2
            //***********************************//
            $(".select2").select2();

            /*colorpicker*/
            $(".demo").each(function() {
                //
                // Dear reader, it's actually very easy to initialize MiniColors. For example:
                //
                //  $(selector).minicolors();
                //
                // The way I've done it below is just for the demo, so don't get confused
                // by it. Also, data- attributes aren't supported at this time...they're
                // only used for this demo.
                //
                $(this).minicolors({
                    control: $(this).attr("data-control") || "hue",
                    position: $(this).attr("data-position") || "bottom left",

                    change: function(value, opacity) {
                        if (!value) return;
                        if (opacity) value += ", " + opacity;
                        if (typeof console === "object") {
                            console.log(value);
                        }
                    },
                    theme: "bootstrap",
                });
            });
            /*datwpicker*/
            jQuery(".mydatepicker").datepicker();
            jQuery("#datepicker-autoclose").datepicker({
                autoclose: true,
                todayHighlight: true,
            });
            var quill = new Quill("#editor", {
                theme: "snow",
            });
        </script>
        <script>
            const myTimeout = setTimeout(closeAlert, 3000);

            function closeAlert() {
                document.getElementById("alert").style.display = 'none';
            }
        </script>
    @stop
