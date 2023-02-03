@extends('layouts.app')
@section('content')
@posts
<div class="back-link">
    <div class="container">
        <a href="<?php echo site_url('/ebooks'); ?>">
            <img src="<?php echo (get_template_directory_uri() . '/images/back-arrow-icon.svg'); ?>"> Back
        </a>
    </div>
</div>
<section class="resources-second-wrap resources-book-wrap all-ebooks-wrap blog-banner-wrap ebook-details-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-5 position-none-custom">
                <div class="blog-blue-bg-left"></div>
                <div class="blog-banner-desc">
                    <label class="sm-title sm-title-purple">
                        <?php $i = 0; ?>
                        <?php foreach (get_the_category() as $category) { ?>
                            <?php if ($i !== 0) {
                                echo ', ';
                            } ?>
                            <a class="cat-name" href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>">
                                <?php echo esc_html($category->cat_name); ?>
                            </a>
                            <?php $i++; ?>
                        <?php } ?>
                    </label>
                    <h1>@title</h1>
                    <?php $ebook_subtitle = get_field("ebook_subtitle", get_the_ID()); ?>
                    <h4><?php echo $ebook_subtitle; ?></h4>
                    <a href="@field('download_ebook')" target="_blank" class="btn btn-warning rounded-pill btn-purple mt-3">Download the eBook</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="blog-banner-img">
                    <img src="@thumbnail('full', false)" alt="@title" />
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section ebook-details-desc">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="article-ebook">
                    @content
                    <div class="blog-profile-details-wrap mt-5 mb-5 d-md-none">
                        <label class="sm-title">WRITTEN BY</label>
                        <div class="media lg-profile-img">
                            <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" class="mr-3" alt="..." />
                            <div class="media-body">
                                <h3>@author</h3>
                                <p class="profile-name">
                                    <?php echo get_field('user_position', 'user_' . get_the_author_meta('ID')); ?> <br />
                                    @option( 'om_performance_marketers' )
                                </p>
                            </div>
                        </div>
                        <p>
                            <?php echo get_the_author_meta('description'); ?>
                        </p>
                        <a href="<?php echo site_url('/about/'); ?>" class="links links-purple d-block mt-4">Meet the Team +</a>
                    </div>

                    <h2>@option('title')</h2>
                    <p>
                        @option('om_description')
                    </p>
                    <a class="links links-purple" href="@option('link','url')" target="@option('link','target')">@option('link','title')</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="ebook-profile">
                    <div class="blog-profile-details-wrap d-none d-md-block">
                        <label class="sm-title">WRITTEN BY</label>
                        <div class="media lg-profile-img">
                            <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" class="mr-3" alt="..." />
                            <div class="media-body">
                                <h3>@author</h3>
                                <p class="profile-name">
                                    <?php the_field('user_position', 'user_' . get_the_author_meta('ID')); ?> <br />
                                    @option( 'om_performance_marketers' )
                                </p>
                            </div>
                        </div>
                        <p>
                            <?php echo get_the_author_meta('description'); ?>
                        </p>
                        <a href="<?php echo site_url('/about/'); ?>" class="links links-purple d-block mt-4">Meet the Team +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endposts
@endsection
