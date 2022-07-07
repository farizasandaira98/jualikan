<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Web Penjualan Ikan</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('user/img/favicon.png')}}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('user/css/all.min.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('user/bootstrap/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('user/css/owl.carousel.css')}}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('user/css/magnific-popup.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('user/css/animate.css')}}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('user/css/meanmenu.min.css')}}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('user/css/main.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('user/css/responsive.css')}}">
</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="{{asset('user/img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="/">Home</a>
								</li>
								<li><a href="/listikan">List Ikan</a></li>
								<li><a href="/about">Tentang Saya</a></li>
                                <li><a href="/kontak">Kontak Kami</a></li>
                                @guest
                                <li class="dropdown">
                                    <ul><li><a href="/login">Login</a></li>
                                    <li><a href="/register">Daftar</a></li></ul>
                                </li>
                                    @else
                                     <li class="dropdown">
                                        <li class="dropdown">
                                            <ul><li>
                                                <form id="logout-form" action="{{ url('logout') }}" method="POST">
                                                            {{ csrf_field() }}
                                                    <button type="submit">Logout</button>
                                                </form>
                                                </li></ul>
                                    @endguest
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Segar Dan Fresh</p>
								<h1>Pasar Ikan Online</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">List Ikan</a>
									<a href="contact.html" class="bordered-btn">Hubungi Kami</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Selalu Fresh Tiap Hari</p>
								<h1>100% Kualitas Terjamin</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">List Ikan</a>
									<a href="contact.html" class="bordered-btn">Hubungi Kami</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Ikan Hasil Tangkapan Langsung Dijual</p>
								<h1>Ayo Dapatkan Ikan Segar</h1>
								<div class="hero-btns">
									<a href="shop.html" class="boxed-btn">List Ikan</a>
									<a href="contact.html" class="bordered-btn">Hubungi Kami</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Lebih Praktis</h3>
							<p>Ikan Dapat Dipesan Ditempat Atau Diantar</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>Hubungi Kami</h3>
							<p>Kami Akan Langsung Merespon Keluhan Anda</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Pengembalian</h3>
							<p>Jika Kualitas Ikan Tidak Baik</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->


	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Ikan</span> Kami</h3>
						<p>Produk Ikan Yang Kami Jual</p>
					</div>
				</div>
			</div>

			<div class="row">
                @foreach ($ikan as $i)
                <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>{{ $i->jenis_ikan }}</h3>
						<p class="product-price"><span>Harga Satuan</span> {{ $i->harga_satuan }} </p>
						<a href="/listikan" class="cart-btn"><i class="fas fa-shopping-cart"></i> Pesan Sekarang</a>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Tentang Kami</h2>
						<p>pasar Online Ikan, Startup pasar online yang menjajaki penjualan ikan secara online.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Hubungi Kami</h2>
						<ul>
							<li><a href="https://goo.gl/maps/wooGrSfmuCmeaYLU8" target="_blank">Kota Waisai, Kabupaten Raja Ampat, Provinsi Papua Barat</a></li>
							<li><a href="mailto:sholehaangga97@gmail.com" target="_blank">sholehaangga97@gmail.com</a></li>
							<li><a href="https://wa.me/6281247574754" target="_blank">+6281247574754</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Halaman</h2>
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="/listikan">List Ikan</a></li>
							<li><a href="/about">Tentang Saya</a></li>
							<li><a href="/kontak">Kontak</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2022 - <a href="https://www.instagram.com/farizasandaira/">Anonymous</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="https://www.facebook.com/eya.whysay" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://www.instagram.com/Kaeka710_/" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="{{asset('user/js/jquery-1.11.3.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('user/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{asset('user/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{asset('user/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{asset('user/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{asset('user/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{asset('user/js/sticker.jss')}}"></script>
	<!-- main js -->
	<script src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
