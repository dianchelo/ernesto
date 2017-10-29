@extends('main')


@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('title', '| Example')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Example</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route' => 'pages.example', 'data-parsley-validate' => '')) !!}
            {{ Form::label('example', 'Example:')}}
            {{ Form::text('example', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
            {{ Form::submit('Create Example', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px')) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection