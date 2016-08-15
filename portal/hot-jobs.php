<section>
	<h4>HOT Jobs</h4>
	<ul>

	<?php 

		$args = array(
			'post_type' => 'featured_job'
		);
		$query = new WP_Query( $args );

	?>

	<?php if( is_user_logged_in() ) : if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

		<li>
			<a href="<?php the_field( 'job_link' ); ?>" target="_blank"><?php the_title(); ?>&nbsp;<br>- <?php the_field( 'job_location' ) ?></a>
		</li>
	
	<?php endwhile; endif; endif; wp_reset_postdata(); ?>

	</ul>

	<a href="http://ejob.bz/ATS/CompanyPortal.do?refresh=true&companyGK=19638&portalGK=2891" target="_blank">More Listings &gt;</a>

</section>