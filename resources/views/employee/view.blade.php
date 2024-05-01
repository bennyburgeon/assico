@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #09B0B0 ;">Employee</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('employee.create') }}" class="btn btn-primary float-right"
                            style="margin-left: 130px;">Add new</a>
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Image Upload </a></li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- <h3 style="color: green;">View all image</h3> -->

            <div class="row">
            {!! $dataTable->table(['class' => 'table table-bordered']) !!}
            </div>
        </div>
        {!! $dataTable->scripts() !!}


    </section>
@endsection

@section('script')
    <script type="text/javascript">
        document.getElementById('salonz').className = 'nav-link active';

        $(".google-rating").starRating({
            readOnly: true,
            strokeColor: '#894A00',
            strokeWidth: 10,
            starSize: 25
        });

        $(".facebook-rating").starRating({
            readOnly: true,
            initialRating: 4,
            strokeColor: '#894A00',
            strokeWidth: 10,
            starSize: 25
        });
    </script>
@endsection
