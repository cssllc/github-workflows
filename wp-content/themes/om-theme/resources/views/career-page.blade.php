{{--
Template Name: Career Page Template
--}}

@extends('layouts.app')
@section('content')
@while(have_posts()) @php(the_post())

<style>
    section.full-banner-wrap {
        background-image: url(<?php echo esc_url(get_field('hero_image')); ?>);
    }

    .teammates-left {
        background-image: url(<?php echo esc_url(get_field('left_side_image_team')); ?>);
    }
</style>

<?php if (get_field('hero_title')) { ?>
    <section class="full-banner-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="full-banner-inner-text">
                        <h1><?php echo esc_html(get_field('hero_title')); ?></h1>
                        <h4><?php echo esc_html(get_field('hero_description')); ?></h4>
                        <?php
                        $link = get_field('hero_button');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a class="btn btn-orange" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <?php echo esc_html($link_title); ?>
                            </a>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (get_field('title_looking')) { ?>
    <section class="growth-process-main who-looking-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-6 col-lg-6">
                    <div class="growth-process-inner-wrap">
                        <div class="sm-title-bg">
                            <h2><?php echo esc_html(get_field('title_looking')); ?></h2>
                        </div>
                        <h4><?php echo esc_html(get_field('descriptions_looking')); ?></h4>
                    </div>
                </div>
                <div class="col-sm-5 col-lg-5"></div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (have_rows('key_points_looking')) : ?>
    <section class="build-main looking-expert after-none d-none d-md-block">
        <div class="container">
            <div class="build-space-shadow">
                <div class="row">
                    <?php while (have_rows('key_points_looking')) : the_row(); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="build-inner-wrap">
                                <h4><?php echo esc_html(get_sub_field('title')); ?></h4>
                                <p><?php echo esc_html(get_sub_field('description')); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('key_points_looking')) : ?>
    <section class="build-main looking-expert after-none d-md-none">
        <div class="container">
            <div class="build-space-shadow">
                <div class="row careerlookingslider">
                    <?php while (have_rows('key_points_looking')) : the_row(); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="build-inner-wrap">
                                <h4><?php echo esc_html(get_sub_field('title')); ?></h4>
                                <p><?php echo esc_html(get_sub_field('description')); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('title_team')) { ?>
    <section class="teammates-main-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 position-none-custom">
                    <div class="teammates-left"></div>
                </div>
                <div class="col-md-6 position-none-custom">
                    <div class="teammates-right-bg"></div>
                    <div class="teammates-right-desc">
                        <h2><?php echo esc_html(get_field('title_team')); ?></h2>
                        <h4><?php echo esc_html(get_field('description')); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<section class="build-main teammates">
    <div class="container">
        <div class="build-space-shadow d-none d-md-block">
            <div class="row">
                <?php if (have_rows('key_points_team')) : ?>
                    <?php while (have_rows('key_points_team')) : the_row(); ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="build-inner-wrap">
                                <h4><?php echo esc_html(get_sub_field('title')); ?></h4>
                                <p><?php echo esc_html(get_sub_field('description')); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="build-space-shadow d-md-none">
            <div class="row careerlearningslider">
                <?php if (have_rows('key_points_team')) : ?>
                    <?php while (have_rows('key_points_team')) : the_row(); ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="build-inner-wrap">
                                <h4><?php echo esc_html(get_sub_field('title')); ?></h4>
                                <p><?php echo esc_html(get_sub_field('description')); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if (get_field('title_employee')) { ?>
    <section class="employee-benefits-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="employee-benefits-left">
                        <div class="sm-title-bg">
                            <h2><?php echo esc_html(get_field('title_employee')); ?></h2>
                        </div>
                        <?php if (have_rows('key_points_employee')) : ?>
                            <?php while (have_rows('key_points_employee')) : the_row(); ?>
                                <div class="employee-list-wrap">
                                    <h4><?php echo esc_html(get_sub_field('title')); ?></h4>
                                    <p><?php echo esc_html(get_sub_field('description')); ?></p>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-7 position-none-custom ">
                    <?php if (have_rows('right_slider')) : ?>
                        <div class="employee-benefits-right employeeimageslider">
                            <?php while (have_rows('right_slider')) : the_row(); ?>
                                <img src="<?php echo esc_url(get_sub_field('image')); ?>">
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php } ?>

<?php if (have_rows('reviews')) : ?>
    <section class="carousel-slider-wrap review-slider-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div id="page-gravure">
                        <div class="sliders">
                            <div class="slide careerreview">
                                <?php while (have_rows('reviews')) : the_row(); ?>
                                    <div class="autoplay-slide">
                                        <p><?php echo esc_html(get_sub_field('review')); ?></p>
                                        <div class="media mt-5">
                                            <img src="<?php echo esc_url(get_sub_field('image')); ?>" class="mr-3 mr-md-4" alt="">
                                            <div class="media-body text-left">
                                                <h6 class="mt-0"><?php echo esc_html(get_sub_field('name')); ?></h6>
                                                <p><?php echo esc_html(get_sub_field('position')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('title_position')) { ?>
    <section class="available-positions-wrap" id="availablepositions">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="growth-process-inner-wrap">
                        <div class="sm-title-bg">
                            <h2><?php echo esc_html(get_field('title_position')); ?></h2>
                        </div>
                        <h4><?php echo esc_html(get_field('description_position')); ?></h4>
                    </div>
                </div>
            </div>
            <div class="row d-none d-md-flex">
                <?php if (have_rows('jobs')) : ?>
                    <?php while (have_rows('jobs')) : the_row(); ?>
                        <div class="col-md-6 fix-height-space">
                            <div class="available-positions-inner-box">
                                <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                                <p><?php echo esc_html(get_sub_field('small_description')); ?></p>
                                <?php
                                $link = get_sub_field('link');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="links links-orange d-block mt-4" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>
                                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="row d-md-none joblistslider">
                <?php if (have_rows('jobs')) : ?>
                    <?php while (have_rows('jobs')) : the_row(); ?>
                        <div class="col-md-6 fix-height-space">
                            <div class="available-positions-inner-box">
                                <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                                <p><?php echo esc_html(get_sub_field('small_description')); ?></p>
                                <?php
                                $link = get_sub_field('link');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="links links-orange d-block mt-4" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>
                                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (get_field('title_position')) { ?>
    <section class="hear-from-you-wrap contact-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-5">
                    <div class="hear-from-you-wrap-left">
                        <h1><?php echo esc_html(get_field('title_form')); ?></h1>
                        <h4><?php echo esc_html(get_field('description_form')); ?></h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="hear-from-you-wrap-right form-same-ui">
                        <div class="form-same-ui-inner">
                            <?php $form_id = get_field('form_id'); ?>
                            <?php gravity_form($form_id, false, false, false, null, true, true); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

@endwhile
@endsection
