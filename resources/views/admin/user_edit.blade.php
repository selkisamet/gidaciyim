@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Kullanıcı Düzenle</div>
                <div class="panel-body">
                    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}
                    {!! Form::bsCheckbox('rol','Roller',[
                        ['value' => 1, 'text' => 'Admin','is_checked' => $user->yetkisi_var_mi('admin')],
                        ['value' => 2, 'text' => 'Yazar','is_checked' => $user->yetkisi_var_mi('author')],
                        ['value' => 3, 'text' => 'Standart','is_checked' => $user->yetkisi_var_mi('standart')],
                    ]) !!}
                    {!! Form::bsText('name','İsim') !!}
                    {!! Form::bsText('email','E-Posta') !!}
                    {!! Form::bsPassword('password','Şifre') !!}
                    {!! Form::bsSubmit('Kaydet') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
