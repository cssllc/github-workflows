{{--
Template Name: Service Page Template
--}}

@extends('layouts.app')
@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header')
@include('partials.content-page')

<!--BLOCK: Hero With Right Image -->
@include('blocks.hero-with-right-image')
<!--/BLOCK: END Heor with Right Image -->

<!--BLOCK: Serive Growth Process -->
@include('blocks.services-growth-process')
<!--/BLOCK: END service Growth Proces -->

<!--BLOCK: Services Block -->
@include('blocks.services-block')
<!--/BLOCK: END Services Block -->

<!--BLOCK: CASE STUDIES -->
@include('blocks.case-studies')
<!--/BLOCK: END CASE STUDIES -->

@endwhile
@endsection