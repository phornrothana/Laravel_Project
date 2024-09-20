@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Home Information</h4>
            <p class="card-description">Please make sure before update</p>
            <form method="post" action="{{ route('admin.store.Home') }}" class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{ @$Home->id }}">
              <div class="form-group">
                <label for="shortitle">Short Title</label>
                <input type="text" class="form-control" name="short_title" value="{{@$Home->short_title}}" placeholder="Short Title">
              </div>
              <div class="form-group">
                <label for="longtitle">Long Title</label>
                <input type="text" class="form-control" name="long_title" value="{{ @$Home->long_title }}"   placeholder="Long Title">
              </div>
              <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" name="url" value="{{ @$Home->url }}" placeholder="URL">
              </div>
              <button type="submit" class="mr-2 btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
