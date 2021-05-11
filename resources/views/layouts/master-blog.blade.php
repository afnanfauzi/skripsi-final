<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('title')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('dashboard/blog/css/bootstrap.min.css') }}" />
	

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('dashboard/blog/css/font-awesome.min.css ') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('dashboard/blog/css/style.css ') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<!-- /social -->

					<!-- logo -->
					<div class="nav-logo">
						<a href="index.html" class="logo"><img src="{{ asset('dashboard/blog/img/logo.png')}}" alt=""></a>
					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form>
								<input class="input" name="search" placeholder="Enter your search...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
						<li><a href="{{ route('blog') }}">Beranda</a></li>
						<li class="has-dropdown">
							<a href="#">Profil</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										<li><a href="#">Sejarah</a></li>
										<li><a href="#">Struktur Organisasi</a></li>
										<li><a href="#">Visi Misi</a></li>
										<li><a href="#">Program Kerja</a></li>
										<li><a href="#">Majelis</a></li>
										<li><a href="#">Lembaga</a></li>
										<li><a href="#">PCM</a></li>
										<li><a href="#">Ortom</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="has-dropdown">
							<a href="#">Download</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										<li><a href="#">Lagu Muhammadiyah</a></li>
										{{-- <li><a href="blog-post.html">Post page</a></li>
										<li><a href="author.html">Author page</a></li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="contact.html">Contacts</a></li>
										<li><a href="blank.html">Regular</a></li> --}}
									</ul>
								</div>
							</div>
						</li>
					</ul>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="#">Beranda</a></li>
						<li class="has-dropdown">
							<a href="#">Profil</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										<li><a href="#">Sejarah</a></li>
										<li><a href="#">Struktur Organisasi</a></li>
										<li><a href="#">Visi Misi</a></li>
										<li><a href="#">Program Kerja</a></li>
										<li><a href="#">Majelis</a></li>
										<li><a href="#">Lembaga</a></li>
										<li><a href="#">PCM</a></li>
										<li><a href="#">Ortom</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="has-dropdown">
							<a href="#">Download</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										<li><a href="#">Lagu Muhammadiyah</a></li>
										{{-- <li><a href="blog-post.html">Post page</a></li>
										<li><a href="author.html">Author page</a></li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="contact.html">Contacts</a></li>
										<li><a href="blank.html">Regular</a></li> --}}
									</ul>
								</div>
							</div>
						</li>
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
		@yield('header-post') 
	</header>
	<!-- /HEADER -->
	
	@yield('content') 
	
	<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="index.html" class="logo"><img src="{{ asset('dashboard/blog/img/logo-alt.png')}}" alt=""></a>
						</div>
						<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
						<ul class="contact-social">
							<li><a href="#" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Kategori</h3>
						<div class="category-widget">
							<ul>
								@foreach($kategori_footer as $kategori_footer)
								<li><a href="#">{{ $kategori_footer->nama_kategori }} <span>{{ $kategori_footer->artikel->count() }}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
								@foreach($tags as $tags)
								<li><a href="#">{{ $tags->nama_tags }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Newsletter</h3>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
					<ul class="footer-nav">
						<li><a href="index.html">Beranda</a></li>
						<li><a href="about.html">Tentang Kami</a></li>
						<li><a href="contact.html">Kontak Kami</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is from <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('dashboard/blog/js/jquery.min.js') }}"></script>
	<script src="{{ asset('dashboard/blog/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('dashboard/blog/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('dashboard/blog/js/main.js') }}"></script>

</body>

</html>