@extends('articles::layout')

@section('body')
<div>
    @include(config('articles.header_view'))

    @include($page)

</div>
@endsection
