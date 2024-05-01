@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: #09B0B0 ;">Company Update</h1>
                </div>

            </div>
        </div>
    </div>


    <section class="content">
        <div class="col-sm-12"><br>
            <!-- text input -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('company.update', $data->company_id) }}" method="post" id="cardUpload"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control"
                                placeholder="Please enter Employee">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="imageUpload">Upload Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageUpload">
                                    <label id="imageUploadLabel" class="custom-file-label" for="imageUpload">Choose
                                        file</label>
                                        
                                </div><img src="{{ asset('/image/company/'.$data->logo)}}"  width="50" height="60">

                            </div>

                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>contact Number</label>
                                    <input type="text" value="{{ $data->contact_number }}" name="contact_number" class="form-control"
                                placeholder="Please enter your contact number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Annual Turnover</label>
                                    <input type="text" name="annual_turnover" value="{{ $data->annual_turnover }}" class="form-control"
                                placeholder="Please enter your Annual turnover">
                                </div>
                            </div>
                      
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="8" name="description"
                                        placeholder="Please enter a description in less than 150 words">
                                        {{ $data->description }}
                                    </textarea>
                                </div> 
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
