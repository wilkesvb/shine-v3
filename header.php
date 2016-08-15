<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SHINE Systems & Technologies</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Front Page CSS move to functions.php? -->
    <?php wp_head(); ?>
    <?php if( !is_page_template( 'front-page.php' ) ) :?>
         <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stylesheets/page.css" media="screen" type="text/css" />
    <?php endif;?>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico" type="image/x-icon" />
    <meta property="og:image" content="/wp-content/uploads/2015/01/SHINE_LOGO_RGB420x209.jpg" />

    <!-- Lead Forensics Tracking Script -->
    <script type="text/javascript" src="https://secure.leadforensics.com/js/77076.js" ></script>
    <noscript><img src="https://secure.leadforensics.com/77076.png" style="display:none;" /></noscript>

</head>
<body <?php body_class(); ?> >
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<?php employee_bar(); ?>

<div class="wrap">
    <header class="inner-wrap">
        <div class="logo">
            <h1>
                <a href="/">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/SHINE_LOGO_RGB420x209.jpg" alt="SHINE logo">
                </a>
            </h1>
        </div>
        <div class="float-right">
            <div class="awards">
                <a href="/shine-makes-inc-5000-fastest-growing-company-list-second-year-in-a-row/"><img class="award-inc" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/inc2014.png"></a>
                <a href="/shine-named-washington-technology-fast-50/"><img class="award-fast50" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ShineFast50-retina.jpg"></a>
            </div>
            <div class="clear">
            </div>
            <nav class="primary caps">  
                          
                <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>

            </nav>
        </div>
    </header>