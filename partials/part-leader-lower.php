<section class="lower-management col-1-1 margin-bottom">

	<?php 

		$args = array(
			'post_type' => 'lower-management'
		);
		$query = new WP_Query( $args );

	?>

	<?php if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>



	<div class="low-manager col-1-2">

		<?php the_post_thumbnail(); ?>

		<div class="title">

			<h4><?php the_title(); ?></h4>

			<p><?php the_field( 'exec_title' ); ?></p>

		</div>

		<p><?php the_field( 'exec_bio' ); ?></p>

	</div>

	<?php endwhile; endif; wp_reset_postdata(); ?>

</section>