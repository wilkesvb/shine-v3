<?php get_header(); ?>
			
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1>News</h1>
		</div>

		<div class="content-wrap">

			<?php the_post_thumbnail();?> 

			<div class="page-content">

				<h1><?php the_title(); ?></h1>

				<p><?php the_content(); ?></p>

				<?php endwhile; ?>

				<div class="pagination">
					<div class="nav-previous alignleft"><?php previous_post_link( '%link', 'Previous', TRUE ); ?></div>
					<div class="nav-next alignright"><?php next_post_link( '%link', 'Next', TRUE); ?></div>
				</div>

				<?php else : ?>

				<p><?php _e( 'Sorry, no pages matched your criteria' ); ?></p>
				
				<?php endif; ?>

			</div>

		</div>

		<?php get_sidebar( 'blog' ); ?>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>