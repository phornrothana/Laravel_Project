@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Category</h4>
          <form class="forms-sample" method="Post" action="{{route('admin.category.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{@$category->id}}">
            <div class="form-group">
              <label for="category">Category</label>
              <input type="text" class="form-control" id="category" name="category" value="{{@$category->category}}" placeholder="Category">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <input type="text" class="form-control" id="text" name="text" value="{{@$category->text}}" placeholder="Text">
            </div>
              <button type="submit" class="mr-2 btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Upload Image</h4>
          <form class="forms-sample" method="Post" action="{{route('admin.store.category.detail',@$category->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="category_id" id="category_id" value="{{@$category->id}}">
                <label>File upload</label>
                <div class="input-group col-xs-12">
                  <input type="file" name="image" id="image" class="form-control file-upload-info"  placeholder="Upload Image" accept="image/*">
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
