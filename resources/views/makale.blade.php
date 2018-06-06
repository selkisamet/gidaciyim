@extends('layouts.anasablon') @section('icerik')
<!--Sayfa Başlangıcı-->
<div class="col-lg-8">
    <article>
        <div class="post-image">
            <img src="{{asset('uploads/'.$makale->resim->isim)}}" alt="" class="img-responsive" />
        </div>
        <div class="post-heading">
            <h1><a href="#">{{$makale->baslik}}</a></h1>
        </div>
        <blockquote>
            {!! $makale->icerik !!}
        </blockquote><hr>
        <div class="bottom-article">
            <ul class="meta-post">
                <li><i class="fa fa-calendar"></i><a href="#"> {{$makale->created_at->formatLocalized('%A %d %B %Y')}}</a></li>
                <li><i class="fa fa-user"></i><a href="#"> {{$makale->user->name}}</a></li>
                <li><i class="fa fa-folder-open"></i><a href="#"> {{$makale->kategori->baslik}}</a></li>
            </ul>
        </div>
    </article>
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
                @foreach(App\Kategori::all() as $kategori)
                <li><i class="fa fa-angle-right"></i><a href="/yayinlanan-kategori/{{$kategori->slug}}">{{$kategori->baslik}}</a><span> (20)</span></li>
                @endforeach
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