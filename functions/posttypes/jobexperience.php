<?php
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