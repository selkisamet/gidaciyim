@extends('layouts.anasablon')
@section('icerik')
<!--Sayfa Başlangıcı-->
<div class="col-lg-8">
						<article>
							<!-- Flexslider Başlangıç -->
							<div class="post-slider">
								<div id="post-slider" class="postslider flexslider">
									<ul class="slides">
										<li>
											<img src="img/dummies/blog/img1.jpg" alt="" />
										</li>
										<li>
											<img src="img/dummies/blog/img2.jpg" alt="" />
										</li>
										<li>
											<img src="img/dummies/blog/img3.jpg" alt="" />
										</li>
									</ul>
								</div>
							</div>
							<!-- Flexslider Bitiş -->
						</article>

						<article>
							<div class="post-quote">
								<div class="post-heading">
									<h3><a href="#">Kırmızı Etin Faydaları</a></h3>
								</div>
								<blockquote>
									<i class="fa fa-quote-left"></i> Kırmızı et yüksek kalitede esansiyel amino grup asit içeren protein, demir ve çinko yönünden zengindir. Gıdalardan alınan demirin sindirilmesine yardımcıdır. B grubu vitaminler için zengin bir kaynaktır. Dolayısıyla toplumda yaygın olarak görülen beslenme yetersizliklerini büyük ölçüde azaltabilmektedir.
								</blockquote>
							</div>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="fa fa-calendar"></i><a href="#"> Mayıs 11 / 2018</a></li>
									<li><i class="fa fa-user"></i><a href="#"> Samet</a></li>
									<li><i class="fa fa-folder-open"></i><a href="#"> Kategori</a></li>
									<li><i class="fa fa-comments"></i><a href="#">5 Yorum</a></li>
								</ul>
								<a href="#" class="readmore pull-right">Devamını Oku <i class="fa fa-angle-right"></i></a>
							</div>
						</article>
						<!-- Sayfalama Başlangıç -->
						<div id="pagination">
							<span class="all">Sayfa 1 / 3</span>
							<span class="current">1</span>
							<a href="#" class="inactive">2</a>
							<a href="#" class="inactive">3</a>
						</div>
						<!-- Sayfalama Bitiş -->
					</div>
					<!--Sayfa Bitişi-->

					<!--Yan Menü Başlangıç-->
					<div class="col-lg-4">
						<aside class="right-sidebar">
							<div class="widget">
								<form role="form">
									<div class="form-group">
										<input type="text" class="form-control" id="s" placeholder="Ne Aramıştınız...">
									</div>
								</form>
							</div>
							<div class="widget">
								<h5 class="widgetheading">Kategoriler</h5>
								<ul class="cat">
									<li><i class="fa fa-angle-right"></i><a href="#">Kırmızı Et</a><span> (20)</span></li>
									<li><i class="fa fa-angle-right"></i><a href="#">Beyaz Et</a><span> (11)</span></li>
									<li><i class="fa fa-angle-right"></i><a href="#">Süt Ürünleri</a><span> (9)</span></li>
									<li><i class="fa fa-angle-right"></i><a href="#">Katkı Maddeleri</a><span> (12)</span></li>
									<li><i class="fa fa-angle-right"></i><a href="#">Dikkat Edilmesi Gerekenler</a><span> (18)</span></li>
								</ul>
							</div>
							<div class="widget">
								<h5 class="widgetheading">Son Paylaşımlar</h5>
								<ul class="recent">
									<li>
										<img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
										<h6><a href="#">Lorem ipsum dolor sit</a></h6>
										<p>
											Mazim alienum appellantur eu cu ullum officiis pro pri
										</p>
									</li>
									<li>
										<a href="#"><img src="img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
										<h6><a href="#">Maiorum ponderum eum</a></h6>
										<p>
											Mazim alienum appellantur eu cu ullum officiis pro pri
										</p>
									</li>
									<li>
										<a href="#"><img src="img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
										<h6><a href="#">Et mei iusto dolorum</a></h6>
										<p>
											Mazim alienum appellantur eu cu ullum officiis pro pri
										</p>
									</li>
								</ul>
							</div>
							<div class="widget">
								<h5 class="widgetheading">Etiketler</h5>
								<ul class="tags">
									<li><a href="#">Sağlıklı Beslenme</a></li>
									<li><a href="#">Sağlığımıza Dikkat Edelim</a></li>
									<li><a href="#">Sağlık Hakkında Herşey</a></li>
								</ul>
							</div>
						</aside>
					</div>
					<!--Yan Menü Biriş-->
@endsection