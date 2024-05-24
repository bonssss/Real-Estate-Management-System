@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                <form method="POST" action="{{route('admin.properties.save')}}" enctype="multipart/form-data">

                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                    </div>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Property image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>


                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="baths" id="form2Example1" class="form-control" placeholder="baths" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="sq/ft" id="form2Example1" class="form-control" placeholder="SQ/FT" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="year_built" id="form2Example1" class="form-control" placeholder="Year Build" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price/sqft" id="form2Example1" class="form-control" placeholder="Price Per SQ FT" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                      <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                    </div>


                      <div class="form-outline mb-4 mt-4">
                        <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Latitude" />
                      </div>
                      <!-- Longitude input -->
                      <div class="form-outline mb-4 mt-4">
                        <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Longitude" />
                      </div>

                    <select name="home_type" class="form-control form-select" aria-label="Default select example">
                        <option selected>Select Home Type</option>
                        <option value="Residential">Residential</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Mixed Use">Mixed Use</option>
                    </select>
                    <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                        <option selected>Select Type</option>
                        <option value="Buy">For Buy</option>
                        <option value="Rent">For Rent</option>
                    </select>
                    <select name="city" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                      <option selected>Select City</option>
                      <option value="Adama">Adama</option>
                      <option value="Addis Ababa">Addis Ababa</option>
                      <option value="Mexico">Mexico</option>

                  </select>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">More Info</label>
                        <textarea placeholder="More Info" name="more_info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="agent_name" id="form2Example1" class="form-control" placeholder="agent name" />
                    </div>


                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

                </form>

        </div>
      </div>
    </div>
  </div>
@endsection
