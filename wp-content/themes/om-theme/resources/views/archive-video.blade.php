@extends('layouts.app')
@section('content')

<!--BLOCK: Start Resource Menu -->
@include('blocks.resource-menu')
<!--/BLOCK: END Resource Menu -->

@query([
'post_type' => 'video',
'post_status' => 'publish',
'p' => get_field('featured_video','option'),
'posts_per_page' => 1,
])

@posts

<?php
$postid = get_field( 'featured_video', 'option' );
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

<section class="resources-second-wrap blog-banner-wrap all-video-main-wrap">
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
                    <a href="@permalink">
                        <h1>@title</h1>
                    </a>
                    <p>@content</p>
                    <div class="sm-profile">
                        <div class="sm-profile-img">
                            <img src="<?php the_field('user_image', 'user_' . get_the_author_meta('ID')); ?>" alt="">
                        </div>
                        <div class="sm-profile-name">By @author</div>
                    </div>
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
'post_type' => 'video',
'post_status' => 'publish',
'posts_per_page' => 6,
'paged'=>1
])

<?php
$count_posts = wp_count_posts('video');
$publish_video_post = $count_posts->publish;
?>

<section class="section blogs-template-cards all-videos-thumb">
    <div class="container">
        <div class="row" id="videosdata">
            <input type="hidden" id="maxpages" value="<?php echo $publish_video_post; ?>">
            @posts

            <?php
            $newpostid = get_the_ID();
            //second false skip ACF pre-processcing
            $url = get_field('video_url', $newpostid, false, false);
            //get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
            $oembed = _wp_oembed_get_object();
            //get provider
            $provider = $oembed->get_provider($url);
            //fetch oembed data as an object
            $oembed_data = $oembed->fetch($provider, $url);
            $thumbnail = get_the_post_thumbnail_url( null, 'medium' );
            if ( empty( $thumbnail ) ) {
                        $thumbnail = $oembed_data->thumbnail_url;
            }
            $iframe = $oembed_data->html;
            ?>
            <div class="col-md-4 blog-space">
                <div class="card blog-card-wrap">
                    <a href="echo esc_url(@permalink)">
                        <img src="<?php echo esc_url($thumbnail); ?>" class="card-img-top" alt="@title" />
                    </a>
                    <div class="card-body">
                        <span class="sm-profile">
                            <div class="sm-profile-img">
                                <img src="<?php echo esc_url(get_field('user_image', 'user_' . get_the_author_meta('ID'))); ?>" alt="@author">
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
        <?php if ($publish_video_post > 6) { ?>
            <div class="text-center">
                <button type="button" id="loadmorevideo" data-pagedid="1" class="btn btn-red rounded-pill">Load More</button>
            </div>
        <?php } ?>
    </div>
</section>
@endsection

<script type="application/javascript">
    var ppp = 6; // Post per page
    var pageNumber = 1;
    jQuery(document).ready(function() {
        var maxpages = jQuery('#maxpages').val();
        var finalvalue = Math.round(maxpages / 6);
        console.log(finalvalue);
        jQuery("#loadmorevideo").click(function(e) {
            e.preventDefault();
            var paged_id = jQuery(this).data("pagedid");
            console.log(paged_id);
            jQuery.ajax({
                type: "post",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "load_more_data_videos",
                    paged_id: pageNumber
                },
                success: function(response) {
                    if (response != "") {
                        //location.reload();
                        console.log(response);
                        if (finalvalue == pageNumber) {
                            jQuery("#loadmorevideo").css("display", "none");
                        }
                        pageNumber++;
                        jQuery("#videosdata").append(response);
                        jQuery("#loadmorevideo").attr('data-pagedid', pageNumber);
                    } else {
                        alert(response);
                        console.log(response);
                        //alert('something went wrong');
                        jQuery("#loadmorevideo").css('display:none');
                    }
                }
            });
        });
    });
</script>
