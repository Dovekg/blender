@extends('back.layout.master')

@section('breadcrumbs', Breadcrumbs::render('articleBack', $model))

@section('pageTitle', trans('back-articles.title'))

@section('content')
<section>
    <div class="grid">
    <h1>{{ $model->name ?: trans('back-articles.new') }}</h1>

    {!! Form::openDraftable(
        [
            'method'=>'PATCH',
            'action'=> ['Back\ArticleController@update', $model->id],
            'subject' => $model,
            'class' => '-stacked'
        ]
    ) !!}

    @if($model->technical_name && view()->exists("back.articles._partials.{$model->technical_name}Form"))
        @include("back.articles._partials.{$model->technical_name}Form")
    @else
        @include('back.articles._partials.form')
    @endif

    {!! Form::close() !!}

    </div>
</section>
@stop
