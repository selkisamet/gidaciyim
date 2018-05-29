@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><i class="fa fa-list"></i> Kategoriler</div>
                <div class="panel-body">
                    <div style="margin-bottom: 10px;">
                        <a href="/kategori/create" class="btn btn-success">
                            <i class="fa fa-plus"></i> Yeni Kategori Ekle
                        </a>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Başlık</th>
                                <th>Slug</th>
                                <th>Ayarlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategoriler as $kategori)
                            <tr>
                                <td>{!! $kategori->kucuk_resim !!}</td>
                                <td>{{$kategori->baslik}}</td>
                                <td>{{$kategori->slug}}</td>
                                <td>
                                    <a href="/kategori/{{$kategori->id}}/edit" class="btn btn-primary" title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="/kategori/{{$kategori->id}}" class="btn btn-danger" data-toggle="tooltip" data-method="delete" data-confirm="Kategori Silinsin Mi?" title="Sil"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$kategoriler->links()}}
                    </div>
                </div>
            </div>
        </div>
@endsection
