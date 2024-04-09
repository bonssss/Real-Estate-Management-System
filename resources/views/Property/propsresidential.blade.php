@extends('layouts.app')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('assets/images/hero_bg_2.jpg')}});" data-aos="fade" >
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2">{{$propstype }} properties</h1>
        </div>
      </div>
    </div>
  </div>


  <div class="site-section site-section-sm bg-light">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="site-section-title mb-5">
            <h2>{{$propstype }} properties</h2>
          </div>
        </div>
      </div>
    
      <div class="row mb-5">
        @if ($propertytypes->count()>0)
        @foreach ($propertytypes as $buyprop )
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
            <a href="{{route('single.prop',$buyprop->id)}}" class="property-thumbnail">
              <div class="offer-type-wrap">
                <span class="offer-type bg-danger">{{$buyprop->type}}</span>
                {{-- <span class="offer-type bg-success">Rent</span> --}}
              </div>
              <img src="{{asset('assets/images/'.$buyprop->image.'')}}" alt="Image" class="img-fluid">
            </a>
            <div class="p-4 property-body">
              <h2 class="property-title"><a href="{{route('single.prop',$buyprop->id)}}">{{$buyprop->title}}</a></h2>
              <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{$buyprop->location}}</span>
              <strong class="property-price text-primary mb-3 d-block text-success">{{$buyprop->price}}</strong>
              <ul class="property-specs-wrap mb-3 mb-lg-0">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number">{{$buyprop->beds}}+</sup></span>
                  
                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number">{{$buyprop->baths}}</span>
                  
                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number"> {{$buyprop->{'sq/ft'} }}</span>
                  
                </li>
              </ul>

            </div>
          </div>
        </div>
        @endforeach
       
        @else
          
       <p class="alert alert-success">No Buy property is found</p>
          
        @endif
       

        
      </div>
    </div>

  @endsection