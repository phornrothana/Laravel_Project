@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Footer </h4>
            <p class="card-description">Please make sure before update</p>
            <form method="post" action="{{ route('admin.store.Footer') }}" class="forms-sample">
                @csrf
                <input type="hidden" name="id" value="{{ @$Footer->id }}">

              <div class="form-group">
                <label for="twitter">twitter</label>
                <input type="text" class="form-control" name="twitter" value="{{@$Footer->twitter}}" placeholder="Twitter">
              </div>
              <div class="form-group">
                <label for="facebook">facebook</label>
                <input type="text" class="form-control" name="facebook" value="{{@$Footer->facebook}}" placeholder="facebook">
              </div>
              <div class="form-group">
                <label for="instagram">instagram</label>
                <input type="text" class="form-control" name="instagram" value="{{@$Footer->instagram}}" placeholder="instagram">
              </div>
              <div class="form-group">
                <label for="link">link</label>
                <input type="text" class="form-control" name="link" value="{{@$Footer->link}}" placeholder="link">
              </div>
              <div class="form-group">
                <label for="copyright_by">copyright by</label>
                <input type="text" class="form-control" name="copyright_by" value="{{@$Footer->copyright_by}}" placeholder="copyright by">
              </div>
              <div class="form-group">
                <label for="design_by">design by</label>
                <input type="text" class="form-control" name="design_by" value="{{@$Footer->design_by}}" placeholder="design by">
              </div>
              <button type="submit" class="mr-2 btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
