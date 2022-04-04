@extends('layouts.app')

@section('content')
    @include('includes.posts.form')
@endsection

@section('scripts')
    <script src="{{ asset('js/preview-image.js') }} " defer></script>
@endsection
