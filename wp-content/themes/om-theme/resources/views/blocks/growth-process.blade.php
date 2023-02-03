<section class="growth-process-main">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-sm-6 col-lg-6">
        <div class="growth-process-inner-wrap">
          <h2>@field('growth_title')</h2>
          <p>@field('growth_description')</p>
          <a href="@field('growth_link', 'url')" target="@field('growth_link', 'target')" class="link-btn">@field('growth_link','title')</a>
        </div>
      </div>
      <div class="col-sm-5 col-lg-5">
        <div class="growth-process-right">
          <h4>@field('client_feedback')</h4>
          <p>@field('client_name')</p>
        </div>
      </div>
    </div>
  </div>
</section>

@if (have_rows('process'))
<section class="build-main">
  <div class="container">
    <div class="build-space-shadow">
      <div class="row">
        @fields('process')
        <div class="col-sm-6 col-lg-3">
          <div class="build-inner-wrap">
            <h4>@sub('step_title')</h4>
            <p>@sub('step_descriptions')</p>
          </div>
        </div>
        @endfields
      </div>
    </div>
  </div>
</section>
@endif