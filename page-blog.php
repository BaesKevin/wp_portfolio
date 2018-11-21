<?php get_header(); ?>
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
							<img class="logo logo-dark" alt="Logo" src="img/logotype_dark.png">
						</div>
					
						<div class="col-md-9 col-sm-9 columns text-right">
							<ul class="menu">
								<a></a><li><a href="index.html" target="_self">Home</a></li><li><a href="about.html" target="_self">About me</a></li><li><a href="portfolio.html" target="_self">portfolio</a></li><li><a href="blog.html" target="_self">Blog</a></li><li><a href="contact.html" target="_self">Contact</a></li>
								
								
								
								
							</ul>
		
							
						</div>
					</div>
					
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
					
				</div>
			</nav>
		</div>
		
		<div class="main-container">
		<section class="duplicatable-content">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1>Page-blog page</h1>
						</div>
					</div>
					
					<div class="row">
                        
                        
						<?php 
						$args = array(
							'post_type'         => 'post',
							'posts_per_page'    => 10
						);
						$the_query = new WP_Query( $args );

						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="blog-snippet-1">
                                    <a href="blog_post.html" target="_self">
                                        <img alt="Blog Thumb" src="img/blog_thumb_1.jpg">
                                    </a>
                                    <h2><?php the_title(); ?></h2>
                                    <span class="sub alt-font">Published: <?php the_time('F jS, Y'); ?></span>
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
									<!-- <a href="blog_post.html" class="link-text" target="_self">READ MORE</a> -->
									<a href="<?php the_permalink(); ?>" class="link-text" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>
                                </div>
                            </div>
                        <?php endwhile; else : ?>
                            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; ?>


                        
					</div>	
				</div>
			</section>
		</div>
		
		<div class="footer-container">
		
			
		
			
		
			<footer class="bg-primary short-2">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<span class="text-white">© 2014 John Smith - All Rights Reserved. Free Website Template Designed by <a href=http://www.themezy.com>Themezy</a>.</span>
							<br>
							<br>
							<i class="icon text-white icon_mail"></i>
							<a href="contact.html" class="text-white"><span class="text-white"> Get in touch with me <i class="icon arrow_right"></i></span></a>
						</div>
					</div>
				</div>
				
			</footer>
		</div>
				
		<?php get_footer(); ?>