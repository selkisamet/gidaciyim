@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><i class="fa fa-edit"></i> Kategori Düzenle</div>
                <div class="panel-body">
                    <div class="text-center">
                        {!! $kategori->kucuk_resim !!}
                    </div>
                    {!! Form::model($kategori, ['route' => ['kategori.update', $kategori->id], 'method' => 'put','files' => 'true']) !!}
                    {!! Form::bsText('baslik','Başlık') !!}
                    {!! Form::bsFile('resim','Resim') !!}
                    {!! Form::bsSubmit('Kaydet') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
