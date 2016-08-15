<?php 

	$args = array(
		'post_type' => 'emergency_contact'
	);
	$query = new WP_Query( $args );

?>

<?php if( is_user_logged_in() ) : if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

<div class="contact">

	<h4><?php the_title(); ?></h4>

	<p><?php 

			if(get_field( 'contact_name' )) 
			{ 
				echo 'Contact: ' . get_field( 'contact_name' ) . '</br>'; 
			} 

		?>

		Phone: <a href="tel://<?php the_field( 'area_code' ); ?><?php the_field( 'phone_first3' ); ?><?php the_field( 'phone_last4' ); ?>">(<?php the_field( 'area_code' ); ?>) <?php the_field( 'phone_first3' ); ?>-<?php the_field( 'phone_last4' ); ?></a>

		<?php

			if(get_field('extension_number'))
			{
				echo get_field('extension_number');
			}

		?>
		
		</br>

		<?php

			if(get_field('website'))
			{
				echo 'Website: <a href="http://' . get_field('website') . '" target="_blank">' . get_field('website') . '</a></br>';
			}

		?>


		<?php 
			
			if(get_field('email'))
			{
				echo 'Email: <a href="mailto:' . get_field( 'email' ) . '">' . get_field( 'email' ) . '</a></br>';
			}

		?>
		
		<?php

			if(get_field('address'))
			{
				echo 'Address: ' . get_field('address');
			}

		?>
	</p>

</div>

<?php endwhile; endif; endif; wp_reset_postdata(); ?>