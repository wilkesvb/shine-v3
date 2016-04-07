        <footer class="inner-wrap">
            <nav class="footer-1 col-1-4">
                <?php dynamic_sidebar( 'footer 1' ); ?>     
            </nav>
            <nav class="footer-2 col-1-4">
                <?php dynamic_sidebar( 'footer 2' ); ?>     
            </nav>
            <nav class="footer-3 col-1-4">
                <?php dynamic_sidebar( 'footer 3' ); ?>                
            </nav>
            <div class="footer-4 col-1-4">
                <?php dynamic_sidebar( 'footer 4' ); ?> 
            </div>      
            <div class="social">
                <h4 class="caps">connect</h4>
                <ul>
                    <li title="Code: 0xe802" class="the-icons span3">
                        <a href="https://www.facebook.com/shinesystech"><i class="icon-facebook"></i></a>
                    </li>
                    <li title="Code: 0xe800" class="the-icons span3">
                        <a href="https://twitter.com/shinesystech"><i class="icon-twitter"></i></a>
                    </li>
                    <li title="Code: 0xe801" class="the-icons span3">
                        <a href="https://www.linkedin.com/company/shine-systems-&-technologies"><i class="icon-linkedin"></i></a>
                    </li>
                    <li title="Code: 0xe803" class="the-icons span3">
                        <a href="<?php bloginfo('rss2_url'); ?>"><i class="icon-rss"></i> </a>
                    </li>
                </ul>            
            </div>
            <p class="copyright">Copyright <?php echo date('Y'); ?> SHINE Systems & Technologies</p>    
        </footer>

    <?php wp_footer(); ?>
    
    </div>

    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-41157947-1');ga('send','pageview');
    </script>

    
    </body>
</html>
