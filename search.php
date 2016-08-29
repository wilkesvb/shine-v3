<?php get_header(); ?>
			

	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1>Search Results for: <?php the_search_query(); ?></h1>
		</div>

		<div class="content-wrap">

			<div class="page-content">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
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

				<h3><?php _e( 'Sorry, no pages matched your criteria.' ); ?></h3>

				<label class="screen-reader-text" for="s">Search again:</label><br/>

				<?php get_search_form(); ?>

				<hr/>
				
				<h2>Can't find what you're looking for? Take a look at:</h2>

				<h3>Our Capabilities</h3>

				<?php get_template_part ( '/partials/part' , 'capes-summary' ); ?>

				<div class="clear"></div>	

				<hr>

				<h3 style="clear: left;">Careers at SHINE</h3>
				
				<?php query_posts('cat=13&posts_per_page=5'); while (have_posts()) : the_post(); ?> 

				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3

				<?php the_excerpt(); ?>

				<?php endwhile; ?>

				<a href="/category/job-postings/">See All Job Postings &gt;</a>
				
				<?php endif; ?>
	
				

			</div>

		</div>

		<?php get_sidebar( 'blog' ); ?>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>