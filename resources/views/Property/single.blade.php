@extends('layouts.app')

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/' . $singleProp->image . '') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">{{ $singleProp->title }}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{ $singleProp->price }}</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
            </div>
        @endif
    </div>

    <div class="container">
        @if (\Session::has('save'))
            <div class="alert alert-success">
                <p>{!! \Session::get('save') !!}</p>
            </div>
        @endif
    </div>


    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach ($propertyimages as $propimages)
                                <div><img src="{{ asset('assets/postimages/' . $propimages->image . '') }}" alt="Image"
                                        class="img-fluid"></div>
                            @endforeach

                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">{{ $singleProp->price }}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $singleProp->beds }}<sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $singleProp->baths }}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $singleProp->{'sq/ft'} }}</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                                <strong class="d-block">{{ $singleProp->home_type }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                <strong class="d-block">{{ $singleProp->year_built }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                <strong class="d-block">{{ $singleProp->{'price/sqft'} }}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>

                        <p>{{ $singleProp->more_info }}</p>

                        <div id="map" class="site-section site-section-sm bg-light" style="height: 400px;">
                        <!-- Leaflet.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- Initialize the map -->
<script>
    var map = L.map('map').setView([{{ $singleProp->latitude }}, {{ $singleProp->longitude }}], 13);

    // Add OpenStreetMap tiles as the base layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker at the property's location
    L.marker([{{ $singleProp->latitude }}, {{ $singleProp->longitude }}]).addTo(map)
        .bindPopup('{{ $singleProp->title }}') // Add a popup with the property's title
        .openPopup(); // Automatically open the popup when the marker is added to the map
</script>

                        </div>

                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>

                            @foreach ($propertyimages as $propimages)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('assets/postimages/' . $propimages->image . '') }}"
                                        class="image-popup gal-item"><img
                                            src="{{ asset('assets/postimages/' . $propimages->image . '') }}"
                                            alt="Image" class="img-fluid"></a>

                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        @if (isset(Auth::user()->id))
                            @if ($formvalidation > 0)
                                <p class="alert alert-success"> You already sent request</p>
                            @else
                            @if($singleProp->status !== 'rented' && $singleProp->status !== 'sold')                                    <form action="{{ route('insert.request', $singleProp->id) }}" method="POST" class="form-contact-agent">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="prop_id" value="{{ $singleProp->id }}" id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="agent_name" value="{{ $singleProp->agent_name }}" id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                            @error('email')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone_number" id="phone" class="form-control">
                                            @error('phone_number')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" id="phone" class="btn btn-primary" value="Send request">
                                        </div>
                                    </form>
                                @endif
                            @endif
                        @else
                            <p class="alert alert-warning">Log in to send request</p>
                        @endif
                    </div>



                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Save Favorite</h3>
                        @if (isset(Auth::user()->id))
                            @if ($favoritevalidation > 0)
                                <p class="alert alert-success"> You already saved the property</p>
                            @else
                                @if($singleProp->status !== 'rented' && $singleProp->status !== 'sold')
                                    <form action="{{ route('save.favorite', $singleProp->id) }}" method="POST" class="form-contact-agent">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="prop_id" value="{{ $singleProp->id }}" id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="title" value="{{ $singleProp->title }}" id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $singleProp->image }}" name="image" id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $singleProp->location }}" name="location" id="location" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $singleProp->price }}" name="price" id="phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" id="phone" class="btn btn-primary" value="save property">
                                        </div>
                                    </form>
                                @endif
                            @endif
                        @else
                            <p class="alert alert-warning">Login to save to favorite</p>
                        @endif
                    </div>


                    <!-- Payment Form Section -->
                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Make a Payment</h3>
                        @if ($singleProp->status !== 'rented' && $singleProp->status !== 'sold')
                            <form action="" method="POST" class="form-payment">
                                @csrf
                                <!-- Payment Form Fields -->
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" value="{{ $singleProp->price }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select name="currency" id="currency" class="form-control">
                                        <option value="USD">USD</option>
                                        <option value="USD">ETB</option>
                                        <!-- Add other currency options as needed -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="firstName" id="firstName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" name="lastName" id="lastName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tx_ref">Transaction Reference</label>
                                    <input type="text" name="tx_ref" id="tx_ref" class="form-control">
                                </div>
                                <!-- Other Payment Fields -->
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Make Payment">
                                </div>
                            </form>
                        @else
                            <p class="alert alert-warning">Payment is not available for this property because it is either rented or sold.</p>
                        @endif
                    </div>


                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                        <div class="px-3" style="margin-left: -15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=&quote="
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span
                                    class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url="
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Related Properties</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @if ($relatedProperties->count() > 0)
                    @foreach ($relatedProperties as $relatedprop)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="property-entry h-100">
                                <a href="{{ route('single.prop', $relatedprop->id) }}" class="property-thumbnail">
                                    <div class="offer-type-wrap">
                                        <span class="offer-type bg-danger">{{ $relatedprop->type }}</span>
                                        {{-- <span class="offer-type bg-success">Rent</span> --}}
                                    </div>
                                    <img src="{{ asset('assets/images/' . $relatedprop->image . '') }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="p-4 property-body">
                                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                    <h2 class="property-title"><a
                                            href="{{ route('single.prop', $relatedprop->id) }}">{{ $relatedprop->title }}</a>
                                    </h2>
                                    <span class="property-location d-block mb-3"><span
                                            class="property-icon icon-room"></span> {{ $relatedprop->location }}</span>
                                    <strong
                                        class="property-price text-primary mb-3 d-block text-success">{{ $relatedprop->price }}</strong>
                                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                                        <li>
                                            <span class="property-specs">Beds</span>
                                            <span class="property-specs-number">{{ $relatedprop->beds }}+</sup></span>

                                        </li>
                                        <li>
                                            <span class="property-specs">Baths</span>
                                            <span class="property-specs-number">{{ $relatedprop->baths }}</span>

                                        </li>
                                        <li>
                                            <span class="property-specs">SQ FT</span>
                                            <span class="property-specs-number"> {{ $relatedprop->{'sq/ft'} }}</span>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="alert alert-success">No related property is found</p>
                @endif



            </div>
        </div>

    @endsection
