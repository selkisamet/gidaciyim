<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="utf-8">
	<title>{!! config('ayarlar.baslik') !!}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="{!! config('ayarlar.aciklama') !!}" />
	<meta name='keywords' content="{!! config('ayarlar.keywords') !!}">
	<meta name='author' content="{!! config('ayarlar.author') !!}">
	<!-- Css -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" media="screen" />
	<link href="{{asset('css/style.css')}}" rel="stylesheet" />
	<!-- Tema -->
	<link id="t-colors" href="{{asset('skins/default.css')}}" rel="stylesheet" />
</head>
<body>
	<div id="wrapper">
		<!-- Header Başlangıç -->
		<header>
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="/"><img src="img/logo.png" alt="" width="199" height="52" /></a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="/">Anasayfa</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Kategoriler <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="typography.html">Et Ürünleri</a></li>
									<li><a href="components.html">Sebzeler</a></li>
									<li><a href="pricing-box.html">Süt Ürünleri</a></li>
								</ul>
							</li>
							<li><a href="Samet.html">Hakkımızda</a></li>
							<li><a href="contact.html">İletişim</a></li>
							@if(Auth::guest())
							<li><a href="/login" class="fa fa-user" style="color: red;"> Üye Girişi</a></li>
							<li><a href="/register" class="fa fa-sign-in" style="color: red;"> Kayıt Ol</a></li>
							@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									@if(Auth::user()->yetkisi_var_mi('admin'))
									<li><a href="{{ url('/site-ayarlari') }}">Site Ayarları</a></li>
									<li><a href="{{ url('/user') }}">Kullanıcılar</a></li>
									<li><a href="{{ url('/kategori') }}">Kategoriler</a></li>
									<li><a href="{{ url('/makale') }}">Tüm Makaleler</a></li>
									<li><a href="{{ url('/talep') }}">Yazarlık Talepleri</a></li>
									@endif
									@if(Auth::user()->yetkisi_var_mi('author'))
									<li><a href="{{ url('/makalem') }}">Yeni Makale Ekle</a></li>
									<li><a href="{{ url('/makalem/create') }}">Makalelerim</a></li>
									@endif
									@if(!Auth::user()->yetkisi_var_mi('admin') && !Auth::user()->yetkisi_var_mi('author'))
									<li><a href="{{ url('/yazarlik-talebi') }}">Yazarlık Talepleri</a></li>
									@endif
									<li><a href="{{ url('/logout') }}">Çıkış</a></li>
								</ul>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Bitiş -->

		<section id="content">
			<div class="container">
				<div class="row">
					@yield('icerik')
				</div>
			</div>
		</section>

		<!-- Footer Başlangıç -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>Bilgi</h4>
							<ul class="link-list">
								<li><a href="#">Şartlar Ve Koşullar</a></li>
								<li><a href="#">Gizlilik Politikası</a></li>
								<li><a href="#">Bizimle İletişime Geçin</a></li>
							</ul>
						</div>

					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>Bülten</h4>
							<p>Makaleleri anında okumak için bültede abone olun.</p>
							<div class="form-group multiple-form-group input-group">
								<input type="email" name="email" class="form-control" placeholder="Mail Adresiniz">
								<span class="input-group-btn">
                            <button type="button" class="btn btn-theme btn-add">Abone Ol</button>
                        </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="copyright">
								<p>{!! config('ayarlar.copyright') !!}</p>
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="social-network">
								<li><a href="{!! config('ayarlar.facebook') !!}" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{!! config('ayarlar.twitter') !!}" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{!! config('ayarlar.github') !!}" data-placement="top" title="Github"><i class="fa fa-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer Bitiş -->
	</div>

	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('plugins/flexslider/jquery.flexslider-min.js')}}"></script>
	<script src="{{asset('plugins/flexslider/flexslider.config.js')}}"></script>
	<script src="{{asset('js/jquery.appear.js')}}"></script>
	<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
