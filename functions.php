<?php
//https://generatewp.com/
/**
 * Proper way to enqueue scripts and styles
 */

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), time() );
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.min.css', array(), time()  );
    wp_enqueue_style( 'line-icons', get_template_directory_uri() . '/css/line-icons.min.css', array(), time()  );
    wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/css/elegant-icons.min.css', array(), time()  );
    wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.min.css', array(), time()  );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), time()  );
    wp_enqueue_style( 'theme-1', get_template_directory_uri() . '/css/theme-1.css', array(), time()  );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), time()  );
    
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery.plugin', get_template_directory_uri() . '/js/jquery.plugin.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'spectragram', get_template_directory_uri() . '/js/spectragram.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scrollReveal', get_template_directory_uri() . '/js/scrollReveal.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'twitterFetcher_v10_min', get_template_directory_uri() . '/js/twitterFetcher_v10_min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery.countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function register_menus(){
    register_nav_menus(
        array(
        'primary-menu' => __( 'Primary Menu' ),
        /*'footer-menu' => __( 'Footer Menu' )*/
        )
    );
}

add_action('init', 'register_menus');

/*****************************************
JOBEXPERIENCE CUSTOM POST TYPE
******************************************/
// define constants for jobexperience post type and field names
define("JOBEXPERIENCE_POSTTYPE", "jobexperience");
define("JOBEXPERIENCE_DESCRIPTION", "job_description");
define("JOBEXPERIENCE_TIME", "job_time");

// register the post type that displays experience entries on the front page
function jobexperience_init(){
    $labels = array(
    	'name' => __('Job experiences'),
    	'singular_name' => __('Job experience'),
    	'add_new_item' => __('Add new job experience')
    );
    $args = array(
    	'labels' => $labels,
    	'description' => 'Holds all your previence job experience',
    	'public' => true,
    	'has_archive' => true,
    	'supports' => array('title', 'thumbnail')
    );
    
    register_post_type(JOBEXPERIENCE_POSTTYPE, $args);
}

function jobexperience_admin_init(){
    // add a box to add custom fields to
    add_meta_box(
    	'jobexperience_details', //id
        'Jobexperience Details', //title
        'jobexperience_callback', //callback function
        JOBEXPERIENCE_POSTTYPE, // 'post type' to add the metabox to 
        'normal', //'context'
        'high' //priority
    );

    // define custom fields for metabox
    function jobexperience_callback(){
        global $post; //pull in the global post variable
        $custom = get_post_custom($post->ID);
        $job_time = '';
        $job_description = '';

        if(isset($custom[JOBEXPERIENCE_TIME])){
            $job_time = $custom[JOBEXPERIENCE_TIME][0];
        }
        if(isset($custom[JOBEXPERIENCE_DESCRIPTION])){
            $job_description = $custom[JOBEXPERIENCE_DESCRIPTION][0];
        }
        
        // echo html for this custom metabox, wordpresss makes a form around this
        ?>
         Please enter some details about your job experience.
        
        <div>
            <label>Time range for the job (e.g. "2005-2009", "september through november 2014":</label>
            <input type="text" name="<?php echo JOBEXPERIENCE_TIME; ?>" value="<?php echo $job_time; ?>"/>  
            <br />
            <label>Job description (e.g. java developer):</label>
            <input type="text" name="<?php echo JOBEXPERIENCE_DESCRIPTION; ?>" value="<?php echo $job_description; ?>"/>  
        </div>
            
        <?php
            
        
    }
}

// CAUTION this gets called when saving ANY post type, so we have to use isset to make sure saving regular posts does not break
// isset($post) must be used because wordpress thinks it's logical to call this on page load
function jobexperience_save_data(){
    global $post; 

    if(isset($post)){
        if(isset($_POST[JOBEXPERIENCE_TIME])){
            update_post_meta($post->ID, JOBEXPERIENCE_TIME, $_POST[JOBEXPERIENCE_TIME]);
        }
        if(isset($_POST[JOBEXPERIENCE_DESCRIPTION])){
            update_post_meta($post->ID, JOBEXPERIENCE_DESCRIPTION, $_POST[JOBEXPERIENCE_DESCRIPTION]);
        }    
    }
}

add_action('init', 'jobexperience_init');
add_action('admin_init', 'jobexperience_admin_init');
add_action('save_post', 'jobexperience_save_data');

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


/*****************************************
CUSTOMIZATION API: custom top left logo
******************************************/

$args = array(
	'width'         => 200,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/img/logotype_dark.png',
);
add_theme_support( 'custom-header', $args );