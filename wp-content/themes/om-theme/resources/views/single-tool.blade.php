@extends('layouts.app')
@section('content')
@posts

<div class="back-link back-link-green">
    <div class="container">
        <a href="<?php echo esc_attr(site_url('/tools')); ?>">
            <svg width="11px" height="10px" viewBox="0 0 11 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>back-arrow-icon</title>
                <g id="v1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="BlogPost-Mobile-(under-768)" transform="translate(-14.000000, -97.000000)" fill="#FF850D">
                        <g id="Group-26" transform="translate(14.585786, 96.000000)">
                            <g id="back-arrow-icon" transform="translate(0.000000, 1.757359)">
                                <path d="M3.41421356,3.37507799e-14 L4.82842712,1.41421356 L3,3.242 L10.4142136,3.24264069 L10.4142136,5.24264069 L3,5.242 L4.82842712,7.07106781 L3.41421356,8.48528137 L0.585786438,5.65685425 C-0.195262146,4.87580567 -0.195262146,3.60947571 0.585786438,2.82842712 L3.41421356,3.37507799e-14 Z" id="Combined-Shape"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            All Tools
        </a>
    </div>
</div>
<section class="resources-second-wrap blog-banner-wrap green-banner-wrap single-tool-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5 position-none-custom">
                <div class="blog-blue-bg-left"></div>
                <div class="blog-banner-desc">
                    <label class="sm-title sm-title-green">
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
                    <?php $tools_subtitle = get_field("tools_subtitle", get_the_ID()); ?>
                    <p><?php echo esc_html($tools_subtitle); ?></p>
                    <?php
                    $link = get_field('hero_button_tools');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a class="btn btn-warning rounded-pill btn-green mt-3" href="<?php echo esc_attr($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-7">
                <div class="blog-banner-img">
                    <img src="@thumbnail('full', false)" alt="@title" />
                </div>
            </div>
        </div>
</section>
<section class="section ebook-details-desc pb-5 tool-details-desc">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="article-ebook">
                    @content
                </div>
            </div>
        </div>
    </div>
</section>

@endposts
@endsection
