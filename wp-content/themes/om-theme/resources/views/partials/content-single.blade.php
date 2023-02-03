<div class="back-link">
    <div class="container">
        <a href="<?php echo site_url('/blog'); ?>">
            <img src="<?php echo (get_template_directory_uri() . '/images/back-arrow-icon.svg'); ?>"> Back
        </a>
    </div>
</div>
<section class="blog-banner-wrap blog-details-banner-wrap">
    <div class="container">
        <div class="row col-sm-rev">
            <div class="col-md-7 position-none-custom">
                <div class="blog-blue-bg-left"></div>
                <div class="blog-banner-desc">
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
                    <h1>@title</h1>
                    <div class="date-text">@published('F j, Y')</div>

                    <span class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" alt="">
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </span>
                </div>
            </div>
            <div class="col-md-5">
                <div class="blog-banner-img">
                    <img src="@thumbnail('full', false)" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details-article">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article>
                    @content
                </article>
                <div class="blog-profile-details-wrap">
                    <label class="sm-title">@option('written_by')</label>
                    <div class="media lg-profile-img">
                        <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" class="mr-3" alt="..." />
                        <div class="media-body">
                            <h3>@author</h3>
                            <p class="profile-name">
                                <?php the_field('user_position', 'user_' . get_the_author_meta('ID')); ?> <br />
                                @option('om_performance_marketers')
                            </p>
                        </div>
                    </div>
                    <p>
                        <?php $authorDesc = the_author_meta('description');
                        echo $authorDesc; ?>
                    </p>
                    <a href="<?php echo site_url('/about'); ?>" target="" class="link-btn">Meet the Team +</a>
                </div>
            </div>
            <div class="col-md-4">

                <div class="blog-right-bar-details">
                    <form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>">
                        <div class="input-group mb-3 serach-bar-blog-wrap">
                            <input type="text" name="s" class="search-field form-control serach-bar-blog" placeholder="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-warning rounded-pill btn-orange" type="submit" id="button-addon2"><img src="<?php echo site_url('/wp-content/uploads/2021/06/search-bar-icon.svg'); ?>" /></button>
                            </div>
                        </div>
                    </form>

                    <div class="recent-articles-wrap">
                        <h4>Recent Articles</h4>
                        @php
                        $query = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => '3'
                        ]);
                        @endphp
                        <ul class="list-unstyled">
                            @posts($query)
                            <li>
                                <a href="@permalink"> @title</a>
                            </li>
                            @endposts
                        </ul>
                    </div>
                </div>
                <div class="blog-details-eddd">
                    <a href="@option('ad_link')">
                        <img src="@option('ad_right_image')">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="performance-marketing-wrap" style="background-image: url('@option('case_stury_background')');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="performance-marketing-inner-wrap">
                    <h2>@option('case_study_title')</h2>
                    <h4>@option('case_study_descriptions')</h4>
                    <a href="@option('case_study_button', 'url')" target="@option('case_study_button', 'target')">
                        <button type="button" class="btn btn-warning rounded-pill">@option('case_study_button',
                            'title')</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
