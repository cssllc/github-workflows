<section class="growth-process-main services-growth-process-main">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-sm-6 col-lg-6">
        <div class="growth-process-inner-wrap">
          <div class="sm-title-bg">
            <h2>@field('growth_title')</h2>
          </div>
          <h4>@field('growth_descriptions')</h4>
        </div>
      </div>
      <div class="col-sm-5 col-lg-5"></div>
    </div>
  </div>
</section>

@if (have_rows('four_steps'))
<section class="build-main core-solution-wrap after-none c-f-t-a-wrap d-none d-md-block">
  <div class="container">
    <div class="build-space-shadow">
      <div class="row">
        @fields('four_steps')
        <div class="col-sm-6 col-lg-3">
          <div class="build-inner-wrap">
            <h4>@sub('four_step_title')</h4>
            <p>@sub('four_step_descriptions')</p>
          </div>
        </div>
        @endfields
      </div>
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
              <h4 class="mt-0">@sub('four_step_title')</h3>
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