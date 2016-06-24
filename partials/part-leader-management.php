<h2>Management Team</h2>

<section class="mid-management col-1-1 border-bottom margin-bottom">

	<?php 

		$args = array(
			'post_type' => 'management-team'
		);
		$query = new WP_Query( $args );

	?>

	<?php if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>



	<div class="mid-manager col-1-1">

		<?php the_post_thumbnail(); ?>

		<div class="title">

			<h4><?php the_title(); ?></h4>

			<p><?php the_field( 'exec_title' ); ?></p>

		</div>

		<p><?php the_excerpt(); ?></p>
		<a class="link-red" href="<?php the_field( 'link_bio' ); ?>">Read More</a>

	</div>

	<?php endwhile; endif; wp_reset_postdata(); ?>

</section>