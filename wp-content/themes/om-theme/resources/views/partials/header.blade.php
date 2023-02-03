<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<?php
if (is_page_template('healthcare-page.blade.php') || is_home() || is_front_page()) { ?>
    <section class="hero-nav hover-menu-change" style="background-image: url(@field('banner_background_desktop', 'url')); background-repeat: no-repeat; background-size: cover; background-position: bottom center" data-rjs="2">
        <div class="hero-nav-hover-wrap">
            <div class="container">
                <div class="header-nav">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ home_url('/') }}">
                            <img class="white-logo" src="<?php echo (get_template_directory_uri() . '/images/om-full-logo-white.svg'); ?>" alt="">
                            <img class="hover-color-logo" src="<?php echo (get_template_directory_uri() . '/images/om-full-logo-color.svg'); ?>" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <svg class="toggler-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 23">
                                <g fill="#FFFFFF" fill-rule="evenodd">
                                    <path d="M3 23h26v-3H0a3 3 0 003 3zM0 0h29v3H0zM0 10h29v3H0z" />
                                </g>
                            </svg> </button>
                        <a class="nav-link btn btn-warning rounded-pill sm-md-show-btn" href="@option('contact_menu_button','url')">@option('contact_menu_button','title')</a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <button class="inner-nav-xs navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                                <img src="<?php echo site_url('/wp-content/uploads/2021/06/close-icon-1.svg'); ?>" alt="">
                            </button>
                            <ul class="navbar-nav ml-auto">
                                <?php if (have_rows('header_menu', 'option')) : ?>
                                    <?php while (have_rows('header_menu', 'option')) : the_row(); ?>
                                        <?php
                                        $link = get_sub_field('main_menu', 'option');
                                        $menu_descriptions = get_sub_field('menu_descriptions', 'option');
                                        $link_text = get_sub_field('link_text');
                                        $link_text_url = $link_text['url'];
                                        $link_text_title = $link_text['title'];
                                        $link_text_target = $link_text['target'] ? $link_text['target'] : '_self';
                                        if (have_rows('sub_menu', 'option')) { ?>
                                            <li class="nav-item dropdown has-megamenu">
                                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><?php echo esc_html($link['title']) ?></a>
                                                <div class="dropdown-menu megamenu fade-down">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-lg-3">
                                                            <div class="mega-left">
                                                                <h4><?php echo esc_html($link['title']) ?></h4>
                                                                <p><?php echo esc_html($menu_descriptions); ?></p>
                                                                <a class="links" href="<?php echo esc_url($link_text_url); ?>" target="<?php echo esc_attr($link_text_target); ?>"><?php echo esc_html($link_text_title); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8 col-lg-9">
                                                            <div class="row">
                                                                <?php $i = 1;
                                                                while (have_rows('sub_menu', 'option')) : the_row(); ?>
                                                                    <div class="col-sm-6 col-lg-3 <?php if ($i == 1 || $i == 2) {
                                                                                                        echo 'sm-md-space';
                                                                                                    } ?>">
                                                                        <div class="mega-col">
                                                                            <h5><?php echo esc_html(get_sub_field('title')); ?></h5>
                                                                            <p><?php echo esc_html(get_sub_field('description')); ?></p>
                                                                            <?php
                                                                            $link = get_sub_field('link_url');
                                                                            if ($link) :
                                                                                $link_url = $link['url'];
                                                                                $link_title = $link['title'];
                                                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                                            ?>
                                                                                <a style="color:<?php echo get_sub_field('link_color'); ?>" class="links nav-blog-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                                                            <?php
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                <?php $i++;
                                                                endwhile; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="dropdown-menu-md-none" aria-labelledby="navbarDropdown">
                                                        <?php while (have_rows('sub_menu', 'option')) : the_row(); ?>
                                                            <?php $link = get_sub_field('link_url'); ?>
                                                            <li><a class="dropdown-item" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html(get_sub_field('title')); ?></a></li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php } else { ?>
                                            <?php
                                            $link = get_sub_field('main_menu');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                                </li>
                                            <?php
                                            endif;
                                            ?>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <li class="nav-item last-btn">
                                    <a class="nav-link btn btn-warning rounded-pill" href="@option('contact_menu_button','url')">@option('contact_menu_button','title')</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="nav-ovraly" style="display: none;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="hero-dec">
                        <h1>@field('banner_title')</h1>
                        <h4>@field('banner_tag_line')</h4>
                        <a class="btn btn-warning rounded-pill" href="@field('banner_button_left','url')" target="@field('banner_button_left','target')">@field('banner_button_left','title')</a>
                        <?php if (is_page_template('healthcare-page.blade.php')) { ?>
                            <a class="btn btn-outline-warning rounded-pill" href="@field('banner_button_right','url')" target="@field('banner_button_right','target')">@field('banner_button_right','title') <i class="icon-download"></i> </a>
                        <?php } else { ?>
                            <a class="btn btn-outline-warning rounded-pill" href="@field('banner_button_right','url')" target="@field('banner_button_right','target')">@field('banner_button_right','title')</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row xs-hero-img d-sm-none">
        <div class="col-12 p-0">
            <img src="@field('banner_background_mobile', 'url')" alt="@field('banner_background_mobile', 'alt')">
        </div>
    </div>

<?php } else { ?>
    <div class="services-nav">
        <header class="inner_page_ovarlay">
            <div class="container">
                <div class="header-nav">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ home_url('/') }}">
                            <img src="@option('header_logo_black', 'url')" alt="@option('header_logo_black', 'alt')">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <svg class="toggler-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 23">
                                <g fill="#46C3FC" fill-rule="evenodd">
                                    <path d="M3 23h26v-3H0a3 3 0 003 3zM0 0h29v3H0zM0 10h29v3H0z" />
                                </g>
                            </svg>
                        </button>
                        <a class="nav-link btn btn-warning rounded-pill sm-md-show-btn" href="@option('contact_menu_button','url')">@option('contact_menu_button','title')</a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <button class="inner-nav-xs navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                                <img src="<?php echo site_url('/wp-content/uploads/2021/06/close-icon-1.svg'); ?>" alt="">
                            </button>
                            <ul class="navbar-nav ml-auto">
                                <?php if (have_rows('header_menu', 'option')) : ?>
                                    <?php while (have_rows('header_menu', 'option')) : the_row(); ?>
                                        <?php
                                        $link = get_sub_field('main_menu', 'option');
                                        $menu_descriptions = get_sub_field('menu_descriptions', 'option');
                                        $link_text = get_sub_field('link_text');
                                        $link_text_url = $link_text['url'];
                                        $link_text_title = $link_text['title'];
                                        $link_text_target = $link_text['target'] ? $link_text['target'] : '_self';
                                        if (have_rows('sub_menu', 'option')) { ?>
                                            <li class="nav-item dropdown has-megamenu">
                                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><?php echo esc_html($link['title']) ?></a>
                                                <div class="dropdown-menu megamenu fade-down">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-lg-3">
                                                            <div class="mega-left">
                                                                <h4><?php echo esc_html($link['title']) ?></h4>
                                                                <p><?php echo esc_html($menu_descriptions); ?></p>
                                                                <a class="links" href="<?php echo esc_url($link_text_url); ?>" target="<?php echo esc_attr($link_text_target); ?>"><?php echo esc_html($link_text_title); ?></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8 col-lg-9">
                                                            <div class="row">
                                                                <?php $i = 1;
                                                                while (have_rows('sub_menu', 'option')) : the_row(); ?>
                                                                    <div class="col-sm-6 col-lg-3 <?php if ($i == 1 || $i == 2) {
                                                                                                        echo 'sm-md-space';
                                                                                                    } ?>">
                                                                        <div class="mega-col">
                                                                            <h5><?php echo esc_html(get_sub_field('title')); ?></h5>
                                                                            <p><?php echo esc_html(get_sub_field('description')); ?></p>
                                                                            <?php
                                                                            $link = get_sub_field('link_url');
                                                                            if ($link) :
                                                                                $link_url = $link['url'];
                                                                                $link_title = $link['title'];
                                                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                                            ?>
                                                                                <a style="color:<?php echo get_sub_field('link_color'); ?>" class="links nav-blog-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                                                            <?php
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                <?php $i++;
                                                                endwhile; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="dropdown-menu-md-none" aria-labelledby="navbarDropdown">
                                                        <?php while (have_rows('sub_menu', 'option')) : the_row(); ?>
                                                            <?php $link = get_sub_field('link_url'); ?>
                                                            <li><a class="dropdown-item" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html(get_sub_field('title')); ?></a></li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php } else { ?>
                                            <?php
                                            $link = get_sub_field('main_menu');
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                                </li>
                                            <?php
                                            endif;
                                            ?>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <li class="nav-item last-btn">
                                    <a class="nav-link btn btn-warning rounded-pill" href="@option('contact_menu_button','url')">@option('contact_menu_button','title')</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="nav-ovraly"></div>
    </div>
<?php } ?>
<script type="application/javascript">
    jQuery(".nav-item a").each(function() {
        if (this.href == window.location.href) {
            jQuery(this).parent('li').addClass('active');
        }
    });
</script>
