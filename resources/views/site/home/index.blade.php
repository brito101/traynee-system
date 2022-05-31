@extends('site.master.master')

@section('content')
    <div class="banner-slider-area">
        <div class="banner-slider owl-carousel owl-theme">
            <div class="banner-item item-bg1">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-item-content">
                                <span class="bg-warning"></span>
                                <h1>Estudante</h1>
                                <p>As melhores empresas buscam os melhores talentos na {{ env('APP_NAME') }}.</p>
                                <div class="banner-btn">
                                    <a href="#" class="default-btn btn-bg-two border-radius-50">Cadastre seu
                                        currículo <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-item item-bg2">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-item-content">
                                <span class="bg-primary"></span>
                                <h1>Empresas</h1>
                                <p>Cadastre-se para contratar os melhores talentos do mercado.</p>
                                <div class="banner-btn">
                                    <a href="#" class="default-btn btn-bg-one border-radius-50 text-dark">Cadastre-se <i
                                            class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-item item-bg3">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="banner-item-content">
                                <span></span>
                                <h1>Seja um Franqueado</h1>
                                <p>Já somos mais de 100 unidades espalhadas pelo Brasil em menos de 1ano.</p>
                                <div class="banner-btn">
                                    <a href="#" class="default-btn btn-bg-two border-radius-50">Conheça Agora! <i
                                            class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="work-process-area-two pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">01.</div>
                                <h3>Discovery</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis tempor nunc
                                    ac sollicitudin Interdum.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">02.</div>
                                <h3>Planning</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis tempor nunc
                                    ac sollicitudin Interdum.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">03.</div>
                                <h3>Execute</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis tempor nunc
                                    ac sollicitudin Interdum.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="work-process-card-two">
                                <div class="number-title">04.</div>
                                <h3>Deliver</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis tempor nunc
                                    ac sollicitudin Interdum.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="work-process-rightside">
                        <div class="section-title">
                            <span class="sp-color1">Our Working Process</span>
                            <h2>Our Services Will Help You to Grow Your Business</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pharetra risus turpis, non
                                auctor risus dignissim ut. Integer porttitor libero id ante elementum imperdiet. Ut
                                pulvinar, risus at egestas pharetra, massa lorem hendrerit neque, ut ultricies nulla.
                            </p>
                        </div>
                        <a href="contact.html" class="default-btn btn-bg-two border-radius-5 text-center">Get A
                            Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="about-area about-bg2 pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-5">
                        <img src="assets/images/about/about-img5.png" alt="About Images">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-3 ml-20">
                        <div class="section-title">
                            <span class="sp-color2">About Your Company</span>
                            <h2>We Are Increasing Business With Promising It Services</h2>
                            <p>
                                Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis
                                sem nibh id elit.
                                Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum
                                auctor a ornare odio.
                            </p>
                        </div>
                        <h3>We Have 22+ Years Of Experience. We Offer It Solutions , Digital Technology Service</h3>
                        <div class="all-skill-bar">
                            <div class="skill-bar" data-percentage="90%">
                                <h4 class="progress-title-holder clearfix">
                                    <span class="progress-title">Analytics</span>
                                    <span class="progress-number-wrapper">
                                        <span class="progress-number-mark">
                                            <span class="percent"></span>
                                        </span>
                                    </span>
                                </h4>
                                <div class="progress-content-outter">
                                    <div class="progress-content"></div>
                                </div>
                            </div>
                            <div class="skill-bar mb-0" data-percentage="80%">
                                <h4 class="progress-title-holder clearfix">
                                    <span class="progress-title">Solutions</span>
                                    <span class="progress-number-wrapper">
                                        <span class="progress-number-mark">
                                            <span class="percent"></span>
                                        </span>
                                    </span>
                                </h4>
                                <div class="progress-content-outter">
                                    <div class="progress-content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="services-area-four pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Our Services</span>
                <h2>We Provide Truly IT Solutions</h2>
                <p class="margin-auto">
                    Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id
                    elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.
                </p>
            </div>
            <div class="row justify-content-center align-items-center pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="services-card services-card-color-bg2">
                        <a href="service-details.html">
                            <img src="assets/images/services/services-img7.jpg" alt="services">
                        </a>
                        <h3><a href="service-details.html">IT Consulting</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at ligula eget lectus
                            consequat volutpat.</p>
                        <a href="service-details.html" class="learn-btn">Learn More <i
                                class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-card services-card-color-bg2">
                        <a href="service-details.html">
                            <img src="assets/images/services/services-img8.jpg" alt="services">
                        </a>
                        <h3><a href="service-details.html">Cloud Computing</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at ligula eget lectus
                            consequat volutpat.</p>
                        <a href="service-details.html" class="learn-btn">Learn More <i
                                class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-card services-card-color-bg2">
                        <a href="service-details.html">
                            <img src="assets/images/services/services-img9.jpg" alt="services">
                        </a>
                        <h3><a href="service-details.html">Web Development</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at ligula eget lectus
                            consequat volutpat.</p>
                        <a href="service-details.html" class="learn-btn">Learn More <i
                                class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="technology-area-five pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Technology Index</span>
                <h2>Real-Time Monitoring And Your Infrastructure Based IT Solutions</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-2 col-6">
                    <div class="technology-card technology-card-color2">
                        <i class="flaticon-android"></i>
                        <h3>Android</h3>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="technology-card technology-card-color2">
                        <i class="flaticon-website"></i>
                        <h3>Web</h3>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="technology-card technology-card-color2">
                        <i class="flaticon-apple"></i>
                        <h3>ios</h3>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="technology-card technology-card-color2">
                        <i class="flaticon-television"></i>
                        <h3>TV</h3>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="technology-card technology-card-color2">
                        <i class="flaticon-smartwatch"></i>
                        <h3>Watch </h3>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="technology-card technology-card-color2">
                        <i class="flaticon-cyber-security"></i>
                        <h3>IOT</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Our Team</span>
                <h2>Our Team Members</h2>
            </div>
            <div class="row pt-45 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <img src="assets/images/team/team-img1.jpg" alt="Team Images">
                        <div class="content">
                            <h3>Adam Smith</h3>
                            <span>President & CEO</span>
                            <ul class="social-link">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class='bx bxl-linkedin-square'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <img src="assets/images/team/team-img2.jpg" alt="Team Images">
                        <div class="content">
                            <h3>Max Angles</h3>
                            <span>Manager</span>
                            <ul class="social-link">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class='bx bxl-linkedin-square'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <img src="assets/images/team/team-img3.jpg" alt="Team Images">
                        <div class="content">
                            <h3>Park Anderson</h3>
                            <span>Sales Executive</span>
                            <ul class="social-link">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class='bx bxl-linkedin-square'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="case-study-area about-bg2 pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Case Study</span>
                <h2>Reads Now Our Recent Projects Work </h2>
            </div>
            <div class="row justify-content-center pt-45">
                <div class="col-lg-4 col-sm-6">
                    <div class="case-study-item2">
                        <i class="flaticon-consultant icon-services"></i>
                        <div class="content">
                            <h3><a href="case-details.html">Business Solution</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pharetra risus turpis, non
                                auctor risus dignissim ut. Integer porttitor libero id ante elementum imperdiet.</p>
                            <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="case-study-item2">
                        <i class="flaticon-web-development icon-services"></i>
                        <div class="content">
                            <h3><a href="case-details.html">Web Development</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pharetra risus turpis, non
                                auctor risus dignissim ut. Integer porttitor libero id ante elementum imperdiet.</p>
                            <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="case-study-item2">
                        <i class="flaticon-stats icon-services"></i>
                        <div class="content">
                            <h3><a href="case-details.html">Database Security</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pharetra risus turpis, non
                                auctor risus dignissim ut. Integer porttitor libero id ante elementum imperdiet.</p>
                            <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color2">Latest Blog</span>
                <h2>Click Out Our Latest Blog</h2>
            </div>
            <div class="row pt-45 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img3">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/blog-img13.jpg" alt="Blog Images">
                            </a>
                            <div class="blog-tag">
                                <h3>11</h3>
                                <span>June</span>
                            </div>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="blog-details.html">Define World Best IT Technology Services</a>
                            </h3>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum.</p>
                            <a href="blog-details.html" class="read-btn">Read More <i
                                    class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img3">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/blog-img14.jpg" alt="Blog Images">
                            </a>
                            <div class="blog-tag">
                                <h3>12</h3>
                                <span>June</span>
                            </div>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="blog-details.html">You Must Protect Your Device in Digital Platform</a>
                            </h3>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum.</p>
                            <a href="blog-details.html" class="read-btn">Read More <i
                                    class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img3">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/blog-img15.jpg" alt="Blog Images">
                            </a>
                            <div class="blog-tag">
                                <h3>15</h3>
                                <span>June</span>
                            </div>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="blog-details.html">Digital IT Technology Conference Held in 2021 </a>
                            </h3>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum.</p>
                            <a href="blog-details.html" class="read-btn">Read More <i
                                    class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
