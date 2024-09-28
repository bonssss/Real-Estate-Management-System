@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/hero_bg_2.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('success') !!}</p>
                    </div>
                @endif
                <div class="col-md-12 col-lg-8 mb-5">



                    <form action="{{ route('contacts.submit') }}" method="POST" class="p-5 bg-white border">
                        @csrf

                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" class="form-control"
                                    placeholder="Full Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Subject</label>
                                <input type="text" id="subject" class="form-control" name="subject"
                                    placeholder="Enter Subject">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                                    placeholder="Say hello to us"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary  py-2 px-4 rounded-0">
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h6 text-black mb-3 text-uppercase">Contact Info</h3>
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">Rwanda St, Addis Ababa, Ethiopia</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">098 351 5151</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">hiya@gmail.com</a></p>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container" data-aos="fade">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Our Agents</h2>
                        <p>Our agents are more than just professionals—they're your partners in achieving
                            your real estate goals. With a deep understanding of the market and a commitment to
                             personalized service, each agent brings a unique blend of expertise and passion to
                             ensure your experience is nothing short of exceptional. Get to know our team and discover
                             why Hiya Real Estate is your trusted choice for all your real estate needs.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Eyob</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>our seasoned agent dedicated to realizing your dream home. With expert local knowledge
                                and personalized service, Emily exceeds expectations at every turn.</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image"
                            class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Abel</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p>your dedicated real estate agent. With a passion for matching clients with
                                 their perfect properties and a commitment to exceptional service,
                                  Abel is here to guide you through every
                                step of your real estate journey with professionalism and care.</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                    <div class="team-member">

                        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image"
                            class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Bonsa </h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                            <p> your trusted partner in real estate. With a focus on understanding your unique needs and a dedication to delivering results.</p>
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
