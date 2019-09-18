@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-5">{{ $blog->title }}</h1>
       {!! Parsedown::instance()->setMarkupEscaped(true)->text($blog->content) !!}
</div>
@endsection

@section('script')

@endsection