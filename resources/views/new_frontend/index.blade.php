<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    @include('new_frontend.layouts.head')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/travel/2-0/vendor/swiper/swiper-bundle.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/travel/2-0/vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/travel/2-0/vendor/owl.carousel2/assets/owl.theme.default.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/travel/2-0/css/style.default.d4b80125.css"
        id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/travel/2-0/css/custom.0a822280.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/favicon">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
</head>

<body>
    @include('layouts.templates.navbar')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                    src="https://media.istockphoto.com/id/904172104/photo/weve-made-it-all-this-way-i-am-proud.jpg?s=612x612&w=0&k=20&c=MewnsAhbeGRcMBN9_ZKhThmqPK6c8nCT8XYk5ZM_hdg="
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="https://images.pexels.com/photos/1285625/pexels-photo-1285625.jpeg?cs=srgb&dl=pexels-apasaric-1285625.jpg&fm=jpg"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="https://www.cnet.com/a/img/resize/c8015c070c93f2193e45ce99c46e310b25b6c925/hub/2022/05/25/d6e31aec-a363-4efb-939c-b9fc1895c125/calton-view-winter-copy.jpg?auto=webp&width=1200"
                    alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Destinations -->

    <!-- Divider Section -->
    <section class="py-5">
        <div class="container py-4">
            <!-- Home listing -->
            <div class="row align-items-stretch gx-lg-0">
                <div class="col-lg-6 order-2 order-lg-1 bg-full-left">
                    <div class="h-100 bg-light d-flex align-items-center">
                        <div class="py-5 px-4">
                            <p class="text-primary font-weight-bold small text-uppercase mb-2">Travel guide</p>
                            <h3 class="h4"> <a class="text-reset" href="post.html">Book to inspire your travel</a></h3>
                            <div class="text-muted">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quam nobis autem
                                    voluptate illum beatae atque suscipit inventore tenetur, perferendis facere sequi
                                    optio laudantium obcaecati aliquam, dolores ea. Pariatur, repellendus.</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quam nobis autem
                                    voluptate illum beatae atque suscipit inventore tenetur, perferendis facere sequi
                                    optio laudantium obcaecati aliquam, dolores ea. Pariatur, repellendus.</p>
                            </div>
                            {{-- <ul class="list-inline small text-uppercase mb-0">
                                <li class="list-inline-item align-middle"><img class="rounded-circle shadow-sm"
                                        src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/person-1.57fd03a8.jpg"
                                        alt="" width="30" /></li>
                                <li class="list-inline-item me-0 text-gray align-middle">By </li>
                                <li class="list-inline-item align-middle me-0"><a class="fw-bold reset-anchor"
                                        href="#!">Jason Doe</a></li>
                                <li class="list-inline-item text-gray align-middle me-0">|</li>
                                <li class="list-inline-item text-gray align-middle">Jan, 2019</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2"><a class="d-block h-100 bg-center bg-cover" href="post.html"
                        style="background: url(https://d19m59y37dris4.cloudfront.net/travel/2-0/img/travel-home-divider.67659987.jpg)"></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram section-->
    <section class="pb-5">
        <div class="container pb-4">
            <header class="text-center mb-5">
                <h2>Backpack traveler</h2>
                <p>A place for your Instagram pictures or gallery.</p>
            </header>
            <div class="row">
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-1.2aa0ba43.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-2.732bba03.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-3.0bbf93cd.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-4.95e66b76.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-5.3813454e.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-6.02c6ec6f.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-1.2aa0ba43.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
                <div class="col-lg-3 col-md-6 px-md-1 py-1"><a
                        class="instagram-item d-block w-100 reset-anchor text-white" href="#!"><img class="img-fluid"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/listing-tnumbnail-2.732bba03.jpg"
                            alt="">
                        <div class="instagram-item-overlay p-5">
                            <h6>We travel not to escape life, but for life not to escape us.</h6>
                        </div>
                    </a></div>
            </div>
        </div>
    </section>
    <!-- Travel essentials section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <header class="text-center mb-5">
                <h2>My travel essentials</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </header>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6">
                    <a class="text-reset" href="post.html">
                        <img class="mb-4 fixed-size mx-auto"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/bag.e4c5f0da.png" alt="Backpack">
                        <h3 class="h5">Backpack</h3>
                        <p class="text-sm text-muted">Deserunt et ad culpa culpa dolore.</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a class="text-reset" href="post.html">
                        <img class="mb-4 fixed-size mx-auto"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/camera.3ee186fd.png" alt="Camera">
                        <h3 class="h5">Camera</h3>
                        <p class="text-sm text-muted">Consectetur ex sunt duis minim quis dolor.</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a class="text-reset" href="post.html">
                        <img class="mb-4 fixed-size mx-auto"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/glasses.80147afd.png"
                            alt="Sunglasses">
                        <h3 class="h5">Sunglasses</h3>
                        <p class="text-sm text-muted">Deserunt et ad culpa culpa dolore.</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a class="text-reset" href="post.html">
                        <img class="mb-4 fixed-size mx-auto"
                            src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/headphone.cccb2497.png"
                            alt="Headphones">
                        <h3 class="h5">Headphones</h3>
                        <p class="text-sm text-muted">Elit ad est labore irure qui.</p>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- Subscribe section -->


    <section class="py-5 bg-light">
        <div class="container py-4">
            <header class="text-center mb-5">
                <h2>Travel Blogs</h2>
                <p>Discover insightful articles and updates from our travel adventures.</p>
            </header>
            <div class="row text-center">
                @if ($latestPosts)
                    @foreach ($latestPosts as $latestPost)
                        <div class="col-lg-3 col-md-6">
                            <a class="text-reset"
                                href="{{ route('singlePost', ['year' => $latestPost->getYear($latestPost->published_at), 'slug' => $latestPost->slug]) }}">
                                <img class="mb-4 fixed-size mx-auto" src="{{ asset($latestPost->image) }}" alt="Post Image">
                                <p class="text-sm text-muted">{{ $latestPost->title }}</p>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6 position-relative py-4"><img class="subscribe-img"
                        src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/subscribe-img-1.f15f53b1.jpg"
                        alt=""><img class="subscribe-img"
                        src="https://d19m59y37dris4.cloudfront.net/travel/2-0/img/subscribe-img-2.d0fd7aee.jpg" alt="">
                </div>
                <div class="col-lg-6">
                    <h2>Best money saving - Travel tips</h2>
                    <p class="text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos quidem
                        facere aliquam, delectus, incidunt ipsum fugit deserunt ducimus quibusdam consequuntur quos
                        numquam ipsa suscipit animi dolore. Est beatae inventore voluptas.</p>
                    <form action="#">
                        <div class="row gy-3 gy-lg-0">
                            <div class="col-lg-8">
                                <input class="form-control" type="email" name="email"
                                    placeholder="Enter your email address">
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-dark btn-block" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Top categories section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <header class="mb-5 text-center">
                <h2>Top categories</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </header>
            <div class="row text-center gy-4">
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#food-1"> </use>
                        </svg>
                        <h3 class="h5">Restaurants</h3>
                        <p class="text-muted text-sm">Restaurants Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#paper-bag-1"> </use>
                        </svg>
                        <h3 class="h5">Markets</h3>
                        <p class="text-muted text-sm">Markets Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#special-price-1"> </use>
                        </svg>
                        <h3 class="h5">Low budget</h3>
                        <p class="text-muted text-sm">Low budget Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#movie-camera-1"> </use>
                        </svg>
                        <h3 class="h5">Cinemas</h3>
                        <p class="text-muted text-sm">Cinemas Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#beach-1"> </use>
                        </svg>
                        <h3 class="h5">Beaches</h3>
                        <p class="text-muted text-sm">Beaches Destinations</p>
                    </a></div>
                <div class="col-lg-2 col-md-4 col-sm-6"><a class="reset-anchor d-block" href="listing.html">
                        <svg class="svg-icon mb-3 svg-icon-big svg-icon-light text-primary">
                            <use xlink:href="#camping-1"> </use>
                        </svg>
                        <h3 class="h5">Camping</h3>
                        <p class="text-muted text-sm">Camping Destinations</p>
                    </a></div>
            </div>
        </div>
    </section>
    <!-- Sponsors section-->

    <footer class="relative mt-28 antialiased lg:mt-16">
        <div class="mx-auto max-w-screen-xl p-4 py-6 md:p-8 lg:p-10">
            <div class="text-center">
                <span class="block text-center text-sm text-gray-500 dark:text-gray-400">© 2024 <a
                        href="https://bellawan.my.id" target="_blank" class="hover:underline">Eric™</a>. All Rights
                    Reserved.
                </span>
                <ul class="mt-5 flex justify-center space-x-5">
                    <li>
                        <a href="https://twitter.com" target="_blank" title="X Twitter Profile">
                            <span class="sr-only">X Twitter</span>
                            <div class="group relative overflow-hidden rounded-full bg-transparent p-2">

                                <svg class="relative z-[2] h-4 w-4 text-gray-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13.8 10.5 20.7 2h-3l-5.3 6.5L7.7 2H1l7.8 11-7.3 9h3l5.7-7 5.1 7H22l-8.2-11.5Zm-2.4 3-1.4-2-5.6-7.9h2.3l4.5 6.3 1.4 2 6 8.5h-2.3l-4.9-7Z" />
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/" target="_blank" title="LinkedIn Profile">
                            <span class="sr-only">Linked In</span>
                            <div class="group relative overflow-hidden rounded-full bg-transparent p-2">

                                <svg class="relative z-[2] h-4 w-4 text-gray-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12.5 8.8v1.7a3.7 3.7 0 0 1 3.3-1.7c3.5 0 4.2 2.2 4.2 5v5.7h-3.2v-5c0-1.3-.2-2.8-2.1-2.8-1.9 0-2.2 1.3-2.2 2.6v5.2H9.3V8.8h3.2ZM7.2 6.1a1.6 1.6 0 0 1-2 1.6 1.6 1.6 0 0 1-1-2.2A1.6 1.6 0 0 1 6.6 5c.3.3.5.7.5 1.1Z"
                                        clip-rule="evenodd" />
                                    <path d="M7.2 8.8H4v10.7h3.2V8.8Z" />
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/" target="_blank" title="GitHub Profile">
                            <span class="sr-only">Github</span>
                            <div class="group relative overflow-hidden rounded-full bg-transparent p-2">

                                <svg class="relative z-[2] h-4 w-4 text-gray-500 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 2c-2.4 0-4.7.9-6.5 2.4a10.5 10.5 0 0 0-2 13.1A10 10 0 0 0 8.7 22c.5 0 .7-.2.7-.5v-2c-2.8.7-3.4-1.1-3.4-1.1-.1-.6-.5-1.2-1-1.5-1-.7 0-.7 0-.7a2 2 0 0 1 1.5 1.1 2.2 2.2 0 0 0 1.3 1 2 2 0 0 0 1.6-.1c0-.6.3-1 .7-1.4-2.2-.3-4.6-1.2-4.6-5 0-1.1.4-2 1-2.8a4 4 0 0 1 .2-2.7s.8-.3 2.7 1c1.6-.5 3.4-.5 5 0 2-1.3 2.8-1 2.8-1 .3.8.4 1.8 0 2.7a4 4 0 0 1 1 2.7c0 4-2.3 4.8-4.5 5a2.5 2.5 0 0 1 .7 2v2.8c0 .3.2.6.7.5a10 10 0 0 0 5.4-4.4 10.5 10.5 0 0 0-2.1-13.2A9.8 9.8 0 0 0 12 2Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank" title="Instagram Profile">
                            <span class="sr-only">Instagram</span>
                            <div class="group relative overflow-hidden rounded-full bg-transparent p-2">

                                <svg class="relative z-[2] h-4 w-4 text-gray-500" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                                </svg>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    @livewireScripts

    <!-- JavaScript files-->
    <script src="https://d19m59y37dris4.cloudfront.net/travel/2-0/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/travel/2-0/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="js/front.187bc74f.js"></script>
    <script src="js/js-cookie.55cdbe0d.js"> </script>
    <script src="js/demo.9f3f24e8.js"> </script>
    <script>
        // ------------------------------------------------------- //
      //   Inject SVG Sprite -
      //   see more here
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {

          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.c2a8f15b.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
