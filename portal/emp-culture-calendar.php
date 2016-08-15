<section>

	<h4>Culture Calendar</h4>

	<div class="culture-calendar">

		<?php 

			$args = array(
				'post_type' => 'emp-culture-calendar'
			);
			$query = new WP_Query( $args );

		?>

		<?php if ( is_user_logged_in() ) : if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		
		<a href="<?php the_field( 'calendar-attachment' ); ?>" target="blank"><?php the_post_thumbnail('medium'); ?></a>

		</br></br>

		<a href="<?php the_field( 'calendar-attachment' ); ?>" target="blank">Click Here to View &gt;</a>

		<?php endwhile; endif; endif; wp_reset_postdata(); ?>

	</div>

</section>