@extends('admin.admin_master')
@section('admin')
<div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Profile </h4>
        <div class="py-4 d-flex">
          <div class="preview-list w-100">
            <div class="p-0 preview-item">
              <div class="preview-thumbnail">
                <img class=" rounded-circle"   src="{{(!empty(@$viewAdminData->profile_image)) ?
                  asset('backend/upload/admin_image/'.@$viewAdminData->profile_image) : asset('backend/upload/admin_image/no_image.jpg')}}"  alt="">
              </div>
              <div class="flex-grow preview-item-content d-flex">
                <div class="flex-grow">
                  <div class="text-muted d-flex d-md-block d-xl-flex justify-content-between">
                    <h6><strong>Name :</strong>{{ @$viewAdminData->name }}</h6>
                  </div>
                  <div class="text-muted d-flex d-md-block d-xl-flex justify-content-between">
                    <h6> <strong>Username :</strong>{{ @$viewAdminData->username }}</h6>
                  </div>
                  <div class="text-muted d-flex d-md-block d-xl-flex justify-content-between">
                    <h6><strong>Email :</strong> {{ @$viewAdminData->email }}</h6>
                  </div>
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pt-3 row">
              <div class="col-12">
                <a href="{{ route('admin.edit.profile') }}" class="btn btn-outline-secondary btn-icon-text">
                  Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
