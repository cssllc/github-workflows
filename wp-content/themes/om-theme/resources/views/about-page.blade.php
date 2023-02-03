{{--
Template Name: About Page Template
--}}

@extends('layouts.app')
@section('content')
@while(have_posts()) @php(the_post())

<!--BLOCK: Start Hero With Right Image -->
@include('blocks.hero-with-right-image')
<!--/BLOCK: END Heor with Right Image -->

<!--BLOCK: Start About Growth Process -->
@include('blocks.about-growth-process')
<!--/BLOCK: END About Growth Proces -->

<!--BLOCK: Start Meet The Team -->
@include('blocks.about-meet-the-team')
<!--/BLOCK: END Meet The Team  -->

<!--BLOCK: Start About Career Section -->
@include('blocks.about-career-section')
<!--/BLOCK: END About Career Section  -->

<!--BLOCK: Start About Join Team Section -->
@include('blocks.about-join-team-section')
<!--/BLOCK: END About Join Team Section  -->

@endwhile
@endsection
<script type="application/javascript">
  jQuery(document).ready(function() {
    jQuery(".userlist").click(function(e) {
      e.preventDefault();
      user_id = jQuery(this).attr("data-userid");
      console.log(user_id);
      jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: {
          action: "user_profile_data",
          user_id: user_id
        },
        success: function(response) {
          if (response.type == "success") {
            //location.reload();
            console.log(response);
            jQuery("#display_name").text(response.display_name);
            jQuery("#description").text(response.description);
            jQuery('#user_image').attr('src', response.user_image);
            jQuery("#user_position").text(response.user_position);
            jQuery('#user_linkedin').attr('href', response.user_linkedin);
          } else {
            console.log(response);
            alert('something went wrong');
          }
        }
      });
    });
  });
</script>
