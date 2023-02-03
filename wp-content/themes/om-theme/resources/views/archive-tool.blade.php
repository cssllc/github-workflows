@extends('layouts.app')
@section('content')

<!--BLOCK: Start Resource Menu -->
@include('blocks.resource-menu')
<!--/BLOCK: END Resource Menu -->

@query([
'post_type' => 'tool',
'post_status' => 'publish',
'posts_per_page' => -1,
])

@posts
<section class="resources-second-wrap blog-banner-wrap green-banner-wrap tools-main-wrap">
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
                    <h1><a href="@permalink">@title</a></h1>
                    <?php
                    $tools_subtitle = get_field("tools_subtitle", get_the_ID());
                    ?>
                    <p><?php echo wp_kses_post($tools_subtitle); ?></p>
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
                    <a href="@permalink" class="links">Learn More +</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="blog-banner-img">
                    <img src="@thumbnail('full', false)" alt="@title">
                </div>
            </div>
        </div>
    </div>
</section>
@endposts

@endsection
