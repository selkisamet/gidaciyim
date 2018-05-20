@extends('layouts.anasablon')
@section('icerik')
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
@endsection