<section>

	<h4>APP Downloads</h4>

	<?php 

		$args = array(
			'post_type' => 'emp-apps'
		);
		 $query = new WP_Query( $args );
	?>

	<?php if( is_user_logged_in() ) : if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

	<div>

	<?php 

	$image = get_field('app_logo');

	if( !empty($image) ): ?>

		<div class="col-1-2"><img class="app-logo" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>

	<?php endif; ?>

		<div class="col-1-2"><h5><?php the_title(); ?></h5></div>

		<div class="clear"></div>

		<a href="<?php the_field( 'app_store_link' ) ?>" target="_blank" ><img class="store-button" src="/wp-content/uploads/2016/04/App_Store_icon-1-copy.png" alt="Available on the App Store" /></a>

		<a href="<?php the_field( 'google_play_link' ) ?>" target="_blank" ><img class="store-button" src="/wp-content/uploads/2016/04/google-store-badge.png" alt="Available on Google Play" /></a>

		<div class="clear"></div>

	</div>

	<?php endwhile; endif; endif; wp_reset_postdata(); ?>


<div class="col-1-2">
		
	<a href="/wp-content/uploads/2016/06/Add_SHINE_to_iPhone_Home_Screen.pdf" target="_blank" ><img class="app-logo" src="/wp-content/uploads/2016/06/apple-touch-icon.png" alt="apple touch icon" /></a>

</div>

		<div class="col-1-2"><h5>iPhone Touch Icon</h5></div>

		<a href="/wp-content/uploads/2016/06/Add_SHINE_to_iPhone_Home_Screen.pdf" target="_blank" >Click for Instructions ></a>

</section>		