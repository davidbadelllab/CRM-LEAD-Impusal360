<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <title>Impulsa360 Agency</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">



    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/templatemo-seo-dream.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>



</head>

<body>
<style>
    /* Define la animación de pulsación personalizada */
@keyframes custom-pulse {
    0%, 100% {
        transform: scale(1); /* Tamaño original */
        opacity: 1;
    }
    50% {
        transform: scale(1.2); /* Tamaño durante la pulsación */
        opacity: 0.7; /* Ajusta la opacidad durante la pulsación */
    }
}

.pulse-slow {
    animation: custom-pulse 3s infinite; /* Cambia 3s por el tiempo deseado */
}

</style>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="resources\views\welcome.blade.php" class="logo">
                            <img class="w-[90px] m2-4" src="{{ asset('asset/img/Recurso 22.png') }}" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            {{-- <li class="scroll-to-section"><a href="#top" class="active">Home</a></li> --}}
                            {{-- <li class="scroll-to-section"><a href="#features">Features</a></li>
                            <li class="scroll-to-section"><a href="#about">About Us</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Portfolio</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contact Us</a></li> --}}
                            <li class="scroll-to-section">
                                <div class="main-blue-button">
                                    <a href="{{ route('login') }}">Sign In</a>
                                </div>
                            </li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="info-stat">
                                            <h6>Agency Status:</h6>
                                            <h4>Ready Work</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="info-stat">
                                            <h6>Price:</h6>
                                            <h4>$720/Month</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="info-stat">
                                            <h6>Schedules</h6>
                                            <h4>$450/Meeting</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h2>SEO &amp; Digital Marketing Agency</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="main-green-button scroll-to-section">
                                            <a href="#contact">Get Your Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('asset/img/banner-right-image.png') }}" alt="" class="rounded-full ml-[230px] w-[420px] shadow-2xl">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="features" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0s">
                                    <div class="first-number number">
                                        <h6>01</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Reach Out</h4>
                                    <div class="line-dec"></div>
                                    <p>This HTML5 template is based on Bootstrap 5 CSS. You are free to customize
                                        anything.</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.2s">
                                    <div class="second-number number">
                                        <h6>02</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Develop a Strategy</h4>
                                    <div class="line-dec"></div>
                                    <p>Lorem ipsum dolor sit ameter consectetur adipiscing li elit sed do eiusmod.</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.4s">
                                    <div class="third-number number">
                                        <h6>03</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Implementation</h4>
                                    <div class="line-dec"></div>
                                    <p>If this template is useful for your website, please consider to <a
                                            rel="nofollow" href="https://www.paypal.me/templatemo"
                                            target="_blank">support us</a> a little.</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="features-item second-feature last-features-item wow fadeInUp"
                                    data-wow-duration="1s" data-wow-delay="0.6s">
                                    <div class="fourth-number number">
                                        <h6>04</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Analyze the result</h4>
                                    <div class="line-dec"></div>
                                    <p>Below circular progress bar animation supports those CSS values 10, 20, 30, till
                                        100.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="skills-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                    <div class="progress" data-percentage="80">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                80%<br>
                                                <span>HTML/CSS/JS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="progress" data-percentage="60">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                60%<br>
                                                <span>Wordpress</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <div class="progress" data-percentage="90">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                90%<br>
                                                <span>Marketing</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="skill-item last-skill-item wow fadeIn" data-wow-duration="1s"
                                    data-wow-delay="0.6s">
                                    <div class="progress" data-percentage="70">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">
                                            <div>
                                                70%<br>
                                                <span>Photoshop</span>
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
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{ asset('asset/img/about-left-image.png') }}" alt="">

                    </div>
                </div>
                <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h2>Top <em>marketing</em> agency &amp; consult your website <span>with us</span></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>750+</h4>
                                <h6>projects finished</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>340+</h4>
                                <h6>happy clients</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>128+</h4>
                                <h6>awards</h6>
                            </div>
                        </div>
                    </div>
                    <p><a rel="nofollow" href="https://templatemo.com/tm-563-seo-dream" target="_parent">SEO
                            Dream</a> is free digital marketing CSS template provided by TemplateMo website. You are
                        allowed to use this template for your business websites. Please DO NOT redistribute this
                        template ZIP file on any Free CSS collection websites. You may contact us for more information.
                        Thank you.</p>
                    <div class="main-green-button"><a href="#">Discover company</a></div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6>Our Services</h6>
                        <h2>Discover What We Do &amp; <span>Offer</span> To Our <em>Clients</em></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="icon">
                                    <img src= "{{ asset('asset/img/service-icon-01.png') }}"alt="">

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h4>Similar Websites</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        dormque laudantium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="icon">
                                    <img src= "{{ asset('asset/img/service-icon-02.png') }}"alt="">


                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h4>Website Trends</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        dormque laudantium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="icon">
                                    <img src="{{ asset('asset/img/service-icon-03.png') }}" alt="">

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h4>Traffic Analysis</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        dormque laudantium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="icon">
                                    <img src="{{ asset('asset/img/service-icon-03.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h4>Optimizing Keywords</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        dormque laudantium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="icon">
                                    <img src="{{ asset('asset/img/service-icon-01.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h4>Page Optimizations</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        dormque laudantium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="icon">
                                    <img src="{{ asset('asset/img/service-icon-02.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h4>Deep URL Analysis</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        dormque laudantium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6>Our Portofolio</h6>
                        <h2>Discover Our Recent <em>Projects</em> And <span>Showcases</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                <div class="col-lg-12">
                    <div class="loop owl-carousel">
                        <div class="item">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-01.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 101</h4>
                                            </a>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-04.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 102</h4>
                                            </a>
                                            <span>Branding</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-02.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 103</h4>
                                            </a>
                                            <span>Consulting</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-05.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 104</h4>
                                            </a>
                                            <span>Artwork</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-03.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 105</h4>
                                            </a>
                                            <span>Branding</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-06.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 106</h4>
                                            </a>
                                            <span>Artwork</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-04.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 107</h4>
                                            </a>
                                            <span>Creative</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{ asset('asset/img/portfolio-01.jpg') }}" alt="">

                                    <div class="hover-content">
                                        <div class="inner-content">
                                            <a href="#">
                                                <h4>Awesome Project 108</h4>
                                            </a>
                                            <span>Consulting</span>
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

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="section-heading">
                                    <h6>Contact Us</h6>
                                    <h2>Fill Out The Form Below To <span>Get</span> In <em>Touch</em> With Us</h2>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="name" name="name" id="name" placeholder="Name"
                                                autocomplete="on" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="surname" name="surname" id="surname"
                                                placeholder="Surname" autocomplete="on" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="text" name="email" id="email"
                                                pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="subject" name="subject" id="subject"
                                                placeholder="Subject" autocomplete="on">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button ">Send Message
                                                Now</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="contact-info">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('asset/img/contact-icon-01.png') }}"
                                                    alt="">

                                            </div>
                                            <a href="#">info@company.com</a>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('asset/img/contact-icon-02.png') }}"
                                                    alt="">

                                            </div>
                                            <a href="#">+001-002-0034</a>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('asset/img/contact-icon-03.png') }}"
                                                    alt="">
                                            </div>
                                            <a href="#">26th Street, Digital Villa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Widget flotante de WhatsApp con efecto de pulsación personalizado -->
<div id="whatsapp-widget" class="fixed bottom-[250px] right-4 bg-green-500 text-white p-3 rounded-full shadow-lg cursor-pointer hover:bg-green-600 transition pulse-slow">
    <a href="https://wa.me/584246312483?text=Hola,%20me%20gustaría%20más%20información." target="_blank" rel="noopener noreferrer">
        <!-- Ícono de WhatsApp -->
        <svg width="30px" height="30px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"/>
            <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"/>
            <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"/>
            <defs>
            <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse">
            <stop stop-color="#5BD066"/>
            <stop offset="1" stop-color="#27B43E"/>
            </linearGradient>
            </defs>
        </svg>
    </a>
</div>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2021 Impulsa360Agency., Ltd. All Rights Reserved.

                        <br>Web Designed by Impulsa360<a rel="nofollow" title="free CSS templates">TImpulsa360</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('asset/js/animation.js') }}"></script>
    {{-- <script src="{{ asset('asset/js/imgloaded.js') }}"></script> --}}
    <script src="{{ asset('asset/js/custom.js') }}"></script>



</body>

</html>
