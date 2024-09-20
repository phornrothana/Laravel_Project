@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">View Detail</h4>
          <hr>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><label for="">Name : </label>{{  @$message->name}}</h4>
                    <p class="card-text">
                        <label for="">Email :</label> {{ @$message->email }}
                    </p>
                    <p class="card-text">
                        <label for="">Subject :</label> {{ @$message->subject }}
                    </p>
                    <p class="card-text">
                        <label for="">Message :</label> {{ @$message->message }}
                    </p>
                    <p class="card-text">
                        <label for="">Submit Time :</label> {{ @$message->created_at->format('Y-m-d') }}
                    </p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

