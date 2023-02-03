<section class="services-four-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sm-title-bg">
                    <h2>@field('main_serive_title')</h2>
                </div>
            </div>
            
            @if(have_rows('services'))
            @fields('services')
            <div class="col-md-6 col-lg-3">
                <div class="services-four-inner">
                    <h4>@sub('service_title')</h4>
                    <ul>
                    @sub('service_description')
                    </ul>
                </div>
            </div>
            @endfields
            @endif
        </div>
    </div>
</section>