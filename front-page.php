
<?php get_header(); ?>
    
		
		<div class="main-container">
			<header class="header-icons overlay">
					<div class="background-image-holder parallax-background">
						<img class="background-image" alt="Background Image" src="<?php echo get_template_directory_uri()?>/img/header_image.jpg">
					</div>
					
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1 class="text-white">
									Hello, I'm John Smith.<br>I can create&nbsp;<span>beautiful design</span>&nbsp;for you.</h1>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<i class="icon icon-desktop text-white"></i>
								<h2 class="text-white">Web Design</h2>
							</div>
							
							<div class="col-sm-4">
								<i class="icon text-white icon-phone"></i>
								<h2 class="text-white">Mobile Design</h2>
							</div>
							
							<div class="col-sm-4">
								<i class="icon text-white icon-strategy"></i>
								<h2 class="text-white">Marketing strategy</h2>
							</div>
						</div>
		
					</div>	
			</header>
			
			<section class="skill-bars">
		
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
							<h1>My skills</h1>
							<p class="lead">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae. 
							</p>	
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="skills-left skills">
								<h3>Design</h3>
								<ul class="skills-ul">
									<li>
										<span>Web Design</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-11"></div>
										</div>
									</li>
									
									<li>
										<span>Mobile design</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-9"></div>
										</div>
									</li>
									
									<li>
										<span>Branding &amp; Identity</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-7"></div>
										</div>
									</li>
									
									<li>
										<span>DTP</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-6"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-12">
							<div class="skills-right skills">
								<h3>Developing</h3>
								<ul class="skills-ul">
									<li>
										<span>HTML &amp; CSS3</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-11"></div>
										</div>
									</li>
									
									<li>
										<span>Javascript / Jquery</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-9"></div>
										</div>
									</li>
									
									<li>
										<span>PHP &amp; MySQL</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-7"></div>
										</div>
									</li>
									
									<li>
										<span>WordPress</span>
										<div class="skill-bar-holder">
											<div class="skill-capacity col-xs-6"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
		
				</div>
			</section>
			
			<section class="no-pad-bottom projects-gallery">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
							<h1>Check out my latest projects</h1>
							<p class="lead">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. 
							</p>
						</div>
					</div>
					
				</div>
				
				<div class="projects-wrapper clearfix">
					
					
					<div class="projects-container">
					
						<?php
						$args = array(
							'post_type' => 'portfolio_item',
							'posts_per_page' => 10
						);
						$the_query = new WP_Query($args);

						if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<?php
							global $post;
							$portitem_custom_fields = get_post_custom($post->ID);
							?>

							<div class="col-md-6 col-sm-12 no-pad project development image-holder">
								<div class="background-image-holder">
									<img class="background-image" alt="<?php the_title(); ?>" src="<?php echo get_field("portfolio_item_thumbnail")["url"]; ?>">
								</div>
								<div class="hover-state">
									<div class="align-vertical">
										<h1 class="text-white"><strong><?php the_title(); ?></strong></h1>
										<a href="<?php echo $portitem_custom_fields["portfolio_item_url"][0]; ?>" class="btn btn-primary btn-white">See Project</a>
									</div>
								</div>
							</div>
						<?php endwhile; else : ?>
							<p><?php esc_html_e('You didn\'t add any projects yet. You can start adding projects in the wordpress admin console.'); ?></p>
						<?php endif; ?>
					
					</div>
					
				</div>
				
			</section>
			
			<section class="timeline-1">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
							<h1>Here is a little of my story</h1>
							<p class="lead">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae. 
							</p>	
						</div>
					</div>
					

					<div class="row">
						<div class="col-sm-12">
							<?php
								$args = array( 'post_type' => 'jobexperience' );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
									global $post;
									$custom = get_post_custom($post->ID);
									?>
										<div class="timeline-event">
											<div class="col-sm-6 col-md-push-6">
												<h2><?php the_title() ?></h2>
												<h5><?php echo $custom['job_time'][0] ?><br></h5>
											</div>
											
											<div class="middle">
												<i class="icon icon-map"></i> <!-- figure a CMS'y way to put the icon in here -->
												<div class="vertical-line"></div>
											</div>
											
											<div class="col-sm-6 col-md-pull-6">
												<p><?php echo $custom['job_description'][0] ?>  &nbsp;</p>
											</div>
										</div>
									<?php
								endwhile;
							?>
							<!-- <div class="timeline-event">
								<div class="col-sm-6 col-md-push-6">
									<h2>2005-2009</h2>
									<h5>Junior Designer at Black Rock Interactive Agency<br></h5>
								</div>
								
								<div class="middle">
									<i class="icon icon-map"></i>
									<div class="vertical-line"></div>
								</div>
								
								<div class="col-sm-6 col-md-pull-6">
									<p>
										Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.&nbsp;</p>
								</div>
								
								
							</div>
							
							<div class="timeline-event">
								<div class="col-sm-6">
									<h2>2009-2010</h2>
									<h5>Design Team Leader at Creativo INC.</h5>	
								</div>
								
								<div class="middle">
									<i class="icon icon-video"></i>
									<div class="vertical-line"></div>
								</div>
								
								<div class="col-sm-6">
									<p>
										Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
									
								</div>
							</div>
							
							<div class="timeline-event">
								<div class="col-sm-6 col-md-push-6">
									<h2>2010-2015</h2>
									<h5>Junior Creative Director at One Shot Agency</h5>
								</div>
								
								<div class="middle">
									<i class="icon icon-trophy"></i>
									<div class="vertical-line"></div>
								</div>
								
								<div class="col-sm-6 col-md-pull-6">
									<p>
										Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
								</div>
								
								
							</div>
							
							<div class="timeline-event">
								<div class="col-sm-6">
									<h2>2015</h2>
									<h5>Freelance</h5>	
								</div>
								
								<div class="middle">
									<i class="icon icon-target"></i>
									<div class="vertical-line"></div>
								</div>
								
								<div class="col-sm-6">
									<p>
										Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
									
								</div>
							</div>
							 -->
						</div>
					</div>
					
		
				</div>
			</section>
		</div>
		<?php get_footer(); ?>