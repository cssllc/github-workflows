@extends('layouts.app')

@section('content')
@include('partials.page-header')

<section class="section blogs-template-cards category-name-wrap">
    <div class="container">
        <div class="category-title">
            <label class="sm-title">Category</label>
            <h1><?php single_cat_title(); ?></h1>
        </div>
        <div class="row">
            @while(have_posts()) @php(the_post())
            @include('partials.content-search')
            @endwhile
        </div>
    </div>
</section>

@endsection
