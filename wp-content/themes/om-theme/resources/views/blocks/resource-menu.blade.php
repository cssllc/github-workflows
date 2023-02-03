<section class="blog-nav-wrap">
	<div class="container">
		<div class="row">
			<div class="col-12 nav-shadow">
				<ul class="list-unstyled d-flex flex-wrap">
					<li>Resources:</li>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'resource_menu',
						'container' => '',
						'items_wrap' => '%3$s'
					));
					?>
				</ul>
				<form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>">
					<div class="input-group mb-3 serach-bar-blog-wrap">
						<input type="text" name="s" class="search-field form-control serach-bar-blog" placeholder="Search" />
						<div class="input-group-append">
							<button class="btn btn-warning rounded-pill btn-orange" type="submit" id="button-addon2"><img src="<?php echo site_url('/wp-content/uploads/2021/06/search-bar-icon.svg'); ?>" /></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
