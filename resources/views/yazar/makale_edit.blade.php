@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><i class="fa fa-plus"></i> Makale Düzenle</div>
                <div class="panel-body">
                    {!! Form::model($makale,['route'=>['makalem.update',$makale->id],'method'=>'put','files'=>true]) !!}
                    {!! Form::bsText('baslik','Başlık') !!}
                    {!! Form::bsSelect('kategori_id','Kategori',null,$kategoriler,'Kategori Seçiniz') !!}
                    {!! Form::bsFile('resim','Resim') !!}
                    {!! Form::bsTextArea('icerik','İçerik',null,['class'=>'summernote']) !!}
                    {!! Form::bsSubmit('Kaydet') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
