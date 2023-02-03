{{--
  Template Name: Resource Template
--}}

@extends('layouts.app')
@section('content')

<!--BLOCK: Start Resource Menu -->
@include('blocks.resource-menu')
<!--/BLOCK: END Resource Menu -->

@query([
'post_type' => 'post',
'post_status' => 'publish',
'post__in' => get_field('featured_blog'),
'order' => 'ASC',
])

<?php
$x = 0;
$y = 0;
?>
<section class="resources-main-wrap">
    <div class="container">
        <div class="row">
            @posts
            <?php if ($x == 0) { ?>
                <div class="col-md-8 position-none-custom">
                    <div class="resources-left-bg"></div>
                    <div class="resources-left-hero">
                        <div class="resources-banner-desc">
                            <label class="sm-title">
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
                            <div class="resources-img-wrap">
                                <a href="@permalink">
                                    <img src="@thumbnail('full', false)" alt="" />
                                </a>
                            </div>
                            <h1><a href="@permalink">@title</a></h1>
                            <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?><a href="@permalink">Read More</a></p>
                            <span class="sm-profile">
                                <div class="sm-profile-img">
                                    <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" alt="" />
                                </div>
                                <div class="sm-profile-name">By @author</div>
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php $x++; ?>
            @endposts
            <div class="col-md-4">
                <div class="resources-right-hero">
                    @posts
                    <?php if (!$y == 0) { ?>
                        <div class="card blog-card-wrap">
                            <a href="@permalink">
                                <img src="@thumbnail('full', false)" class="card-img-top" alt="" />
                            </a>
                            <div class="card-body">
                                <span class="sm-profile">
                                    <div class="sm-profile-img">
                                        <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" alt="" />
                                    </div>
                                    <div class="sm-profile-name">By @author</div>
                                </span>
                                <h4><a href="@permalink">@title</a></h4>
                            </div>
                        </div>
                    <?php } ?>
                    <?php $y++; ?>
                    @endposts
                </div>
            </div>
        </div>
    </div>
</section>

@query([
'post_type' => 'video',
'post_status' => 'publish',
'p' => get_field('featured_video'),
'posts_per_page' => -1,
])

@posts
<?php
$postid = get_the_ID();
// Load value.
$iframe = get_field('video_url', $postid);
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
<section class="resources-second-wrap blog-banner-wrap featured-video-section">
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
                    <h2>@title</h2>
                    <p>@content</p>
                    <div class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" alt="">
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </div>
                    <a href="<?php echo site_url('/videos') ?>" class="links">View All Videos +</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="blog-banner-img">
                    <?php echo $iframe; ?>
                </div>
            </div>
        </div>
    </div>
</section>
@endposts

@query([
'post_type' => 'tool',
'post_status' => 'publish',
'p' => get_field('featured_tools'),
'posts_per_page' => -1,
])

@posts
<section class="resources-third case-studies-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="case-studies-inner">
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
                    <h2>@title</h2>
                    <?php $tools_subtitle = get_field("tools_subtitle", get_the_ID()); ?>
                    <p><?php echo esc_html($tools_subtitle); ?></p>
                    <?php
                    $link = get_field('hero_button_tools', get_the_ID());
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a class="btn btn-warning rounded-pill btn-green" href="<?php echo esc_attr($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php
                    endif;
                    ?>
                    <a href="<?php echo site_url('/tools') ?>" class="links">View All Tools +</a>
                </div>
            </div>
            <div class="col-md-5 position-none-custom">
                <div class="case-studies-right"></div>
            </div>
        </div>
    </div>
</section>
@endposts

@query([
'post_type' => 'post',
'post_status' => 'publish',
'posts_per_page'=> 6,
'post__not_in' => get_field('featured_blog'),
'order' => 'ASC',
])

<section class="section resources-blog blogs-template-cards">
    <div class="container">
        <div class="row" id="blogdata">
            @posts
            <div class="col-md-4 blog-space">
                <div class="card blog-card-wrap">
                    <a href="@permalink"> <img src="@thumbnail('full', false)" class="card-img-top" alt="..." /></a>
                    <div class="card-body">
                        <span class="sm-profile">
                            <div class="sm-profile-img">
                                <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" alt="" />
                            </div>
                            <div class="sm-profile-name">By @author</div>
                        </span>
                        <h4><a href="@permalink">@title</a></h4>
                    </div>
                </div>
            </div>
            @endposts
        </div>
        <div class="text-center">
            <a href="<?php echo site_url('/blog/'); ?>">
                <button type="button" id="loadmore" data-pagedid="1" class="btn btn-warning rounded-pill btn-orange">View all Blog Posts</button>
            </a>
        </div>
    </div>
</section>


@query([
'post_type' => 'ebooks',
'post_status' => 'publish',
'p' => get_field('featured_ebook'),
'posts_per_page' => 1,
])

@posts
<section class="resources-second-wrap resources-book-wrap blog-banner-wrap">
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
                    <h2><a href="@permalink">@title</a></h2>
                    <?php $ebook_subtitle = get_field("ebook_subtitle", get_the_ID()); ?>
                    <p><?php echo esc_html($ebook_subtitle); ?></p>
                    <span class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" alt="">
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </span>
                    <a href="@field('download_ebook', 'url')" target="_blank" class="btn btn-warning rounded-pill btn-purple">Download the eBook</a>
                    <a href="<?php echo site_url('/ebooks/'); ?>" class="links">View All eBooks +</a>
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
