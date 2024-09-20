@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create User</h4>
          <form class="forms-sample" method="Post" action="{{route('admin.user.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{@$user->id}}">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ @$user->name }}"  required placeholder="Name">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ @$user->username }}"   required placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ @$user->email }}"   required placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
            </div>

            <div class="form-group">
                 <label>File upload</label>
                 <div class="input-group col-xs-12">
                  <input type="file" name="profile_image" id="profile_image" class="form-control file-upload-info"  placeholder="Upload Image" accept="image/*">
                 </div>
            </div>
            <div class="mb-3 profile-desc">
                <div class="profile-pic">
                  <div class="count-indicator">
                    <img class="img-ms rounded-circle "  id="showimage" src="{{(!empty(@$user->profile_image)) ?
                  asset('backend/upload/admin_image/' . $user->profile_image) : asset('backend/upload/admin_image/no_image.jpg')}}" width="80" height="80" alt="">
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
        $("#profile_image").change(function(e){
            var readerView = new FileReader();
            readerView.onload = function(e){
                $("#showimage").attr("src",e.target.result);
            }
            readerView.readAsDataURL(e.target.files['0'])
        })
    });
</script>
@endsection
