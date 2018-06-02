@extends('layouts.anasablon') @section('icerik')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><i class="fa fa-list"></i> Yazarlık Talepleri</div>
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Durum</th>
                        <th>Yazar Adı</th>
                        <th>Mail</th>
                        <th>Talep Tarihi</th>
                        <th>Ayarlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($talepler as $talep)
                    <tr>
                        <td>
                            <input type="checkbox" class="durum" data-id="{{$talep->user->id}}" data-url="/talep/durum-degis" {{$talep->user->yetkisi_var_mi('author') ? "checked" : null}} >
                        </td>
                        <td>{{$talep->user->name}}</td>
                        <td>{{$talep->user->email}}</td>
                        <td>{{$talep->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/talep/{{$talep->id}}/edit" class="btn btn-primary" title="İncele" data-toggle="modal" data-target="#aciklama{{$talep->id}}"><i class="fa fa-eye"></i></a>
                            <a href="/talep/{{$talep->id}}" class="btn btn-danger" data-toggle="tooltip" data-method="delete" data-confirm="Makale Silinsin Mi?" title="Sil"><i class="fa fa-trash-o"></i></a>

                            <div class="modal fade" id="aciklama{{$talep->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$talep->user->name."'den Yazarlık Talebi"}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! $talep->aciklama !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{$talepler->links()}}
            </div>
        </div>
    </div>
</div>
@endsection