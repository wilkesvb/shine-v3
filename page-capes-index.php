<?php
/*Template Name: Capabilities Index*/
?>

<?php get_header(); ?>
			
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1><?php the_title(); ?></h1>
		</div>

		<div class="content-wrap">

			<div class="page-content">

				<?php the_content(); ?>

				<?php endwhile; else : ?>

				<p><?php _e( 'Sorry, no pages matched your criteria' ); ?></p>
				
				<?php endif; ?>
				
				<?php get_template_part ( '/partials/part' , 'capes-summary' ); ?>

			</div>

		</div>

		<?php get_sidebar( 'capes' ); ?>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>