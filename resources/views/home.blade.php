@extends('layouts.app')

@section('content')
    {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

    <div class="slide-one-item home-slider owl-carousel">

        @foreach ($Props as $prop)
            <div class="site-blocks-cover overlay"
                style="background-image: url({{ asset('assets/images/' . $prop->image . '') }});" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10">


                            @if ($prop->status == 'Processing')
                                        {{-- Display the offer type based on the property type --}}
                                        @if ($prop->type == 'Buy')
                                        <span
                                        class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                                            @else
                                            <span
                                            class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                                                @endif
                                        {{-- Check if the status is 'sold' or 'rented' --}}
                                    @elseif ($prop->status == 'sold')
                                        {{-- Display a different offer type for sold or rented properties --}}
                                        <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">Sold</span>
                                    @elseif ($prop->status == 'rented')
                                        <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded offer-type bg-info">Rented</span>
                                    @endif
                            <h1 class="mb-2">{{ $prop->title }}</h1>
                            <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ $prop->price }}</strong>
                            </p>
                            <p><a href="{{ route('single.prop', $prop->id) }}"
                                    class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        {{-- <div class="site-blocks-cover overlay" style="background-image: url({{asset('assets/images/hero_bg_2.jpg')}});" data-aos="fade">
                  <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                      <div class="col-md-10">
                        <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">For Sale</span>
                        <h1 class="mb-2">Apartement</h1>
                        <p class="mb-5"><strong class="h2 text-success font-weight-bold">$1,000,500</strong></p>
                        <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
                      </div>
                    </div>
                  </div>
                </div>   --}}

    </div>
    </div>

    {{--  Search Section --}}

    <div class="site-section site-section-sm pb-0">
        <div class="container">
            <div class="row">
                <form action="{{ route('search.property') }}" method="POST" class="form-search col-md-12"
                    style="margin-top: -100px;">
                    @csrf
                    <div class="row  align-items-end">
                        <div class="col-md-3">
                            <label for="list-types">Listing Types</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="list_types" id="list-types" class="form-control d-block rounded-0">
                                    <option value="Residential">Residential</option>
                                    <option value="Mixed-Use">Mixed-Use</option>
                                    <option value="Apartment">Apartment</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="offer-types">Offer Type</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="offer_types" id="offer-types" class="form-control d-block rounded-0">
                                    <option value="Buy">For Buy</option>
                                    <option value="Rent">For Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="select-city">Select City</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="city" id="select-city" class="form-control d-block rounded-0">
                                    <option value="AddisAbaba">AddisAbaba</option>
                                    <option value="Adama">Adama</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Ayat">Ayat</option>
                                    <option value="Sarbet">Sarbet</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input name="submit" type="submit" class="btn btn-success text-white btn-block rounded-0"
                                value="Search">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                        <div class="mr-auto">
                            <a href="{{ 'home' }}" class="icon-view view-module active"><span
                                    class="icon-view_module"></span></a>

                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <div>
                                <a href="{{ 'home' }}" class="view-list px-3 border-right active">All</a>
                                <a href="{{ 'props/type/Rent' }}" class="view-list px-3 border-right">Rent</a>
                                <a href="{{ 'props/type/Buy' }}" class="view-list px-3">Buy</a>

                                {{-- price --}}
                                <a href="{{ route('orderby.asce.price') }}" class="view-list px-3">asce</a>

                                <a href="{{ route('orderby.desce.price') }}" class="view-list px-3">desc</a>



                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>
    </div>

    {{-- Property  list section --}}
    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row mb-5">
                @foreach ($Props as $prop)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $prop->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    {{-- Check if the status is 'processing' --}}
                                    @if ($prop->status == 'Processing')
                                        {{-- Display the offer type based on the property type --}}
                                        @if ($prop->type == 'Buy')
                                            <span class="offer-type bg-success">{{ $prop->type }}</span>
                                        @else
                                            <span class="offer-type bg-danger">{{ $prop->type }}</span>
                                        @endif
                                        {{-- Check if the status is 'sold' or 'rented' --}}
                                    @elseif ($prop->status == 'sold')
                                        {{-- Display a different offer type for sold or rented properties --}}
                                        <span class="offer-type bg-info">Sold</span>
                                    @elseif ($prop->status == 'rented')
                                        <span class="offer-type bg-info">Rented</span>
                                    @endif
                                </div>

                                <img src="{{ asset('assets/images/' . $prop->image . '') }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title"><a
                                        href="{{ route('single.prop', $prop->id) }}">{{ $prop->title }}</a></h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                    {{ $prop->location }}</span>
                                <strong
                                    class="property-price text-primary mb-3 d-block text-success">${{ $prop->price }}</strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $prop->beds }} <sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $prop->baths }}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $prop->{'sq/ft'} }}</span>

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



    {{-- why choose us --}}

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="site-section-title">
                        <h2>Why Choose Us?</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto
                        error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque,
                        deleniti cupiditate officia.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-house"></span>
                        <h2 class="service-heading">Research Subburbs</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-sold"></span>
                        <h2 class="service-heading">Sold Houses</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-camera"></span>
                        <h2 class="service-heading">Security Priority</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
            </div>
        </div>
    </div>




    {{-- agents --}}

    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5 justify-content-center">


                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Our Agents</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur
                            labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima
                            quibusdam, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="{{ asset('assets/agents/1713435383_person_3.jpg') }}" alt="Image"
                            class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere
                                blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore cupiditate, vitae
                                minus obcaecati provident beatae!</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection
