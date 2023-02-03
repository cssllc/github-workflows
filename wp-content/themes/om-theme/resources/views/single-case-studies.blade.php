{{-- Template Name: Single Case Study
  Template Post Type: case-studies --}}

@extends('layouts.app')
@section('content')

@posts
<div class="back-link">
  <div class="container">
    <a href="<?php echo site_url('/case-studies'); ?>">
      <img alt="" src="<?php echo site_url('/wp-content/uploads/2021/08/back-arrow-icon.svg'); ?>"> Back
    </a>
  </div>
</div>
<section class="blog-banner-wrap blog-details-banner-wrap">
  <div class="container">
    <div class="row col-sm-rev">
      <div class="col-md-7 position-none-custom">
        <div class="blog-blue-bg-left"></div>
        <div class="blog-banner-desc">
          <label class="sm-title">case Study</label>
          <h1>@title</h1>
          <div class="date-text">@published('F j, Y')</div>
          <span class="sm-profile">
            <div class="sm-profile-img"> <img
                src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" alt="" /> </div>
            <div class="sm-profile-name">By @author</div>
          </span>
        </div>
      </div>
      <div class="col-md-5">
        <div class="blog-banner-img"> <img src="@thumbnail('full', false)" alt="" /> </div>
      </div>
    </div>
  </div>
</section>
<section class="blog-details-article">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <article>
          <img class="cslogo" src="@field('case_study_logo')" alt="" />
          <h2>@field('content_title')</h2>
          @if (have_rows('percentage_data'))
          <div class="case-study-lead-per-wrap mt-3 mb-5 d-md-none">
            @fields('percentage_data')
            <div class="case-study-per-text">
              <div class="lead-per-text">@sub('title_percentage')</div>
              <div class="rate-text">@sub('sub_title_percentage')</div>
            </div>
            @endfields
          </div>
          @endif
          @content
        </article>
      </div>
      <div class="col-md-4">
        @if (have_rows('percentage_data'))
        <div class="case-study-lead-per-wrap d-none d-md-block">
          @fields('percentage_data')
          <div class="case-study-per-text">
            <div class="lead-per-text">@sub('title_percentage')</div>
            <div class="rate-text">@sub('sub_title_percentage')</div>
          </div>
          @endfields
        </div>
        @endif
      </div>
    </div>
    @hasfield('review')
    <div class="row">
      <div class="col-12 position-static">
        <div class="quote-wrap">
          <h3>@field('review')</h3>
        </div>
        <div class="quet-outer-text">
          <h3>@field('client_name')</h3>
          <h4>@field('client_position')</h4>
        </div>
      </div>
    </div>
    @endfield
    <div class="row">
      <div class="col-md-7">
        <article>
            @hasfield('solution_title')
                <h2>@field('solution_title')</h2>
                <p>@field('solution_description')</p>
                <div class="services-media-main pb-0">
                    <div class="sliders">
                    <div class="row">
                        @if (have_rows('four_steps'))
                        @fields('four_steps')
                        <div class="col-md-12">
                        <div class="services-media-wrap">
                            <div class="media">
                            <div class="services-media-img"> <img src="@sub('icon')"> </div>
                            <div class="media-body">
                                <h3 class="mt-0">@sub('step_title')</h3>
                                @sub('descriptions')
                            </div>
                            </div>
                        </div>
                        </div>
                        @endfields
                        @endif
                    </div>
                    </div>
                </div>
            @endfield
          @field('phase_data_content')
        </article>
        <div class="blog-profile-details-wrap">
          <label class="sm-title">@option('written_by')</label>
          <div class="media lg-profile-img">
            <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" class="mr-3" alt="..." />
            <div class="media-body">
              <h3>@author</h3>
              <p class="profile-name">
                <?php the_field('user_position', 'user_' . get_the_author_meta('ID')); ?> <br />
                @option('om_performance_marketers')
              </p>
            </div>
          </div>
          <p>
            <?php $authorDesc = the_author_meta('description');
                            echo $authorDesc; ?>
          </p>
          <a href="<?php echo site_url('/about'); ?>" target="" class="link-btn">Meet the Team +</a>
        </div>
      </div>
      <div class="col-md-5"></div>
    </div>

  </div>
</section>
@endposts

<?php
    $case_studies_posts = new WP_Query([
        'post_type' => 'case-studies',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__not_in' => array(get_the_ID())
    ]);
    ?>

<section class="block-case-study-slider">
  <div class="fluid-container case-study-slider-container">
    <div class="row">
      <div class="col-12">
        <div class="case-study-slider splide">
          <div class="splide__track">
            <ul class="splide__list">
              <?php while ($case_studies_posts->have_posts()) : $case_studies_posts->the_post(); ?>
              <li class="splide__slide">
                <div class="case-study-card">
                  <a href="@permalink">
                    <h2>@title</h2>
                  </a>
                  <p><?php echo wp_trim_words(get_the_content(), 42); ?></p>
                  <a class="btn btn-orange" href="@permalink">
                    View Case Study
                  </a>
                </div>
              </li>
              <?php endwhile; wp_reset_query(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
