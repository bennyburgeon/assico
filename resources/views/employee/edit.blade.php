@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #09B0B0 ;">Employee</h1>
                </div>

            </div>
        </div>
    </div>


    <section class="content">
        <div class="col-sm-12"><br>
            <!-- text input -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employee.update', $data->employee_id) }}" method="post" id="cardUpload"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" name="name"  value="{{ $data->name }}"  class="form-control"
                                placeholder="Please enter a Employee name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="imageUpload">Upload image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageUpload">
                                    <label id="imageUploadLabel" class="custom-file-label" for="imageUpload">Choose
                                        file</label>
                                </div>
                                <img src="{{ asset('/image/employee/'.$data->image)}}"  width="50" height="60">
                            </div>

                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text"  value="{{ $data->email }}"  name="email" class="form-control"
                                placeholder="Please enter a email id">    
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" value="{{ $data->mobile_number }}" name="mobile_number" class="form-control"
                                placeholder="Please enter a mobile number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <select name="company" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($company as $comp)
                                        <option @if($data->company == $comp->company_id) selected @endif value="{{$comp->company_id}}">{{$comp->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Join Date</label>
                                    <input type="date" value="{{ $data->join_date }}"  name="join_date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-primary" style="width: 100px;">Update</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection

@section('script')


    <script type="text/javascript">
        $(function() {
            bsCustomFileInput.init();
        });


        $('#imageUpload').change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    $('#imgPrev').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script type="text/javascript">
        document.getElementById('salonz').className = 'nav-link active';
    </script>
@endsection
