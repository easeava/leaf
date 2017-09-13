@extends('leaf::layouts.app')

@section('content')
    <section class="content">

        @include('leaf::layouts.error')
        @include('leaf::layouts.success')
        @include('leaf::layouts.exception')
        @include('leaf::layouts.toastr')

    </section>

	{!! $content !!}

@endsection
