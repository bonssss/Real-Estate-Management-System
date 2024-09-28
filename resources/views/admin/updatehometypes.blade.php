@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Update Property Types</h5>
      <form method="POST" action="{{route('hometypes.update.save',$propertytypeedit->id)}}" enctype="multipart/form-data">

        @csrf
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="text" value="{{$propertytypeedit->propstype}}" name="propstype" id="form2Example1" class="form-control" placeholder="property type" />

              @error('propstype')
              <span class="text-danger" role="alert">
                <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>


            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


          </form>

        </div>
      </div>
    </div>
  </div>

@endsection
