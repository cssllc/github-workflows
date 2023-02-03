<style>
.case-studies-right {
  background-image: url(@field('case_studies_right_image'));
}
</style>

<section class="case-studies-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="case-studies-inner">
          <label class="sm-title">@field('case_studies_sub_title')</label>
          <h2>@field('case_studies_title')</h2>
          <p>@field('case_studies_descriptions')</p>
          <a href="@field('case_studies_button', 'url')" target="@field('case_studies_button', 'target')"><button
              type="button" class="btn btn-warning rounded-pill btn-orange">@field('case_studies_button',
              'title')</button></a>
        </div>
        <div class="shelbe-marketer-wrap">
          <div class="shelbe-text">@field('marketer_title')</div>
          <p>@field('marketer_position')</p>
        </div>
      </div>
      <div class="col-md-5 position-none-custom">
        <div class="case-studies-right"></div>
      </div>
    </div>
  </div>
</section>