<?php get_header(); ?>
<div class="main-container">
<section class="duplicatable-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1><?php echo $post->post_title; ?></h1>
                </div>
            </div>
            
            <div class="row">
            </div>	
        </div>
    </section>
</div>
<div class="row">
    <div class="col-md-4 col-sm-6">
        <?php
            echo $post->post_content;
            ?>   
        </div>
</div>	
        
<?php get_footer(); ?>