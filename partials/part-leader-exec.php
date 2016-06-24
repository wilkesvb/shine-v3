<h2>Executive Team</h2>

<section class="executives col-1-1 border-bottom margin-bottom">

	<?php 

		$args = array(
			'post_type' => 'exec-team'
		);
		$query = new WP_Query( $args );

	?>

	<?php if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>



	<div class="exec col-1-4">

		<?php the_post_thumbnail(); ?>

		<div class="title">

			<h4><?php the_title(); ?></h4>

			<p><?php the_field( 'exec_title' ); ?></p>

		</div>

		<?php the_excerpt(); ?>
		<a class="link-red" href="<?php the_field( 'link-bio' ); ?>">Read More</a>

	</div>

	<?php endwhile; endif; wp_reset_postdata(); ?>

</section>