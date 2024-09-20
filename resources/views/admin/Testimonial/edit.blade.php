@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Testimonial</h4>
          <form class="forms-sample" method="Post" action="{{route('admin.testimonial.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{@$testimonial->id}}">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{@$testimonial->name}}" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="position">Poistion</label>
                <input type="text" class="form-control" id="position" name="position" value="{{@$testimonial->position}}" placeholder="position">
            </div>
            <div class="form-group">
                <label for="rate">Rate</label>
                <input type="text" class="form-control" id="rate" name="rate" value="{{@$testimonial->rate}}" placeholder="Rate">
            </div>
            <div class="form-group">
                <label for="rate">Rate</label>
                <textarea name="des" class="form-control" id="des" cols="30" rows="10">
                    {!! @$testimonial->des !!}
                </textarea>
            </div>
            <div class="form-group">
                 <label>File upload</label>
                 <div class="input-group col-xs-12">
                  <input type="file" name="image" id="image" class="form-control file-upload-info"  placeholder="Upload Image" accept="image/*">
                 </div>
            </div>
              <div class="mb-3 profile-desc">
                <div class="profile-pic">
                  <div class="count-indicator">
                    <img class="img-ms rounded-circle "  id="showimage" src="{{(!empty(@$testimonial->image)) ?
                  asset(@$testimonial->image) : asset('backend/upload/admin_image/no_image.jpg')}}" width="80" height="80" alt="">
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
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#image").change(function(e){
            var readerView = new FileReader();
            readerView.onload = function(e){
                $("#showimage").attr("src",e.target.result);
            }
            readerView.readAsDataURL(e.target.files['0'])
        })
    });
</script>
@endsection
