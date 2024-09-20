@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Image Edit</h4>
        <p class="card-description"> Make sure Before Update </p>
        <form class="forms-sample" method="post" action="{{ route('admin.blog.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ @$data->id }}">
          <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{@$data->title}}" required placeholder="title">
          </div>
          <div class="form-group">
            <label>File upload</label>
            <div class="input-group col-xs-12">
              <input type="file" name="image" id="image_profile_blog" class="form-control file-upload-info"  placeholder="Upload Image" accept="image/*">
            </div>
          </div>
          <div class="mb-3 profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-ms rounded-circle "  id="showimage" src="{{(!empty(@$data->image)) ?
                  asset(@$data->image) : asset('backend/upload/admin_image/no_image.jpg')}}" width="80" height="80" alt="">
                <span class="count bg-success"></span>
              </div>
            </div>
          </div>
          <button type="submit" class="mr-2 btn btn-primary">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>
      </div>
    </div>
  </div>
{{-- Click Change Image --}}
<script type="text/javascript">
        $(document).ready(function(){
            $("#image_profile_blog").change(function(e){
                var readerView = new FileReader();
                readerView.onload = function(e){
                    $("#showimage").attr("src",e.target.result);
                }
                readerView.readAsDataURL(e.target.files['0'])
            })
        });
</script>
@endsection
