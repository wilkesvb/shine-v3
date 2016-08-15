<?php
/*Template Name: Employee Portal Home*/
?>

<?php get_header(); ?>
			
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1><?php the_title(); ?></h1>
		</div>

		<div class="content-wrap">

			<div class="page-content">
				
				<?php get_template_part( 'emp-sidebar-left'); ?>

				<?php get_template_part( 'emp-sidebar-right'); ?>

				<div class="emp-center">
					
					<h2>Emergency Contacts</h2>

					<section>

						<?php get_template_part( '/portal/emergency-contacts'); ?>

						<div class="clear"></div>

					</section>

					<?php the_content(); ?>

					<?php endwhile; else : ?>

					<p><?php _e( 'Sorry, no pages matched your criteria' ); ?></p>
					
					<?php endif; ?>

				</div>	

				<div class="hide-mama">
					
				<?php get_template_part( 'emp-sidebar-left'); ?>

				<?php get_template_part( 'emp-sidebar-right'); ?>

				</div>	

			</div>

		</div>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>