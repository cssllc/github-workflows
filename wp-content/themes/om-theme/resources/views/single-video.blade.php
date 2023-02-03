@extends('layouts.app')
@section('content')
@posts
<div class="back-link">
    <div class="container">
        <a href="<?php echo esc_url(site_url('/videos')); ?>" class="links links-red">
            <img src="<?php echo (get_template_directory_uri() . '/images/back-arrow-icon-red-1.svg'); ?>"> All Videos
        </a>
    </div>
</div>

<?php

// Load value.
$iframe = get_field('video_url');

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replcae HTML.
$params = array(
    'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
?>

<section class="resources-second-wrap blog-banner-wrap all-video-main-wrap single-video-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-5 position-none-custom">
                <div class="blog-blue-bg-left"></div>
                <div class="blog-banner-desc">
                    <label class="sm-title sm-title-red">
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
                    <p>@content</p>
                    <div class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" alt="">
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="blog-banner-img">
                    <div class="embed-container">
                        <?php echo $iframe; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section ebook-details-desc video-details-page">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="article-ebook">
                    <div class="blog-profile-details-wrap mt-5 mb-5 d-md-none">
                        <label class="sm-title">Video by</label>
                        <div class="media lg-profile-img">
                            <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" class="mr-3" alt="" />
                            <div class="media-body">
                                <h3>@author</h3>
                                <p class="profile-name">
                                    <?php $author_id = get_the_author_meta('ID'); ?>
                                    <?php echo esc_html(get_field('user_position', 'user_' . $author_id)); ?> <br />
                                    OM Performance Marketers
                                </p>
                            </div>
                        </div>
                        <p>
                            <?php
                            $userdata = get_userdata($author_id);
                            $description = $userdata->description;
                            echo $description;
                            ?>
                        </p>
                        <a href="<?php echo esc_url(site_url('/about/')); ?>" class="links links-red d-block mt-4">Meet the Team +</a>
                    </div>

                    <h2>@option('title')</h2>
                    <p>
                        @option('om_description')
                    </p>
                    <a class="links links-red" href="@option('link','url')" target="@option('link','target')">@option('link','title')</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="ebook-profile">
                    <div class="blog-profile-details-wrap d-none d-md-block">
                        <label class="sm-title">Video by</label>
                        <div class="media lg-profile-img">
                            <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" class="mr-3" alt="..." />
                            <div class="media-body">
                                <h3>@author</h3>
                                <p class="profile-name">
                                    <?php echo esc_html(get_field('user_position', 'user_' . get_the_author_meta('ID'))); ?> <br />
                                    @option( 'om_performance_marketers' )
                                </p>
                            </div>
                        </div>
                        <p>
                            <?php
                            $userdata = get_userdata($author_id);
                            $description = $userdata->description;
                            echo $description;
                            ?>
                        </p>
                        <a href="<?php echo esc_url(site_url('/about/')); ?>" class="links links-red d-block mt-4">Meet the Team +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endposts
@endsection
