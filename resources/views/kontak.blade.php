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
								<li><a href="/">Home</a></li>
								<li><a href="/listikan">List Ikan</a></li>
								<li><a href="/about">Tentang Saya</a></li>
                                <li class="current-list-item"><a href="/kontak">Kontak Kami</a></li>
                                <li><a href="/login">Login</a></li>
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

    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Kami Selalu Ada Dan Melayani</p>
						<h1>Hubungi Kami</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Punya Saran Dan Masukan ?</h2>
						<p>Silahkan isi form berikut ini untuk mengisi keluhan dan saran agar kami dapat berkembang </p>
					</div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                    </div>
                     @endif
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form type="POST" action="/masukan" id="fruitkha-contact" onSubmit="return valid_datas( this );">
                            {{ csrf_field() }}
							<p>
								<input type="text" placeholder="Nama" name="name" id="name">
								<input type="email" placeholder="Email" name="email" id="email">
							</p>
                            <p>
                                @if($errors->has('name') && $errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}} Dan {{ $errors->first('email')}}
                                </div>
                                @elseif($errors->has('name'))
                                <div class="text-danger">
                                {{ $errors->first('name')}}
                                </div>
                                @elseif($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                    </div>
                                @endif
                            </p>
							<p>
								<input type="tel" placeholder="Nomor Telepon" name="phone" id="phone">
								<input type="text" placeholder="Subjek" name="subject" id="subject">

							</p>
                            <p>
                                @if($errors->has('phone') && $errors->has('subject'))
                                <div class="text-danger">
                                    {{ $errors->first('phone')}} Dan {{ $errors->first('subject')}}
                                </div>
                                @elseif($errors->has('phone'))
                                <div class="text-danger">
                                    {{ $errors->first('phone')}}
                                </div>
                                @elseif($errors->has('subject'))
                                <div class="text-danger">
                                    {{ $errors->first('subject')}}
                                </div>
                                @endif
                            </p>
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Pesan"></textarea></p>
                            @if($errors->has('message'))
                                <div class="text-danger">
                                    {{ $errors->first('message')}}
                                </div>
                                <br>
                                @endif
							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Alamat Pasar</h4>
							<p>Kota Waisai <br> Kabupaten Raja Ampat <br> Provinsi Papua Barat</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Jam Operasional</h4>
							<p>Senin - Minggu 06.00-17.00</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Kontak Kami</h4>
							<p><a href="https://wa.me/6281247574754" target="_blank">+6281247574754</a><br> <a href="mailto:sholehaangga97@gmail.com" target="_blank">sholehaangga97@gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Temukan Lokasi Kami</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127671.46523624497!2d130.8517794!3d-0.3740695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5f1bb124d8f699%3A0x50ee7a1504609bf5!2sWaisai%2C%20Raja%20Ampat%20Regency%2C%20West%20Papua!5e0!3m2!1sen!2sid!4v1657101756692!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
	<!-- end google map section -->

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

