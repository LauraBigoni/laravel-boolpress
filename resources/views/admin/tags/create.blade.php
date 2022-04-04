@extends('layouts.app')

@section('content')
    @include('includes.tags.form')
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#color').colorpicker();
        });
    </script>
@endsection
