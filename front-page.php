<?php
/*Template Name: Front Page*/
?>

<?php get_header(); ?>
        
        <section class="slider"> <!-- home page slider -->

            <?php putRevSlider("slider1", "homepage"); ?>

        </section>

        <section class="border-bottom inner-wrap margin-bottom"> <!-- featured news scroll -->
            
            <?php get_template_part( '/partials/part', 'news-scroll' ); ?>

        </section>

        <section class="feature outter-wrap margin-bottom"> 

            <div class="feature-summary col-8-12 link-red"> <!-- featured summary content -->

                <?php dynamic_sidebar( 'feature-summary' ); ?>
               
            </div>

            <div class="feature-video fitVid container col-4-12"> <!-- featured video -->

                <?php dynamic_sidebar( 'feature video' ); ?>

            </div>

        </section>

        <section class="partners outter-wrap margin-bottom"> <!-- Patners sections -->
            
            <?php get_template_part( '/partials/part', 'partner-scroll' ); ?>                

        </section>

<?php get_footer(); ?>