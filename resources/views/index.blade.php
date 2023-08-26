@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>bookscraping</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body class="sub_page">

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            bookscraping
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link pl-lg-0" href="#">Home </a>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>



    @if (!$all_data->count() == 0)

        <section class="blog_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        your scrap
                    </h2>
                </div>
                <div class="row">
                    @foreach ($all_data as $item)
                        <div class="col-md-6">
                            <div class="box">
                                <div class="img-box">

                                    <h4 class="blog_date">
                                        <span>
                                            {{ $item->name }}
                                        </span>
                                    </h4>
                                </div>
                                <div class="detail-box">
                                    <ul>
                                        <li>{{ $item->auther }}</li>
                                        <li>{{ $item->language }}</li>

                                        <li>{{ $item->nimber_of_pages }}</li>
                                        <li>{{ $item->size }}</li>
                                            <li>{{ $item->download }}</li>
                                            <li>{{ $item->filetype }} </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--  <div class="col-md-6 " style="margin:5px;">

                        <form action="{{ route('more') }}" method="get">
                            @csrf
                            <input type='text' name='page' class='form-control'>
                            <button type="submit" class="btn btn-info mt-3">page</button>
                        </form>
                    </div>  --}}
                @endif
                    {{--  <form action="{{ route('scraping') }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-info mt-3">start scraping</button>
                    </form>  --}}
   <div class="col-md-6 " style="margin:5px;">

                        <form action="{{ route('more') }}" method="get">
                            @csrf
                            <input type='text' name='page' class='form-control'>
                            <button type="submit" class="btn btn-info mt-3">page</button>
                        </form>
                    </div>

    </div>
    </div>
    </section>
    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="info_detail">
                        <h4>
                            About Us
                        </h4>
                        <p>
                            Vitae aut explicabo fugit facere alias distinctio, exem commodi mollitia minusem
                            dignissimos atque asperiores incidunt vel voluptate iste
                        </p>
                        <div class="info_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="info_contact">
                        <h4>
                            Address
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01066235786
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
mostafaeltawel123@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved
            </p>
        </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>

    <!-- End Google Map -->

</body>

</html>

</html>
