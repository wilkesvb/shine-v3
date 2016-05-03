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