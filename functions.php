<?php 
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'search-menu' => __( 'Search Menu' ),
		'mobile-menu' => __( 'Mobile Menu' ),
		'sidebar-bottom-menu' => __( 'Sidebar Bottom Menu' ),
		'sidebar-top-menu' => __( 'Sidebar Top Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
function be_arrows_in_menus( $item_output, $item, $depth, $args ) {
if( in_array( 'menu-item-has-children', $item->classes ) ) {
}
}
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-thumbnail', 200, 200, true );
add_image_size( 'homepage-post-thumbnail', 100, 100, true );
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);
function get_breadcrumb() {
    if (!is_front_page()) {
        if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		  }
    }
}
function theme_styles(){
   wp_enqueue_style( 'kbcjhstyle', get_template_directory_uri() . '/css/kbcjhstyle.css',false,'1.76','all');
	//wp_enqueue_script('flows', get_template_directory_uri().'/assets/js/flows.js', '', '', true);
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );
// Remove dashicons in frontend for unauthenticated users
add_action( 'wp_enqueue_scripts', 'bs_dequeue_dashicons' );
function bs_dequeue_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}
add_filter( 'wp_schema_pro_schema_review', 'my_extra_schema_field_mapping', 10, 3 );

/**
 * Mapping extra field for schema markup.
 *
 * @param  array $schema Schema array.
 * @param  array $data   Mapping fields array.
 * @return array
 */
function my_extra_schema_field_mapping( $schema, $data, $post ) {
	if ( isset( $data['reviewer-name'] ) && ! empty( $data['reviewer-name'] ) ) {
		$schema['author']['sameAs'] = home_url();
	}
	if ( isset( $data['publisher-name'] ) && ! empty( $data['publisher-name'] ) ) {
		$schema['publisher']['sameAs'] = home_url();
	}
return $schema;
}

function misha_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_template_directory_uri() . '/js/loadmore.js', array('jquery'), '7.00');
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_load_more_scripts' );

