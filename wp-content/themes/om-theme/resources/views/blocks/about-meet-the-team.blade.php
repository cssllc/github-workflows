<section class="case-studies-wrap meet-the-team-wrap d-none d-md-flex">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="main-title-team sm-title-bg">
            <h2>@field('main_heading_team_section')</h2>
        </div>
        <div class="case-studies-inner">
          <div class="sm-title-bg">
            <h2>@field('team_title')</h2>
          </div>
          <p>@field('team_description')</p>
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="list-main-wrap">
                <?php
                $users = get_field("left_column_team_member");
                if ($users) : ?>
                <ul class="list-unstyled list-star-link">
                  <?php foreach ($users as $user) : ?>
                  <li>
                    <a href="#" class="userlist" id="userlist" data-userid="<?php echo $user['ID']; ?>">
                      <?php echo $user['display_name']; ?></a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <div class="list-main-wrap">
                <?php
                $users = get_field("right_column_team_member");
                if ($users) : ?>
                <ul class="list-unstyled list-star-link">
                  <?php foreach ($users as $user) : ?>
                  <li>
                    <a href="#" class="userlist" id="userlist" data-userid="<?php echo $user['ID']; ?>">
                      <?php echo $user['display_name']; ?></a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 position-none-custom ml-auto meet-the-team-profile-wrap">
        <div class="case-studies-right"></div>
        <div class="profile-ceo-wrap">
          <?php $userdata = get_user_meta(4); ?>
          <img id="user_image" src="<?php the_field('user_image', 'user_4'); ?>" alt="">
        </div>
        <div class="shelbe-marketer-wrap">
          <div id="display_name" class="shelbe-text"><?php echo $userdata['first_name'][0] ." ". $userdata['last_name'][0]; ?></div>
          <p id="user_position"><?php the_field('user_position', 'user_4'); ?></p>
        </div>
        <p id="description"><?php echo $userdata['description'][0]; ?></p>
        <a id="user_linkedin" href="<?php the_field('linkedin_url', 'user_4'); ?>"><img
            src="<?php echo site_url('/wp-content/uploads/2021/05/linkedin-icon.svg'); ?>" alt="">
        </a>
      </div>
    </div>
  </div>
</section>

<section class="team-profile-slider case-studies-wrap meet-the-team-wrap d-md-none">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-title-team sm-title-bg">
            <h2>@field('main_heading_team_section')</h2>
        </div>
        <div class="case-studies-inner">
          <div class="sm-title-bg">
            <h2>@field('team_title')</h2>
          </div>
          <p>@field('team_description')</p>
        </div>
      </div>
    </div>

    <div class="row mainteamslide">
      <?php $users = get_field("left_column_team_member");
      if ($users) : ?>
      <?php foreach ($users as $user) : ?>
      <div class="col-md-12 position-none-custom ml-auto meet-the-team-profile-wrap">
        <div class="case-studies-right"></div>
        <div class="profile-ceo-wrap">
          <?php $user_id = $user['ID']; ?>
          <img src="<?php the_field('user_image', 'user_' . $user_id . ''); ?>" alt="">
        </div>
        <div class="shelbe-marketer-wrap">
          <div class="shelbe-text"><?php echo $user['display_name']; ?></div>
          <p><?php the_field('user_position', 'user_' . $user_id . ''); ?></p>
        </div>
        <p><?php echo get_the_author_meta('description', $user_id);?></p>
        <a href="<?php the_field('linkedin_url', 'user_' . $user_id . ''); ?>"><img
            src="<?php echo site_url('/wp-content/uploads/2021/05/linkedin-icon.svg'); ?>" alt="">
        </a>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
      <?php $users = get_field("right_column_team_member");
      if ($users) : ?>
      <?php foreach ($users as $user) : ?>
      <div class="col-md-12 position-none-custom ml-auto meet-the-team-profile-wrap">
        <div class="case-studies-right"></div>
        <div class="profile-ceo-wrap">
          <?php $user_id = $user['ID']; ?>
          <img src="<?php the_field('user_image', 'user_' . $user_id . ''); ?>" alt="">
        </div>
        <div class="shelbe-marketer-wrap">
          <div class="shelbe-text"><?php echo $user['display_name']; ?></div>
          <p><?php the_field('user_position', 'user_' . $user_id . ''); ?></p>
        </div>
        <p><?php echo get_the_author_meta('description', $user_id);?></p>
        <a href="<?php the_field('linkedin_url', 'user_' . $user_id . ''); ?>"><img
            src="<?php echo site_url('/wp-content/uploads/2021/05/linkedin-icon.svg'); ?>" alt="">
        </a>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
