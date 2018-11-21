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
    
    register_post_type('jobexperience', $args);
}

function jobexperience_admin_init(){
    // add a box to add custom fields to
    add_meta_box(
    	'jobexperience_details', //id
        'Jobexperience Details', //title
        'jobexperience_callback', //callback function
        'jobexperience', // 'post type' to add the metabox to 
        'normal', //'context'
        'high' //priority
    );

    // define custom fields for metabox
    function jobexperience_callback(){
        global $post; //pull in the global post variable
        $custom = get_post_custom($post->ID);
        $job_time = '';
        $job_description = '';

        if(isset($custom['job_time'])){
            $job_time = $custom['job_time'][0];
        }
        if(isset($custom['job_description'])){
            $job_description = $custom['job_description'][0];
        }
        
        // echo html for this custom metabox, wordpresss makes a form around this
        ?>
         Please enter some details about your job experience.
        
        <div>
            <label>Time range for the job (e.g. "2005-2009", "september through november 2014":</label>
            <input type="text" name="job_time" value="<?php echo $job_time; ?>"/>  
            <br />
            <label>Job description (e.g. java developer):</label>
            <input type="text" name="job_description" value="<?php echo $job_description; ?>"/>  
        </div>
            
        <?php
            
        
    }
}

function jobexperience_save_data(){
    global $post; 

    if(isset($post)){
        update_post_meta($post->ID, 'job_time', $_POST['job_time']);
        update_post_meta($post->ID, 'job_description', $_POST['job_description']);
    }
   
}

add_action('init', 'jobexperience_init');
add_action('admin_init', 'jobexperience_admin_init');
add_action('save_post', 'jobexperience_save_data');
