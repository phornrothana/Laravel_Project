@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Image Edit</h4>
        <p class="card-description"> Make sure Before Update </p>
        <form class="forms-sample" method="post" action="{{ route('admin.service.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ @$service->id }}">
          <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{@$service->title}}" required placeholder="title">
          </div>
          <div class="form-group">
            <label for="icon">icon</label>
            <input type="text" class="form-control" id="icon" name="icon" value="{{@$service->icon}}" required placeholder="icon">
          </div>
          <div class="form-group">
            <label for="des">des</label>
            <textarea class="form-control" name="des" id="des" cols="30" rows="10">
                {{ @$service->des }}
            </textarea>
          </div>
          <button type="submit" class="mr-2 btn btn-primary">Submit</button>
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
