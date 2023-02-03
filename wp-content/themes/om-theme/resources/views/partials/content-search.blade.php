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