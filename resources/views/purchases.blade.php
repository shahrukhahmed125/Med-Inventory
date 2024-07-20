@extends('masterpage')
@section('title', 'Purchases')
@section('css')


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
                                    Purchase
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

            @if (session('error'))
                <div class="alert alert-danger" id="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" id="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card bg-success">
                        <div class="card-body">
                            <h1 class="card-title p-3 mt-3 text-white">Purchase Here</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('purchases.store') }}" method="post">
                        @csrf
                        <div class="card p-5">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Select Product</label>
                                    <div class="col-md-9">
                                        <select class="select2 form-select shadow-none" style="width: 100%; height: 36px" name="product_id">
                                            <option>Select</option>
                                            @foreach ($data as $pro)
                                                <option value="{{ $pro->product_id }}">{{ $pro->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                    
                                {{-- <div class="form-group row">
                                    <label class="col-md-3 mt-3">Unit Price</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="fname" value="{{$data->unit_price}}"/>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Quantity</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="fname" name="quantity_purchased"
                                            min="1" placeholder="E.g: 1000" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success text-white">
                                        Submit Purchase
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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

<script>
      const myTimeout = setTimeout(closeAlert, 3000);

function closeAlert() {
    document.getElementById("alert").style.display = 'none';
}
</script>



@stop
