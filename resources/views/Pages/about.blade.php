@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/hero_bg_2.jpg') }});" data-aos="fade">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">About Hiya Real-Estate</h1>
            </div>
        </div>
    </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/about.jpg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="site-section-title">
                        <h2>Our Company</h2>
                    </div>
                    <p class="lead">"Hiya Real Estate is more than just a property agency; we're your
                         trusted partners in finding your dream home or making the most of your investment.
                         With a commitment to personalized service, integrity, and expertise, we strive to exceed
                          your expectations every step of the way. Whether you're buying, selling, or renting, Hiya Real Estate
                         is here to guide you through the process with professionalism and care."</p>
                    <p><a href="#" class="btn btn-outline-primary rounded-0 py-2 px-5">Read More</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center" data-aos="fade-up">
                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Leadership</h2>
                        <p>"Dive into our Leadership section to meet the driving
                            force behind Hiya Real Estate. Discover the individuals who bring expertise,
                            vision, and dedication to every aspect of our business. Learn more about their
                             backgrounds and their commitment to excellence in real estate."






                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">

                        <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Eyob</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Real Estate Manager>
                            <p>Our dedicated Real Estate Manager. With a wealth of experience and a passion for
                                 excellence, Eyob oversees every aspect of our real estate operations with precision
                                 and care. Discover how Megan's expertise ensures that every client's needs are met with professionalism and integrity.</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">

                        <img src="{{ asset('assets/images/person_2.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Mekdes</h2>
                            <span class="d-block mb-3 text-white-opacity-05">Sales Director</span>
                            <p>Our dynamic Sales Director. With a keen eye for market trends and a passion for customer satisfaction, Sarah leads our sales team with enthusiasm and expertise.
                                Her strategic approach and unwavering commitment to client success ensure that every transaction is executed with precision and care.</p>
                            <p>
                                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member">

                        <img src="{{ asset('assets/images/person_3.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

                        <div class="text">

                            <h2 class="mb-2 font-weight-light text-black h4">Bonsa </h2>
                            <span class="d-block mb-3 text-white-opacity-05">Property Director</span>
                            <p>our dedicated Property Manager. With years of experience in the industry,
                                Bonsa oversees our portfolio with diligence and professionalism. From tenant
                                relations to property maintenance, Michael's attention to detail and proactive approach ensure that our properties are managed
                                 to the highest standards, maximizing returns for our clients</p>
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

    <div class="site-section">
        <div class="container">

            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <div class="site-section-title">
                        <h2>Frequently Ask Questions</h2>
                    </div>
                    <p>Welcome to our Frequently Asked Questions (FAQ) section, where we address common
                        inquiries about our services, processes, and more. Explore below to find answers
                        to questions you may have. If you don't find what you're looking for,
                        feel free to reach out to our team for further assistance.</p>
                </div>
            </div>

            <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
                <div class="col-md-8">
                    <div class="accordion unit-8" id="accordion">
                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button"
                                    aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span
                                        class="icon"></span></a>
                            </h3>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="body-text">
                                    <p>The name of our company is "Hiya Real Estate"</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button"
                                    aria-expanded="false" aria-controls="collapseTwo">How much pay for 3 months?<span
                                        class="icon"></span></a>
                            </h3>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="body-text">
                                    <p>The pricing for services or products can vary widely depending on the specific
                                         offerings of "Hiya Real Estate." Typically, pricing may depend on factors such
                                         as the type of service (buying, selling, renting), location, property value, and any additional services provided. It's best to directly contact
                                        "Hiya Real Estate" for accurate pricing information tailored to your needs.</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button"
                                    aria-expanded="false" aria-controls="collapseThree">Do I need to register? <span
                                        class="icon"></span></a>
                            </h3>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="body-text">
                                    <p>registration would be required for features like sending requests, saving favorites,
                                         and contacting agents on many real estate websites. </p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button"
                                    aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of
                                    support.<span class="icon"></span></a>
                            </h3>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="body-text">
                                    <p>In case of needing support, you should contact our customer support team at support@hiyarealestate.com or call our support hotline at +251-938-756-685.
                                        We're here to assist you with any questions or issues you may have regarding our services.</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
