<?php
/*Template Name: Leadership Index*/
?>

<?php get_header(); ?>
			
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1><?php the_title(); ?></h1>
		</div>

		<div class="content-wrap">

			<div class="page-content">

				<p><?php the_content(); ?></p>

				<?php endwhile; else : ?>

				<p><?php _e( 'Sorry, no pages matched your criteria' ); ?></p>
				
				<?php endif; ?>
				
				<div class="leadership">

					<h2>Executive Team</h2>

					<section class="executives col-1-1 border-bottom margin-bottom">

						<?php 

							$args = array(
								'post_type' => 'leadership'
							);
							$query = new WP_Query( $args );

						?>

						<?php if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				


						<div class="exec col-1-4">

							<?php the_post_thumbnail(); ?>

							<div class="title">

								<h4><?php the_field( 'exec_name' ); ?></h4>

								<p><?php the_field( 'exec_title' ); ?></p>

							</div>

							<?php the_excerpt(); ?>
							<a class="link-red" href="<?php the_field( 'link-bio' ); ?>">Read More</a>

						</div>

						<?php endwhile; endif; wp_reset_postdata(); ?>

					</section>
					
					<h2>Management Team</h2>

					<section class="mid-management col-1-1 border-bottom margin-bottom">

						<?php 

							$args = array(
								'post_type' => 'midmanagers'
							);
							$query = new WP_Query( $args );

						?>

						<?php if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				


						<div class="mid-manager col-1-1">

							<?php the_post_thumbnail(); ?>

							<div class="title">

								<h4><?php the_field( 'exec_name' ); ?></h4>

								<p><?php the_field( 'exec_title' ); ?></p>

							</div>

							<p><?php the_excerpt(); ?></p>
							<a class="link-red" href="<?php the_field( 'link_bio' ); ?>">Read More</a>

						</div>

						<?php endwhile; endif; wp_reset_postdata(); ?>

					</section>

					<section class="lower-management col-1-1 margin-bottom">

						<?php 

							$args = array(
								'post_type' => 'lowermanagers'
							);
							$query = new WP_Query( $args );

						?>

						<?php if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				


						<div class="low-manager col-1-2">

							<?php the_post_thumbnail(); ?>

							<div class="title">

								<h4><?php the_field( 'exec_name' ); ?></h4>

								<p><?php the_field( 'exec_title' ); ?></p>

							</div>

							<p><?php the_field( 'exec_bio' ); ?></p>

						</div>

						<?php endwhile; endif; wp_reset_postdata(); ?>

					</section>

				</div>

			</div>

		</div>

		<?php get_sidebar( 'about' ); ?>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>