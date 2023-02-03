<style>
.case-studies-right {
    background-image: url(<?php echo esc_url(get_field('image_join_team')); ?>);
}
</style>
<?php if( get_field('title_join_team') ) {?>
<section class="case-studies-wrap what-clients-say">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-6">
                <div class="case-studies-inner">
                    <h2><?php echo esc_html(get_field('title_join_team')); ?></h2>
                    <div class="clientsayslider">
                        <?php if (have_rows('reviews_join_team')) : ?>
                            <?php while (have_rows('reviews_join_team')) : the_row(); ?>
                                <div>
                                    <h4>“<?php echo esc_html(get_sub_field('review')); ?>”</h4>
                                    <p class="name-heading"><?php echo esc_html(get_sub_field('name')); ?></p>
                                    <p><?php echo esc_html(get_sub_field('company_name')); ?></p>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="join-team-wrap">
                    <h3><?php echo esc_html(get_field('join_our_team_title')); ?></h3>
                    <p><?php echo esc_html(get_field('small_description')); ?></p>
                    <?php
                    $link = get_field('button_join_team');
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
            <div class="col-md-5 col-lg-6 position-none-custom">
                <div class="case-studies-right"></div>
            </div>
        </div>
    </div>
</section>
<?php }?>
