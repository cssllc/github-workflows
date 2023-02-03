<section class="be-human-main">
  <div class="container">
    <div class="row justify-content-between xs-our-team">
      <div class="col-md-5">
        <div class="be-human-left">
          <label class="sm-title">@field('behuman_sub_title')</label>
          <h2>@field('behuman_title')</h2>
          <p>@field('behuman_descriptions')</p>
          <a href="@field('behuman_link', 'url')" target="@field('behuman_link', 'target')" class="link-btn link-yellow">@field('behuman_link', 'title')</a>
        </div>
      </div>
      <div class="col-md-6 position-none-custom pl-0">
        <div class="be-human-right" style="background-image: url(@field('right_image', 'url')); background-repeat: no-repeat;; background-size: cover; background-position: center center"
	data-rjs="2">

        </div>
      </div>
    </div>
  </div>
</section>
