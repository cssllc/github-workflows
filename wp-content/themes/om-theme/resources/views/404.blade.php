@extends('layouts.app')

@section('content')
<section class="main-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-7 order-2 order-md-1 left-column">
        <div class="content-wrapper">
          <h1 class="title">@option('404_template_title')</h1>
          <p class="description">@option('404_template_description')</p>
          @hasoptions('404_template_links')
          <ul class="links-list list-unstyled">
            @options('404_template_links')
            @hassub('link')
            <li>
              <a href="@sub('link', 'url')" target="@sub('link', 'target')">
                @sub('link', 'title')
              </a>
            </li>
            @endsub
            @endoptions
          </ul>
          @endhasoptions
        </div>
      </div>

      @hasoption('404_template_image')
      <div class="order-1 order-md-2 right-column">
        <img class="right-column-image" src="@option('404_template_image', 'url')"
          alt="@option('404_template_image', 'title')" />
      </div>
      @endoption
    </div>
  </div>
</section>
@endsection