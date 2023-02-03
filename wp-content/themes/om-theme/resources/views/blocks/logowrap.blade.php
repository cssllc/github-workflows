@if (have_rows('logo'))
<section class="logo-wraps">
  <div class="container">
   <div class="row align-items-center justify-content-between justify-content-sm-center justify-content-lg-between">
   @fields('logo')
      <div class="col-auto">
        <img src="@sub('client_logo', 'url')" alt="@sub('client_logo', 'alt')">
      </div>
      @endfields
    </div>
  </div>
</section>
@endif