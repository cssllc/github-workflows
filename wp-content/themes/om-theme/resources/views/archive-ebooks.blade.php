@extends('layouts.app')
@section('content')

<!--BLOCK: Start Resource Menu -->
@include('blocks.resource-menu')
<!--/BLOCK: END Resource Menu -->

@query([
'post_type' => 'ebooks',
'post_status' => 'publish',
'p' => get_field('featured_ebook','option'),
'posts_per_page' => 1,
])

@posts

<section class="resources-second-wrap resources-book-wrap all-ebooks-wrap blog-banner-wrap">
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
                    <a href="@permalink">
                        <h1>@title</h1>
                    </a>
                    <?php $ebook_subtitle = get_field("ebook_subtitle", get_the_ID()); ?>
                    <p><?php echo $ebook_subtitle; ?></p>
                    <span class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" alt="">
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </span>
                    <a href="@field('download_ebook', 'url')" target="_blank" class="btn btn-warning rounded-pill btn-purple">Download the eBook</a>
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


@query([
'post_type' => 'ebooks',
'post_status' => 'publish',
'posts_per_page' => -1,
])
<section class="section all-ebooks-blogs blogs-template-cards">
    <div class="container">
        <div class="row" id="blogdata">
            <input type="hidden" id="maxpages" value="31">
            @posts
            <div class="col-md-4 blog-space">
                <div class="card blog-card-wrap">
                    <a href="@permalink">
                        <img src="@thumbnail('full', false)" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <span class="sm-profile">
                            <div class="sm-profile-img">
                                <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" alt="@author">
                            </div>
                            <div class="sm-profile-name">By @author</div>
                        </span>
                        <a href="@permalink">
                            <h4>@title</h4>
                        </a>
                    </div>
                </div>
            </div>
            @endposts
        </div>
    </div>
</section>
@endsection
