@extends('layouts.anasablon')
@section('icerik')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><i class="fa fa-plus"></i> Yazarlık Talebi</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/yazarlik-talebi/gonder','method' => 'post']) !!}
                    
                    {!! Form::bsTextArea('aciklama','Açıklama',null,['class'=>'summernote']) !!}
                    {!! Form::bsSubmit('Yazar Ol') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
