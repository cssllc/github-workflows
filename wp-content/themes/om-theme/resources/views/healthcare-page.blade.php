{{--
Template Name: Healthcare Page Template
--}}


@extends('layouts.app')
@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header')
@include('partials.content-page')


<section class="growth-process-main dedicated-digital-wrap">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6 col-lg-5">
        <div class="growth-process-inner-wrap">
          <h2>@field('core_section_title')</h2>
        </div>
      </div>
      <div class="col-md-5 col-lg-6">
        <div class="growth-process-right">
          <h4>@field('core_sub_title')</h4>
          <p>@field('core_descriptions')</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="build-main core-solution-wrap">
  <div class="container">
    <h2>@field('core_solution_title')</h2>
    <div class="build-space-shadow">
      <div class="row">
      @if (have_rows('four_steps'))
      @fields('four_steps')
        <div class="col-sm-6 col-lg-3">
          <div class="build-inner-wrap">
            <h4>@sub('title')</h4>
            <p>@sub('descriptions')</p>
          </div>
        </div>
        @endfields
        @endif
      </div>
    </div>
  </div>
</section>

@if (have_rows('reviews'))
<section class="carousel-slider-wrap">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div id="page-gravure">
          <div class="sliders">
            <div class="slides-show">
            @fields('reviews')
              <div class="autoplay-slide">
                <p>@sub('client_review')</p>
                <div class="media mt-5">
                  <img src="@sub('client_image')" class="mr-3 mr-md-4" alt="">
                  <div class="media-body text-left">
                    <h6 class="mt-0">@sub('client_name')</h6>
                    <p>@sub('client_position')</p>
                  </div>
                </div>
              </div>
              @endfields
            
            </div>
            <div class="slides">
            @fields('reviews')
              <div><img src="@sub('client_logo')"></div>
              @endfields
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif


<section class="be-human-main be-human-main-two">
  <div class="container">
    <div class="row justify-content-between xs-our-team">
      <div class="col-md-5">
        <div class="be-human-left">
          <label class="sm-title">@field('process_sub_title')</label>
          <h2>@field('process_section_title')</h2>
          <p>@field('process_descriptions')</p>
        </div>
      </div>
      <div class="col-md-6 position-none-custom pl-0">
        <div class="be-human-right" style="background-image: url(@field('right_side_image')); background-repeat: no-repeat;; background-size: cover; background-position: center center"></div>
      </div>
    </div>
  </div>
</section>

@if (have_rows('four_steps_process'))
<section class="build-main build-main-two">
  <div class="container">
    <div class="build-space-shadow">
      <div class="row">
      @fields('four_steps_process')
        <div class="col-sm-6 col-lg-3">
          <div class="build-inner-wrap">
            <h4>@sub('title')</h4>
            <p>@sub('descriptions')</p>
          </div>
        </div>
      @endfields
      </div>
    </div>
  </div>
</section>
@endif

<section class="hear-from-you-wrap">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6 col-lg-5">
        <div class="hear-from-you-wrap-left">
          <h2>@field('form_title')</h2>
          <h4>@field('form_description')</h4>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="hear-from-you-wrap-right form-same-ui">
          <div class="form-same-ui-inner">
            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endwhile
@endsection