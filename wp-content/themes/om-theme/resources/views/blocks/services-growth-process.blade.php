<section class="growth-process-main services-growth-process-main">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-sm-12 col-lg-6">
        <div class="growth-process-inner-wrap">
          <h2>@field('growth_title')</h2>
          <h4>@field('growth_descriptions')</h4>
        </div>
      </div>
      <div class="col-sm-12 col-lg-5">
      </div>
    </div>
  </div>
</section>


@if (have_rows('four_steps'))
<section class="services-media-main d-none d-md-block">
  <div class="container sliders">
    <div class="row">
      @fields('four_steps')
      <div class="col-md-6 mb-30">
        <div class="services-media-wrap">
          <div class="media">
            <div class="services-media-img">
              <?php ob_start() ?>
              <img src="@sub('four_step_image')">
              <?php
              $img = ob_get_clean();
              echo apply_filters( 'services-growth-process-img', $img, get_row_index() )
              ?>
            </div>
            <div class="media-body">
              <h3 class="mt-0">@sub('four_step_title')</h3>
              @sub('four_step_descriptions')
            </div>
          </div>
        </div>
      </div>
      @endfields
    </div>
  </div>
</section>
@endif

@if (have_rows('four_steps'))
<section class="services-media-main services-media-main-xs-slider d-md-none">
  <div class="container sliders">
    <div class="row maingrowslide">
      @fields('four_steps')
      <div class="col-md-6 mb-30">
        <div class="services-media-wrap">
          <div class="media">
            <div class="services-media-img">
              <img src="@sub('four_step_image')">
            </div>
            <div class="media-body">
              <h3 class="mt-0">@sub('four_step_title')</h3>
              @sub('four_step_descriptions')
            </div>
          </div>
        </div>
      </div>
      @endfields
    </div>
  </div>
</section>
@endif
