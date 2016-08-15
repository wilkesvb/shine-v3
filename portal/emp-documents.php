<section>
	<h4>Important Documents</h4>
	<ul>

		<?php 

			$args = array(
				'post_type' => 'emp-docs'
			);
			$query = new WP_Query( $args );

		?>

		<?php if( is_user_logged_in() ) : if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		
		<li><a href="<?php the_field( 'document_link' ) ?>" target="_blank"><?php the_title(); ?></a></li>

		<?php endwhile; endif; endif; wp_reset_postdata(); ?>

	</ul>
</section>