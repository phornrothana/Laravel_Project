@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List Blog Image</h4>
          <div class="row">
            <div class="col-4">
                <a href="{{ route('admin.blog.image.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="btn-icon-prepend">Create New Blog Image</i>
                </a>
            </div>
            <div class="col-4">
                <form action="{{ route('admin.blog.image') }}" method="get">
                    <input type="text" name="search" id="search" value="{{@request('search')}}" class="form-control">
                    <button type="submit" id="search" class="mt-2 btn btn-primary">Search</button>
                </form>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    <div class="m-0 form-check form-check-muted">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </th>
                  <th>Image</th>
                  <th>Title</th>
                  <th> Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($data as $item)
                 <tr>
                  <td>
                    <div class="m-0 form-check form-check-muted">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td>
                    <img src="{{asset(@$item->image) }}" alt="image" />
                  </td>
                  <td>{{ @$item->title }}</td>
                  <td>
                    @if (@$item->status ==1)
                     <div class="badge badge-outline-success">
                        <a href="{{ route('admin.blog.inactive',@$item->id) }}">Active</a>
                     </div>
                    @else
                    <div class="badge badge-outline-danger">
                        <a href="{{ route('admin.blog.active',@$item->id) }}">InActive</a>
                    </div>
                    @endif

                  </td>
                  <td>
                    <a href="{{ route('admin.blog.edit',@$item->id) }}" class="btn btn-outline-secondary btn-icon-text">
                        Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                      </a>
                  </td>
                  <td>
                    <a href="{{ route('admin.blog.detail',@$item->id) }}" class="btn btn-outline-primary btn-icon-text">
                        View <i class="mdi mdi-eye-check btn-icon-append"></i>
                      </a>
                  </td>
                </tr>
                  @endforeach
              </tbody>

            </table>
          </div>
          {{ $data->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
