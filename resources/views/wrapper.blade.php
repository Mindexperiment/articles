@extends('articles::layout')

@section('body')
<div>
    @include('articles::header')

    @include($page)

</div>
@endsection
