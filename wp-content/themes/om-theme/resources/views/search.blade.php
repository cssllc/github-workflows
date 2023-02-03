@extends('layouts.app')

@section('content')
@include('partials.page-header')

@if (! have_posts())
<section class="section blogs-template-cards category-name-wrap">
    <div class="container">
        <div class="category-title">
            <label class="sm-title">Search Results</label>
            <h1>Sorry, no results were found</h1>
        </div>
    </div>
</section>
@endif

<section class="section blogs-template-cards category-name-wrap">
    <div class="container">
        <div class="category-title">
            <label class="sm-title">Search Results</label>
            <h1><?php echo get_search_query(); ?></h1>
        </div>
        <div class="row">
            @while(have_posts()) @php(the_post())
            @include('partials.content-search')
            @endwhile
        </div>
    </div>
</section>

<!--  {!! get_the_posts_navigation() !!} !-->
@endsection
