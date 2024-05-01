@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #09B0B0 ;">Company</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('company.create') }}" class="btn btn-primary float-right"
                            style="margin-left: 130px;">Add new</a>
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Image Upload </a></li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if (session('message'))
    <div class="alert">{{ session('message') }}</div>
@endif
    <section class="content">
        <div class="container-fluid">

            <!-- <h3 style="color: green;">View all image</h3> -->

            <div class="row">
                @foreach ($data as $brn)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ $brn->name }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <img src="{{ asset('/image/company/'.$brn->logo)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                Contact Number:</br>
                                                {{ $brn->contact_number }}</br>
                                                Annual Turnover:</br>
                                                {{ $brn->annual_turnover }}
                                                </br>
                                                Created At:</br>
                                                {{ $brn->created_at }}
                                            </div>
                                            <div class="col-md-12">
                                        <div class="info-box-content">
                                            {{ $brn->description }}
                                        </div>   
                                        </div> 
                                        </div>  
                                    <div class="row">
                                        <div class="col-md-6">
                                    <a href="{{ route('company.edit', $brn->company_id) }}"
                                        class="btn btn-sm btn-primary">View/Edit</a>
                                        </div>
                                        <div class="col-md-6">
              <form method="POST" action="{{ route('company.destroy',encrypt($brn->company_id)) }}">
                @csrf
                 <input name="_method" type="hidden" value="DELETE">
                 <button type="submit" class="btn btn-sm btn-danger" onclick="confirm('Are you sure!')" data-toggle="tooltip"title='Delete'>Delete</button>
                 </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                @endforeach
                <!-- ./col -->
            </div>
        </div>



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