function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
  $sort = null;
  $filter = null;
  if(isset($_POST['sort'])) {
    $sort = $_POST['sort'];
  }
  if(isset($_POST['filter'])) {
    $filter = $_POST['filter'];
  }
	//$args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['posts_per_page'] = '10';
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	//$args['post__not_in'] = array( 2702, );
  $args['cat'] = '3';
	
 	$orderBy = [];
  $metaSubQuery = [];
  if($sort == null && $filter == null){
	$metaSubQuery =	array(
		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
	);
// 	  	$metaSubQuery =	array(
// 		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
// 		'first' => array('key' => 'custom_order', 'compare' => 'EXISTS', 'type'=>'NUMERIC'),
// 	);
	//$orderBy['first'] = 'ASC';
	$orderBy['stars'] = 'DESC';
	$orderBy['post_date'] = 'DESC';
  }elseif ($filter == 'crypto'){
// 	$metaSubQuery =	array(
// 		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
// 		'first' => array('key' => 'custom_order', 'compare' => 'EXISTS', 'type'=>'NUMERIC'),
// 		'crypto' => array('key' => 'Crypto', 'value' => 'Ja'),
// 	);
	$metaSubQuery =	array(
		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
		'crypto' => array('key' => 'Crypto', 'value' => 'Ja'),
	);
	$orderBy['stars'] = 'DESC';
	$orderBy['post_date'] = 'DESC';
  }elseif($filter == 'exclusive'){
	$metaSubQuery =	array(
		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
		'crypto' => array('key' => 'Exclusive', 'value' => 'Ja'),
	);
	$orderBy['stars'] = 'DESC';
	$orderBy['post_date'] = 'DESC';
  }
	if(count($metaSubQuery) > 0){
	  	$args['meta_query'] = [
		'relation' => 'AND',
		$metaSubQuery,
		];
	}
	if(count($orderBy) > 0){
		$args['orderby'] = $orderBy;
	}
	
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
  //WP_Query($args);
 
	if( have_posts() ) :

    //echo "Have Posts";
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
      //echo "Post";
			get_template_part( 'template-parts/casino/item-row-new' );
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
 
 
		endwhile;
    wp_reset_postdata();
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function misha_loadmorebookies_ajax_handler(){
 
	// prepare our arguments for the query
  $sort = null;
  $filter = null;
  if(isset($_POST['sort'])) {
    $sort = $_POST['sort'];
  }
  if(isset($_POST['filter'])) {
    $filter = $_POST['filter'];
  }
	//$args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['posts_per_page'] = '10';
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$args['post_type'] = 'casino';
  if($sort == null && $filter == null){
    $args['meta_key'] = 'c_stars';
	$args['orderby'] = 'meta_value';
	$args['order'] = 'DESC';
  }elseif ($filter == 'crypto'){
//     $args['meta_query'] = [['key' => 'Crypto', 'value' => 'Ja']];
//     $args['meta_key'] = 'Stars';
//     $args['orderby'] = 'meta_value_num';
//     $args['order'] = 'DESC';
	$args['tax_query'] = [['taxonomy' => 'casino_tags', 'field' => 'slug', 'terms' =>  ['krypto'], 'operator' => 'IN',]];
  }elseif($filter == 'exclusive'){
    $args['tax_query'] = [['taxonomy' => 'casino_tags', 'field' => 'slug', 'terms' =>  ['eksklusiv'], 'operator' => 'IN',]];
  }
  
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
  //WP_Query($args);
 
	if( have_posts() ) :

    //echo "Have Posts";
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
      //echo "Post";
			//get_template_part( 'template-parts/casino/item-row-new' );
			get_template_part( 'template-parts/casino-list/casino-list-item' , null, $post);
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
 
 
		endwhile;
    wp_reset_postdata();
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmorebookies', 'misha_loadmorebookies_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmorebookies', 'misha_loadmorebookies_ajax_handler'); // wp_ajax_nopriv_{action}


function check_if_email_exists( $field_id, $field_submit, $form_data ) {
	
	if ( absint( $form_data['id'] ) !== 2648 ) {
    	return;
    }
	
	$emails = []; 
	
	//array_push($emails, "test");
	
	$entries = json_decode(json_encode(wpforms()->entry->get_entries( array( 'form_id' => '2648' ) )), true);
	//array_push($emails, $entries);
	foreach ( $entries as $entry ) {
		$entry_fields = json_decode($entry[ 'fields' ], true);
		foreach ( $entry_fields as $entry_field ) {
			
			//array_push($emails, $entry_field);
			if($entry_field[ 'id' ] == '1'){
				array_push($emails, $entry_field[ 'value' ]);
			}
		}
	}
 
    //$domain          = substr( strrchr( $field_submit, "@" ), 1 );
    $currentEmails       = $emails;
	//$currentEmails       = get_form_emails();
	$currentEmailsString = json_encode($currentEmails);
 
    if( in_array( $field_submit, $currentEmails ) ) { 
        wpforms()->process->errors[ $form_data['id'] ][ $field_id ] = esc_html__( 'Email already used!', 'wpforms' );
 
        return;
    }
 
}
add_action('wpforms_process_validate_email', 'check_if_email_exists', 10, 3 );


function get_form_emails(){
	
	$emails = []; 
	
	$entries = json_decode(json_encode(wpforms()->entry->get_entries( array( 'form_id' => '2648' ) )), true);
	
	foreach ( $entries as $entry ) {
		$entry_fields = $entry[ 'fields' ];
		foreach ( $entry_fields as $entry_field ) {
			
			if($entry_field[ 'id' ] == '1'){
				array_push($emails, wp_strip_all_tags( $entry_field[ 'value' ] ));
			}
		}
	}

  return $emails; 
}

function wpf_dev_frontend_output_before( $form_data, $form ) {
     
    // Optional, you can limit to specific forms. Below, we restrict output to
    // form #5.
    if ( absint( $form_data[ 'id' ] ) !== 2696 ) {
        return;
    } 
 
    // Run code or see example echo statement below.
    _e( '<div class="disable">' );
 
}
 
add_action( 'wpforms_frontend_output_before', 'wpf_dev_frontend_output_before', 10, 2 );

function wpf_dev_frontend_output_after( $form_data, $form ) {
     
    // Optional, you can limit to specific forms. Below, we restrict output to
    // form #731.
    if ( absint( $form_data[ 'id' ] ) !== 2696 ) {
        return;
    } 
 
    // Run code or see example echo statement below.
    _e( '</div>' );
 
}
add_action( 'wpforms_frontend_output_after', 'wpf_dev_frontend_output_after', 10, 2 );
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

include_once( get_stylesheet_directory() .'/shortcodes/casinoliste.php');
include_once( get_stylesheet_directory() .'/shortcodes/slots-review-list.php');
include_once( get_stylesheet_directory() .'/shortcodes/page-index.php');
include_once( get_stylesheet_directory() .'/shortcodes/casino-cards.php');

function odd_save_post( $post_id ) {
	$bettingSummaryID = 4547;
	$bets = get_field('bets', $bettingSummaryID);
	$roi = get_field('roi', $bettingSummaryID);
	$profit = get_field('profit', $bettingSummaryID);
	$wonBets = get_field('won_bets', $bettingSummaryID);
	
	$week = date("Y-m-d H:i:s", strtotime('-1 week -2 hours'));
	$month = date("Y-m-d H:i:s", strtotime('-1 month -2 hours'));

	$calculatedBets = 0;
	$calculatedStakes = 0;
	$calculatedUnits = 0;
	$calculatedProfit = 0;
	$calculatedWonBets = 0;
	$calculatedLostBets = 0;
	
	$weeklyTotalBets = 0;
	$weeklyRoi = 0;
	$weeklyProfit = 0;
	$weeklyWonBets = 0;
	
	$monthlyTotalBets = 0;
	$monthlyRoi = 0;
	$monthlyProfit = 0;
	$monthlyWonBets = 0;

		// We need to reset all the fields
			// Query all the odds
	// Get count and set $bets
	$args['post_status'] = 'publish';
	$args['post_type'] = 'odd';
	$args['posts_per_page'] = '-1';
	//$args['meta_query'] = [['key' => 'od_result', 'compare' => 'EXISTS']];
	$args['meta_query'] = [['key' => 'od_result', 'compare' => 'IN', 'value' => ['Void', 'Profit', 'Loss', 'Half Win (AH)', 'Half Loss (AH)', 'Draw (AH)'] ]];
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post();
			$oddUnits = get_field('od_units', $post);
			$oddOdd = get_field('od_odds', $post);
			$oddResult = get_field('od_result', $post);
			$oddDate = get_field('od_datetime', $post);
			$calculatedBets++;
			if(strtotime($week) < strtotime($oddDate)){
				$weeklyTotalBets++;
			}
			if(strtotime($month) < strtotime($oddDate)){
				$monthlyTotalBets++;
			}
		
			$calculatedUnits = $calculatedUnits + $oddUnits;
	
			if(strtotime($week) < strtotime($oddDate)){
				$weeklyRoi = $weeklyRoi + $oddUnits;
			}
			if(strtotime($month) < strtotime($oddDate)){
				$monthlyRoi = $monthlyRoi + $oddUnits;
			}
			
			if($oddResult == 'Loss'){
				$oddUnits = -$oddUnits;
				$calculatedLostBets = $calculatedLostBets + 1;
			}
			if($oddResult == 'Profit'){
				$oddUnits = ($oddUnits * $oddOdd) - $oddUnits;
				$calculatedWonBets = $calculatedWonBets + 1;
				if(strtotime($week) < strtotime($oddDate)){
					$weeklyWonBets = $weeklyWonBets + 1;
				}
				if(strtotime($month) < strtotime($oddDate)){
					$monthlyWonBets = $monthlyWonBets + 1;
				}
			}
			if($oddResult == 'Void'){
				$oddUnits = 0;
			}
			$calculatedProfit = $calculatedProfit + $oddUnits;
			if(strtotime($week) < strtotime($oddDate)){
				$weeklyProfit = $weeklyProfit + $oddUnits;
			}
			if(strtotime($month) < strtotime($oddDate)){
				$monthlyProfit = $monthlyProfit + $oddUnits;
			}
		endwhile;
	wp_reset_postdata();
	endif;
	
	if($calculatedUnits != 0){
		$roi = ($calculatedProfit/$calculatedUnits)*100;
	}
	if($weeklyRoi != 0){
		$weeklyRoi = ($weeklyProfit/$weeklyRoi)*100;
	}
	if($monthlyRoi != 0){
		$monthlyRoi = ($monthlyProfit/$monthlyRoi)*100;
	}
	
	update_field('bets', $calculatedBets, $bettingSummaryID);
	update_field('roi', $roi, $bettingSummaryID);
	update_field('profit', $calculatedProfit, $bettingSummaryID);
	update_field('won_bets', $calculatedWonBets, $bettingSummaryID);
	
	update_field('w_bets', $weeklyTotalBets, $bettingSummaryID);
	update_field('w_roi', $weeklyRoi, $bettingSummaryID);
	update_field('w_profit', $weeklyProfit, $bettingSummaryID);
	update_field('w_won_bets', $weeklyWonBets, $bettingSummaryID);
	
	update_field('m_bets', $monthlyTotalBets, $bettingSummaryID);
	update_field('m_roi', $monthlyRoi, $bettingSummaryID);
	update_field('m_profit', $monthlyProfit, $bettingSummaryID);
	update_field('m_won_bets', $monthlyWonBets, $bettingSummaryID);
	return;

}
add_action( 'save_post_odd', 'odd_save_post' );


add_action( 'wp_ajax_demo_pagination_posts', 'demo_pagination_posts' );
add_action( 'wp_ajax_nopriv_demo_pagination_posts', 'demo_pagination_posts' ); 
function demo_pagination_posts() {
  global $wpdb;
  $msg = '';
  if(isset($_POST['page'])){
    $page = sanitize_text_field($_POST['page']);
    $cur_page = $page;
    //$page -= 1;
    $per_page = 20;
    $previous_btn = true;
    $next_btn = true;
    $start = $page * $per_page;
    // Set the table where we will be querying data
    $table_name = $wpdb->prefix . "posts";
    // Query the posts
    $all_blog_posts = $wpdb->get_results($wpdb->prepare("
      SELECT * FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );
    // At the same time, count the number of queried posts
      $count = $wpdb->get_var($wpdb->prepare("
      SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish'", array() ) );
	  
	  	$args['post_status'] = 'publish';
	  $args['meta_key'] = 'od_datetime';
	  $args['orderby'] = 'meta_value';
	  $args['order'] = 'DESC';
		$args['post_type'] = 'odd';
		$args['posts_per_page'] = '20';
		  $args['paged'] = $page;
		$args['meta_query'] = [['key' => 'od_result', 'compare' => 'IN', 'value' => ['Void', 'Profit', 'Loss', 'Half Win (AH)', 'Half Loss (AH)', 'Draw (AH)'] ]];
		$all_blog_posts = get_posts( $args );
	  	//$count = count($all_blog_posts);
		$count_posts = wp_count_posts('odd');
	  	$count = $count_posts->publish;
	 
   
    $no_of_paginations = ceil($count / $per_page);
    if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
      } else {
        $end_loop = $no_of_paginations;
      }
    } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
        $end_loop = 7;
      else
        $end_loop = $no_of_paginations;
    }
    // Pagination Buttons     
    $pag_container .= "
    <div class='pagination'>
      <ul>";
        if ($previous_btn && $cur_page > 1) {
          $pre = $cur_page - 1;
          $pag_container .= "<li p='$pre' class='active'><</li>";
        } else if ($previous_btn) {
          $pag_container .= "<li class='inactive'><</li>";
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {
          if ($cur_page == $i)
            $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
          else
            $pag_container .= "<li p='$i' class='active'>{$i}</li>";
        }
        if ($next_btn && $cur_page < $no_of_paginations) {
          $nex = $cur_page + 1;
          $pag_container .= "<li p='$nex' class='active'>></li>";
        } else if ($next_btn) {
          $pag_container .= "<li class='inactive'>></li>";
        }
        $pag_container = $pag_container . "
      </ul>
    </div>";
    echo '<div class = "st-data">';
	  //echo $page;
	  //print_r($all_blog_posts);
	  global $post;
	foreach($all_blog_posts as $post): 
	  //print_r($post);
		get_template_part( 'template-parts/odds-summary/odd-list-item', null, $post);
	endforeach;
	echo '</div>';
    echo '<div class = "pagination-nav">' . $pag_container . '</div>';
  }
  die();
}

?>