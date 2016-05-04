<?php 

	$args = array(
		'post_type' => 'capabilitysummary'
	);
	$query = new WP_Query( $args );

?>

<?php if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


<div class="capes col-1-3">

	<a href="<?php the_permalink(); ?>"><?php the_field( 'capability_thumbnail' ); ?></a>

	<div class="container">

		<h4><?php the_field( 'capability_name' ); ?></h4>

		<p><?php the_field( 'capability_summary'); ?></p>
		
		<div class="capes-button"><a href="<?php the_field( 'capability_link' ) ?>">read more</a></div>
	</div>

</div>

<?php endwhile; endif; wp_reset_postdata(); ?>