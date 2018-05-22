@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><i class="fa fa-list"></i> Kullanıcı Listesi</div>
                <div class="panel-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>İsim</th>
                                <th>E-Posta</th>
                                <th>Roller</th>
                                <th>Üyelik Tarihi</th>
                                <th>Ayarlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                @foreach($user->roles as $rol)
                                    {{$rol->name.','}}    
                                @endforeach
                                </td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="/user/{{$user->id}}/edit" class="btn btn-primary" title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="/user/{{$user->id}}" class="btn btn-danger" data-toggle="tooltip" data-method="delete" data-confirm="Kullanıcı Silinsin Mi?" title="Sil"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
@endsection
