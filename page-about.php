<?php get_header(); ?>
    
    <div class="main-container">
    <section class="pure-text-centered">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                        
                        <h1><strong><?php the_field('header_title'); ?></strong></h1>
                        <p class="lead">
                            <?php the_field('short_about_me'); ?>
                        </p>
                    </div>
                </div>
    
            </div>
        </section>
        
        <section class="inline-image-right">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 align-vertical no-align-mobile">
                        <h1><?php the_field('middle_title'); ?></h1>
                        <h6><?php the_field('middle_subtitle'); ?></h6>
                        <p class="lead">
                        <?php the_field('middle_content'); ?>
                        </p>
                    </div>
                    
                    <div class="col-sm-6 text-center">
                        <img alt="Product Image" class="product-image" src="img/devices.png">
                    </div>
                </div>
            </div>
        </section>
        
        <section class="duplicatable-content">
        
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>A few things you need to know</h1>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-sm-6">
                        <div class="feature feature-icon-large">
                            <div class="pull-left">
                                <i class="icon icon-desktop"></i>
                            </div>
                            <div class="pull-right">
                                <h5>Web Design</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="feature feature-icon-large">
                            <div class="pull-left">
                                <i class="icon icon-phone"></i>
                            </div>
                            <div class="pull-right">
                                <h5>Mobile Design</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="feature feature-icon-large">
                            <div class="pull-left">
                                <i class="icon icon-strategy"></i>
                            </div>
                            <div class="pull-right">
                                <h5>Marketing strategy</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="feature feature-icon-large">
                            <div class="pull-left">
                                <i class="icon icon-profile-male"></i>
                            </div>
                            <div class="pull-right">
                                <h5>Awesome personality</h5>
                                <p>
                                    Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        
        </section>
    </div>
    
<?php get_footer(); ?>