{{--
Template Name: Contact Page Template
--}}


@extends('layouts.app')
@section('content')
@while(have_posts()) @php(the_post())

<section class="hear-from-you-wrap Contact-main">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6 col-lg-5">
        <div class="hear-from-you-wrap-left">
        <h1>@field('form_title')</h1>
          <h4>@field('form_description')</h4>
          <img src ="@field('left_image')">

        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="hear-from-you-wrap-right form-same-ui">
          <div class="form-same-ui-inner">
            <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endwhile
@endsection