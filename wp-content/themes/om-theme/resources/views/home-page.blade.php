{{--
Template Name: Home Page Template
--}}

@extends('layouts.app')
@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header')
@include('partials.content-page')

<!--BLOCK: LOGO WRAP -->
@include('blocks.logowrap')
<!--/BLOCK: END LOGO WRAP -->
<!--BLOCK: GROWTH PROCESS-->
@include('blocks.growth-process')
<!--/BLOCK: END GROWTH PROCESS -->
<!--BLOCK: TWO COLUMN LEFT IMAGE -->
@include('blocks.two-column-left-image')
<!--/BLOCK: END TWO COLUMN LEFT IMAGE -->
<!--BLOCK: TWO COLUMN RIGHT IMAGE -->
@include('blocks.two-column-right-image')
<!--/BLOCK: END TWO COLUMN RIGHT IMAGE -->
<!--BLOCK: CASE STUDIES -->
@include('blocks.case-studies')
<!--/BLOCK: END CASE STUDIES -->
@endwhile
@endsection