<?php

/*****************************************
PORTFOLIO ITEM CUSTOM POST TYPE
******************************************/

// define constants for jobexperience post type and field names
define("PORTFOLIO_ITEM_POSTTYPE", "portfolio_item");
define("PORTFOLIO_ITEM_URL", "portfolio_item_url");

// register the post type that displays experience entries on the front page
function portfolio_item_init(){
    $labels = array(
    	'name' => __('Portfolio items'),
    	'singular_name' => __('Portfolio item'),
    	'add_new_item' => __('Add new portfolio item with a thumbnail, a name and a link to the project.')
    );
    $args = array(
    	'labels' => $labels,
    	'description' => 'Holds links to all your projects',
    	'public' => true,
    	'has_archive' => true,
    	'supports' => array('title', 'thumbnail')
    );
    
    register_post_type(PORTFOLIO_ITEM_POSTTYPE, $args);
}

function portfolio_item_admin_init(){
    // add a box to add custom fields to
    add_meta_box(
    	'portfolio_item_details', //id
        'Portfolio Item Details', //title
        'portfolio_item_callback', //callback function
        PORTFOLIO_ITEM_POSTTYPE, // 'post type' to add the metabox to
        'normal', //'context'
        'high' //priority
    );

    // define custom fields for metabox
    function portfolio_item_callback(){
        global $post; //pull in the global post variable
        $custom = get_post_custom($post->ID);
        $port_item_url = '';

        if(isset($custom[PORTFOLIO_ITEM_URL])){
            $port_item_url = $custom[PORTFOLIO_ITEM_URL][0];
        }
        
        // echo html for this custom metabox, wordpresss makes a form around this
        ?>
         Please enter the project details.
        
        <div>
            <label for="<?php echo PORTFOLIO_ITEM_URL; ?>">Project URL</label>
            <input id="<?php echo PORTFOLIO_ITEM_URL; ?>"
                   type="url"
                   name="<?php echo PORTFOLIO_ITEM_URL; ?>" value="<?php echo $port_item_url; ?>"/>
        </div>
            
        <?php
            
        
    }
}

// CAUTION this gets called when saving ANY post type, so we have to use isset to make sure saving regular posts does not break
// isset($post) must be used because wordpress thinks it's logical to call this on page load
function portfolio_item_save_data(){
    global $post; 

    if(isset($post)){
        if(isset($_POST[PORTFOLIO_ITEM_URL])){
            update_post_meta($post->ID, PORTFOLIO_ITEM_URL, $_POST[PORTFOLIO_ITEM_URL]);
        }    
    }
}

add_action('init', 'portfolio_item_init');
add_action('admin_init', 'portfolio_item_admin_init');
add_action('save_post', 'portfolio_item_save_data');