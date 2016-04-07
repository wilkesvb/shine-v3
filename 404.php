<?php
/*Template Name: Singe Page*/
?>

<?php get_header(); ?>
			
	<div class="inner-wrap border-bottom margin-bottom">

		<div class="page-title">
			<h1>404 Not Found</h1>
		</div>

		<div class="content-wrap">

			<div class="page-content">

				<h2>Sorry, but the page you were trying to view does not exist.</h2>
                <p>It looks like this was the result of either:</p>
                <ul>
                    <li>a mistyped address</li>
                    <li>an out-of-date link</li>
                </ul>
                <script>
                    var GOOG_FIXURL_LANG = (navigator.language || '').slice(0,2),GOOG_FIXURL_SITE = location.host;
                </script>
                <script src="//linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>

			</div>

		</div>

		<?php get_sidebar( 'about' ); ?>

		<div class="clear"></div>

	</div>

<?php get_footer(); ?>