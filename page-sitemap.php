<?php 
/*
Template Name: Sitemap Page
*/
?>

<?php get_header(); ?>
			
	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1>Sitemap</h1>
		</div>

		<div class="content-wrap">

			<div class="page-content">

				<?php get_template_part('/partials/sitemap'); ?>

			</div>

		</div>

		<?php get_sidebar( 'about' ); ?>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>