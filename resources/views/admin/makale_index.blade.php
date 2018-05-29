@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><i class="fa fa-list"></i> Makaleler</div>
                <div class="panel-body">
                    <div style="margin-bottom: 10px;">
                        <a href="/makale/create" class="btn btn-success">
                            <i class="fa fa-plus"></i> Yeni Makale Ekle
                        </a>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Durum</th>
                                <th>Resim</th>
                                <th>Kategori</th>
                                <th>Başlık</th>
                                <th>Slug</th>
                                <th>Yazar</th>
                                <th>Yayınlanma Tarihi</th>
                                <th>Ayarlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($makaleler as $makale)
                            <tr>
                                <td>
                                    <input type="checkbox" class="durum" data-id="{{$makale->id}}" data-url="/makale/durum-degis" {{$makale->durum ? "checked" : null}} >
                                </td>
                                <td>{!! $makale->kucuk_resim !!}</td>
                                <td>{{$makale->kategori->baslik}}</td>
                                <td>{{$makale->baslik}}</td>
                                <td>{{$makale->slug}}</td>
                                <td>{{$makale->user->name}}</td>
                                <td>{{$makale->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="/makale/{{$makale->id}}/edit" class="btn btn-primary" title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="/makale/{{$makale->id}}" class="btn btn-danger" data-toggle="tooltip" data-method="delete" data-confirm="Makale Silinsin Mi?" title="Sil"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$makaleler->links()}}
                    </div>
                </div>
            </div>
        </div>
@endsection
