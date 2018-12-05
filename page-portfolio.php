<?php get_header(); ?>
<div class="main-container">
    <section class="no-pad-bottom projects-gallery">
        <div class="projects-wrapper clearfix">
            <div class="container">
                <div class="projects-container column-projects">

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

                        <div class="col-md-4 col-sm-6 project development image-holder">
                            <div class="background-image-holder">
                                <img class="background-image"
                                     alt="Background Image"
                                     src="<?php echo get_field("portfolio_item_thumbnail")["url"] ?>">
                            </div>
                            <div class="hover-state">
                                <div class="align-vertical">
                                    <h3 class="text-white"><?php echo $post->the_title; ?></h3>
                                    <a href="<?php echo $portitem_custom_fields["portfolio_item_url"][0]; ?>"
                                       class="btn btn-primary btn-white">
                                        <?php echo $post->post_title; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; else : ?>
                        <p><?php esc_html_e('You didn\'t add any projects yet. You can start adding projects in the wordpress admin console.'); ?></p>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </section>

    <section class="pure-text-contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                    <span class="sub alt-font">Do you like my works?</span>
                    <h1><span>So let's talk about your project!</span></h1>
                    <i class="icon icon-chat"></i>
                </div>
            </div>

        </div>
    </section>
</div>

<?php get_footer(); ?>
				