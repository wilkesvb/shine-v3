<?php
/*Template Name: Job Postings Page*/
?>


<?php get_header(); ?>
			
	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1>Job Postings</h1>
		</div>

		<div class="content-wrap">

			<div class="page-content">
					
				<?php $query = new WP_Query( 'cat=13'); ?>

				<?php if ( $query->have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
				<div class="blog-home blog border-bottom">

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<span><?php the_date(); ?></span>

					<p><?php the_excerpt(); ?></p>

				</div>

				<?php endwhile; ?>

				<div class="pagination">
					<div class="nav-previous alignleft"><?php next_posts_link( 'Previous' ); ?></div>
					<div class="nav-next alignright"><?php previous_posts_link( 'Next' ); ?></div>
				</div>

				<?php else : ?>

				<p><?php _e( 'Sorry, no pages matched your criteria' ); ?></p>
				
				<?php endif; ?>

			</div>

		</div>

		<?php get_sidebar( 'careers' ); ?>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>