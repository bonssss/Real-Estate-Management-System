@extends('layouts.agent')

@section('content')
    <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Hometypes</h5>
                <form method="POST" action="{{ route('hometypes.edit', $homeType->id) }}" enctype="multipart/form-data">
                    <!-- Email input -->
                    @csrf
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" value="{{ $homeType->propstype }}" name="hometypes" id="form2Example1" class="form-control" placeholder="hometype" />
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