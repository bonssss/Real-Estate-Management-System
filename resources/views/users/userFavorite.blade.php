
@extends('layouts.app')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('assets/images/hero_bg_2.jpg')}});" data-aos="fade" >
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2">Favorite  properties</h1>
        </div>
      </div>
    </div>
  </div>


  <div class="site-section site-section-sm bg-light">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="site-section-title mb-5">
            <h2> Favorite properties</h2>
          </div>
        </div>
      </div>
    
      <div class="row mb-5">
        @if ($FavoriteWithDetails->count() > 0)
        @foreach ($FavoriteWithDetails as $item )
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
            <a href="{{ route('single.prop', $item['property']->id) }}" class="property-thumbnail">
              <div class="offer-type-wrap">
                <span class="offer-type bg-danger">{{ $item['property']->type }}</span>
                {{-- <span class="offer-type bg-success">Rent</span> --}}
              </div>
              <img src="{{ asset('assets/images/' . $item['property']->image) }}" alt="Image" class="img-fluid">
            </a>
            <div class="p-4 property-body">
              <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
              <h2 class="property-title"><a href="{{ route('single.prop', $item['property']->id) }}">{{ $item['property']->title }}</a></h2>
              <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $item['property']->location }}</span>
              <strong class="property-price text-primary mb-3 d-block text-success">{{ $item['property']->price }}</strong>
              <ul class="property-specs-wrap mb-3 mb-lg-0">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number">{{ $item['property']->beds }}+</sup></span>
                  
                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number">{{ $item['property']->baths }}</span>
                  
                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number"> {{ $item['property']->{'sq/ft'} }}</span>
                  
                </li>
              </ul>

            </div>
          </div>
        </div>
        @endforeach
       
        @else
          
       <p class="alert alert-success">No property is saved</p>
          
        @endif
       

        
      </div>
    </div>

  @endsection