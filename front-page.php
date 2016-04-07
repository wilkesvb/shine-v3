<?php
/*Template Name: Front Page*/
?>

<?php get_header(); ?>
        
        <section class="slider">

            <?php putRevSlider("slider1", "homepage"); ?>

        </section>
        <section class="border-bottom inner-wrap margin-bottom">
            <article class="fp">
                <div class="fp-label caps">news</div>
                <div class="fp-container inline-block scroll border-left" id="demo1">

                <?php $the_query = new WP_Query( 'cat=2', 'showposts=5' ) ?>
            
                    <ul id="scroll">

                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    
                        <li>
                            <time class="fp-time medgray"><?php the_time('M y'); ?></time>
                            <span class="fp-news link-red"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                        </li>

                <?php endwhile; ?>

                    </ul>   
                </div>
                <div class="slider-nav inline-block  border-left">
            </article>
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
            <div id="demo5">
               
                <ul>
                    <li><a href="/about-shine/customers-partners#partners"><div class="partners-atsolutions"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/atsolutions.png"/></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-sms"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-leidos"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-saic"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-acet"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-gdit"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-signs"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-mantech"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-smart"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-arch"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-integral"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-battelle"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-serco"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-intrepid"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-bah"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-caci"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-calnet"></div></a></li>
                     <li><a href="/about-shine/customers-partners#partners"><div class="partners-sotera"></div></a></li>
                </ul>
                
            </div>
        </section>

<?php get_footer(); ?>