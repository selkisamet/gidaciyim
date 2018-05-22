@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><i class="fa fa-plus"></i> Yeni Kategori Ekle</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/kategori','method' => 'post','files' => 'true']) !!}
                    {!! Form::bsText('baslik','Başlık') !!}
                    {!! Form::bsFile('resim','Resim') !!}
                    {!! Form::bsSubmit('Kaydet') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
