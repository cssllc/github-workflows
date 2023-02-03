<style>
.reach-your-left {
    background-image: url(<?php echo esc_url(get_field('left_image')); ?>);
}
</style>
<?php if( get_field('title_career') ) {?>
<section class="reach-your-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 position-none-custom">
                <div class="reach-your-left"></div>
            </div>
            <div class="col-md-6">
                <div class="reach-your-right">
                    <h2><?php echo esc_html(get_field('title_career')); ?></h2>
                    <h4><?php echo esc_html(get_field('description_career')); ?></h4>
                    <?php
                    $link = get_field('button_career');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a class="btn btn-warning rounded-pill btn-orange" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
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
<section class="build-main reach-bottom">
    <div class="container">
        <div class="build-space-shadow d-none d-md-block">
            <div class="row">
                <?php if (have_rows('four_points_career')) : ?>
                    <?php while (have_rows('four_points_career')) : the_row(); ?>
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
            <div class="row careerpoints">
                <?php if (have_rows('four_points_career')) : ?>
                    <?php while (have_rows('four_points_career')) : the_row(); ?>
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
<?php }?>
