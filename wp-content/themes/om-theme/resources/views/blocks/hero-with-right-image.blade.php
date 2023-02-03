<section class="services-strategic-wrap">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6">
        <div class="services-strategic-inner">
          <h1>@field('hero_title')</h1>
          <h4>@field('hero_description')</h4>
          @hasfield('hero_button')
          <a href="@field('hero_button', 'url')" target="@field('hero_button', 'target')">
          <button type="button" class="btn btn-warning rounded-pill btn-orange">@field('hero_button', 'title')</button></a>
          @endfield
        </div>
      </div>
      <div class="col-md-5 position-none-custom">
        <div class="services-strategic-img" style="background-image: url(@field('hero_image_right'))"></div>
      </div>
    </div>
  </div>
</section>