<?php

// add last login date column to users

// 01 - collect login and active
add_action( 'wp_login', 'switch_collect_login_timestamp', 20, 2 );
function switch_collect_login_timestamp( $user_login, $user ) {
    update_user_meta( $user->ID, 'last_login', time() );
}

add_action('init', 'switch_collect_active_timestamp');
function switch_collect_active_timestamp() {
    update_user_meta( wp_get_current_user()->ID, 'last_active', time() );
}

// 02 - add colums to user table
add_filter( 'manage_users_columns', 'switch_modify_user_table' );
function switch_modify_user_table( $columns ) {
    $columns['login_date'] = 'Last login';
    $columns['active_date'] = 'Last active';
    return $columns;
}

// 03 - add users to table
add_filter( 'manage_users_custom_column', 'switch_last_login_column', 10, 3 );
function switch_last_login_column( $output, $column_id, $user_id ){

    if( $column_id == 'login_date' ) {
        $last_login = get_user_meta( $user_id, 'last_login', true );
        // $date_format = 'd-m-Y H:i';

        $tz = 'Europe/Amsterdam';
        $timestamp = $last_login;
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
        $new_date = $dt->format('d-m-Y H:i');

        $output = $last_login ? $new_date : update_user_meta( $user_id, 'last_login', 1);
    }
    return $output;
}

add_filter( 'manage_users_custom_column', 'switch_last_active_column', 10, 3 );
function switch_last_active_column( $output, $column_id, $user_id ){

    if( $column_id == 'active_date' ) {
        $last_active = get_user_meta( $user_id, 'last_active', true );
        // $date_format = 'd-m-Y H:i';

        $tz = 'Europe/Amsterdam';
        $timestamp = $last_active;
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
        $new_date = $dt->format('d-m-Y H:i');
        
        $output = $last_active ? $new_date : update_user_meta( $user_id, 'last_active', 1);
    }
    return $output;
}

// 04 - sort column
add_filter( 'manage_users_sortable_columns', 'switch_sortable_columns' );
add_action( 'pre_get_users', 'switch_sort_last_login_column' );
function switch_sortable_columns( $columns ) {
    return wp_parse_args( array(
        'login_date' => 'last_login',
        'active_date' => 'last_active',
    ), $columns );
}
function switch_sort_last_login_column( $query ) {
    if( !is_admin() ) {
        return $query;
    }
    $screen = get_current_screen();
    
    if( isset( $screen->id ) && $screen->id !== 'users' ) {
        return $query;
    }
    if( isset( $_GET[ 'orderby' ] ) && $_GET[ 'orderby' ] == 'last_login' ) {
    
        $query->query_vars['meta_key'] = 'last_login';
        $query->query_vars['orderby'] = 'meta_value';
    }
    if( isset( $_GET[ 'orderby' ] ) && $_GET[ 'orderby' ] == 'last_active' ) {
    
        $query->query_vars['meta_key'] = 'last_active';
        $query->query_vars['orderby'] = 'meta_value';
    }
    return $query;
}

// update likes when user is deleted:
// when a user is deleted, the user id stays in the repeater containing 
// the user ids that liked a post, so we need to update all of the 
// repeaters to remove the user id

// add_action('acf/init', 'switch_delete_user_likes');
add_action( 'delete_user', 'switch_delete_user_likes' );
function switch_delete_user_likes( $user_id = 0 ) {
        
    // get list of user ids
    $users = get_users();
    $user_ids = array();
    foreach ($users as $key => $user) {
        array_push($user_ids, $user->ID);
    }
    // console_log($user_ids);

    $args = array(
        'post_type' => array('news', 'Projects', 'Social', 'Documents', 'Vacancies', 'events'),
        'posts_per_page' => -1,
    );
    $query = new WP_Query( $args );

    while( $query->have_posts()): $query->the_post();
        $like_user_ids = array();
        $post_id = get_the_ID();

        $field_key = "like_user";
        $thisPost = $post_id;
        $getRows = get_field($field_key, $thisPost);

        if(!empty($getRows)) {
            for($i = count($getRows); $i > 0; $i--) {
                $user_id = $getRows[$i-1]['user'];
                if (!in_array($user_id, $user_ids)) {
                    // console_log($post_id." - ".get_the_title());
                    // console_log("user not found: ".$user_id);
                    delete_row($field_key, $i, $thisPost);
                }
            }
        }


        wp_reset_postdata();
    endwhile;
}

// date_of_birth

function get_user_date_of_birth() {

    $exclude_ids = explode(",", get_field('options_exclude_users_ids', 'option'));
    $args = array(
        'role' => '',
        'role__in' => array(),
        'role__not_in' => array(),
        'meta_key' => 'profile_date_of_birth',
        'orderby' => array(
            'meta_value' => 'desc'
        ),
        'exclude' => $exclude_ids,
    ); 
    $users = get_users( $args );
    
    foreach ( $users as $key => $user ) {

        $date_of_birth_check = get_user_meta( $user->ID, 'profile_date_of_birth', true );
        $date_of_birth_array = explode("-", $date_of_birth_check);

        if (sizeof($date_of_birth_array) == 3) {
            $date_of_birth = date('Y') . '-' . $date_of_birth_array[1] . '-' . $date_of_birth_array[2];
        }
        
        if (date('Y-m-d', strtotime('-7 days')) > $date_of_birth) {
            $date_of_birth = date('Y', strtotime('+1 year')) . '-' . $date_of_birth_array[1] . '-' . $date_of_birth_array[2];
        };

        $users[$key]->date_of_birth = $date_of_birth;
        $users[$key]->date_of_birth_check = $date_of_birth_check;

    }

    //sort users by date_of_birth

    function date_sort($a, $b) {
        return strtotime($a->date_of_birth) - strtotime($b->date_of_birth);
    }

    usort($users, "date_sort");

    return $users;
}

// delete post

// allow subscribers to delete posts
// add_action( 'admin_init', 'allow_subscribers_delete_posts');
function allow_subscribers_delete_posts() {
    $role = get_role( 'subscriber' );
    $role->add_cap( 'delete_posts' );
    $role->add_cap( 'delete_published_posts' );
}

// redirect after delete post
// add_action( 'trashed_post', 'redirect_after_deleted_post', 10 );
function redirect_after_deleted_post() {
    $type = get_post_type();
    if ($type == 'social') {
        $social = get_permalink( get_page_by_path( 'social' ) );
        wp_redirect($social);
        exit;
    }
}