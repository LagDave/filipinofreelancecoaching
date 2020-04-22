@extends('layouts.enrollment_basic_info')
@section('form')
@if (count($errors) > 0)
 
        <div class="alert alert-danger">
 
            <strong>Opps!</strong> There were something went wrong with your input.
 
            <ul>
 
                @foreach ($errors->all() as $error)
 
                    <li>{{ $error }}</li>
 
                @endforeach
 
            </ul>
 
        </div>
      <br>
    @endif

<form method='POST' enctype="multipart/form-data" action="/home/enroll/yearly/apply" class="form">
  <div class="custom-file-container" data-upload-id="proofUpload">
    <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
    <label class="custom-file-container__custom-file" >
        <input required name='image' type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="Choose File">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview"></div>
</div>
<button type='submit' class="btn btn-primary w-100">APPLY NOW</button>
</form>


@endsection