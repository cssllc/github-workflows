{{--
  Template Name: Blogs Template
--}}

@extends('layouts.app')
@section('content')

<!--BLOCK: Start Resource Menu -->
@include('blocks.resource-menu')
<!--/BLOCK: END Resource Menu -->

@query([
'post_type' => 'post',
'post_status' => 'publish',
'p' => get_field('featured_blog'),
])

@posts
<section class="blog-banner-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5 position-none-custom">
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
                    <a href="@permalink">
                        <h1>@title</h1>
                    </a>
                    <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?><a href="@permalink">Read More</a></p>
                    <span class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" alt="" />
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </span>
                </div>
            </div>
            <div class="col-md-7">
                <div class="blog-banner-img">
                    <img src="@thumbnail('full', false)" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
@endposts

@query([
'post_type' => 'post',
'post_status' => 'publish',
'posts_per_page' => 6,
'paged'=>1
])

<?php
$count_posts = wp_count_posts();
$publish_post = $count_posts->publish;
?>
<section class="section blogs-template-cards">
    <div class="container">
        <div class="row" id="blogdata">
            <input type="hidden" id="maxpages" value="<?php echo $publish_post; ?>">
            @posts
            <div class="col-md-4 blog-space">
                <div class="card blog-card-wrap">
                    <a href="@permalink"> <img src="@thumbnail('full', false)" class="card-img-top" alt="..." /></a>
                    <div class="card-body">
                        <?php $user_profile_image = get_field('user_image', 'user_' . get_the_author_meta('ID'));
                        $user_image = $user_profile_image; ?>
                        <span class="sm-profile">
                            <div class="sm-profile-img">
                                <img src="<?php echo $user_image; ?>" alt="@author" />
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
        <div class="text-center">
            <button type="button" id="loadmore" data-pagedid="1" class="btn btn-primary rounded-pill">Load More</button>
        </div>
    </div>
</section>
@endsection

<script type="application/javascript">
    var ppp = 6; // Post per page
    var pageNumber = 1;
    jQuery(document).ready(function() {
        var maxpages = jQuery('#maxpages').val();
        var finalvalue = Math.round(maxpages / 6);
        jQuery("#loadmore").click(function(e) {
            e.preventDefault();
            var paged_id = jQuery(this).data("pagedid");
            console.log(paged_id);
            jQuery.ajax({
                type: "post",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "load_more_data",
                    paged_id: pageNumber
                },
                success: function(response) {
                    if (response != "") {
                        //location.reload();
                        console.log(response);
                        pageNumber++;
                        jQuery("#blogdata").append(response);
                        jQuery("#loadmore").attr('data-pagedid', pageNumber);
                        if (finalvalue == pageNumber) {
                            jQuery("#loadmore").css("display", "none");
                        }
                    } else {
                        console.log(response);
                        //alert('something went wrong');
                        jQuery("#loadmore").css('display:none');
                    }
                }
            });
        });
    });
</script>
