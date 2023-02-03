@extends('layouts.app')
@section('content')

@query([
'post_type' => 'case-studies',
'post_status' => 'publish',
'p' => get_field('featured_casestudy','option'),
'posts_per_page' => 1,
])

@posts

<style type="text/css">
    .blog-banner-img {
        background-image: url(@thumbnail('full', false)) !important;
    }
</style>
<section class="case-study-wrap">
    <div class="container">
        <div class="row xs-rep">
            <div class="col-md-8 position-none-custom">
                <div class="blog-blue-bg-left"></div>
                <div class="blog-banner-desc">
                    <label class="sm-title">Case Study</label>
                    <div class="case-s-img-banner">
                        <?php $case_study_logo = get_field("case_study_logo", get_the_ID()); ?>
                        <img src="<?php echo $case_study_logo; ?>" alt="" />
                    </div>
                    <a href="@permalink"><h1>@title</h1></a>
                    <?php $user_profile_image = get_field('user_image', 'user_' . get_the_author_meta('ID'));
                    $user_image = $user_profile_image; ?>
                    <p>@excerpt<a href="@permalink"></a>
                    </p>
                    <span class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php echo $user_image; ?>" alt="@author" />
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </span>
                </div>
            </div>
            <div class="col-md-4 position-none-custom">
                <div class="blog-banner-img"></div>
            </div>
        </div>
    </div>
</section>
@endposts

@query([
'post_type' => 'case-studies',
'post_status' => 'publish',
'posts_per_page' => -1,
])

<section class="case-study-card-wrap">
    <div class="container">
        <div class="row">
            @posts
            <div class="col-md-6">
                <div class="lg-card-wrap">
                    <label class="sm-title orange-label">Case Study</label>
                    <a href="@permalink">
                        <div class="card-img-logo">
                            <?php $case_study_logo = get_field("case_study_logo", get_the_ID()); ?>
                            <img src="<?php echo $case_study_logo; ?>" alt="" />
                        </div>
                    </a>
                    <a href="@permalink"><h2>@title</h2></a>
                    <?php $user_profile_image = get_field('user_image', 'user_' . get_the_author_meta('ID'));
                    $user_image = $user_profile_image; ?>
                    <p>@excerpt</p>
                    <span class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php echo $user_image; ?>" alt="@author" />
                        </div>
                        <div class="sm-profile-name">By @author</div>
                </div>
                </span>
            </div>
            @endposts
        </div>
    </div>
</section>

@endsection
