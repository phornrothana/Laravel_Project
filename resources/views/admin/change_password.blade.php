@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Change Password</h4>
        <p class="card-description"> Make sure Before Update </p>
        @include('message.message')
        <form class="forms-sample" method="post" action="{{ route('admin.update.password') }}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="oldpassword">old Password</label>
            <input type="password" class="form-control" id="oldpassword" name="oldpassword" value=""  placeholder="old Password" autofocus>
          </div>
          <div class="form-group">
            <label for="newpassword">New Password</label>
            <input type="password" class="form-control" id="newpassword" name="newpassword" value=""  placeholder="New Password" >
          </div>
          <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value=""  placeholder="Confirm Password" >
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
            $("#image_profile").change(function(e){
                var readerView = new FileReader();
                readerView.onload = function(e){
                    $("#showimage").attr("src",e.target.result);
                }
                readerView.readAsDataURL(e.target.files['0'])
            })
        });
</script>
@endsection
