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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
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
								<li><a href="/">Home</a>
								</li>
								<li class="current-list-item"><a href="/listikan">List Ikan</a></li>
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

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh Dan Kualitas Terbaik</p>
						<h1>List Ikan</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
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
                        <form action="/storepemasukan" method="post">
                        {{ csrf_field() }}
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove">No</th>
									<th class="product-name">Jenis Ikan</th>
									<th class="product-price">Harga Satuan</th>
									<th class="product-quantity">Quantity</th>
								</tr>
							</thead>
							<tbody>
                                <input type="text" name="id_user" hidden value="{{ Auth::id() }}">
                                @foreach ($ikan as $i)
                                <tr class="table-body-row">
									<td class="product-remove">{{ $loop->iteration }}</td>
									<td class="product-name">{{ $i->jenis_ikan }}</td>
									<td class="product-price"><input type="text" name="harga_satuan[]" id="txt1" hidden value="{{ $i->harga_satuan }}">{{ $i->harga_satuan }}</td>
									<td class="product-quantity"><input type="number" name="qty[]" value="0"></td>
								</tr>
                                @endforeach
							</tbody>
                            @if($errors->has('qty') )
                                <div class="text-danger">
                                    {{ $errors->first('qty')}}
                                </div>
                            @endif
						</table>
                        <div class="cart-buttons">
							<button type="submit" class="boxed-btn black">Cek Out</a>
						</div>
                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

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
