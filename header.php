
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Web Designer Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700' rel='stylesheet' type='text/css'>

        <?php wp_head(); ?>
    </head>

    <body>
    	<div class="loader">
    		<div class="spinner">
			  <div class="double-bounce1"></div>
			  <div class="double-bounce2"></div>
			</div>
    	</div>
				
		<div class="nav-container">
			<nav class="simple-bar top-bar">
				<div class="container">
				
				
					<div class="row nav-menu">
						<div class="col-md-3 col-sm-3 columns">
							<a href="index.html">
							<img class="logo logo-dark" alt="Logo" src="<?php header_image(); ?>">
						</div>
					
						<div class="col-md-9 col-sm-9 columns text-right">
							<!-- <ul class="menu">
								<a></a>
								<li><a href="/" target="_self">Home</a></li>
								<li><a href="about.html" target="_self">About me</a></li>
								<li><a href="portfolio.html" target="_self">portfolio</a></li>
								<li><a href="/blog" target="_self">Blog</a></li>
								<li><a href="contact.html" target="_self">Contact</a></li>
							</ul> -->
							<a></a> <!-- hack by the developer so all the links line up, first link shifts down 2 cm when this is not here-->
							<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
							
						</div>
					</div>
					
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
					
				</div>
			</nav>
		
		</div>