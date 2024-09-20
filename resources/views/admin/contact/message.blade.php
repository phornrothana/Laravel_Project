@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List Testimonial</h4>
          <div class="row">
            <div class="col-4">
                <form action="{{ route('admin.contact.message') }}" method="get">
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>subject</th>
                  <th>Message</th>
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
                 <td>{{ @$item->name}}</td>
                 <td>{{ @$item->email }}</td>
                 <td>{{ @$item->subject}}</td>
                 <td>
                   @if (@$item->status ==1)
                    <div class="badge badge-outline-success">
                       <a href="{{ route('admin.testimonial.inactive',@$item->id) }}">Read</a>
                    </div>
                   @else
                   <div class="badge badge-outline-danger">
                       <a href="{{ route('admin.testimonial.active',@$item->id) }}">UnRead</a>
                   </div>
                   @endif

                 </td>
                 <td>
                   <a href="{{ route('admin.message.view',@$item->id) }}" class="btn btn-outline-secondary btn-icon-text">
                       view <i class="mdi mdi-file-check btn-icon-append"></i>
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
