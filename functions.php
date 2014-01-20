<?php

        //Set the content width based on the theme's design and stylesheet.
         if ( ! isset( $content_width ) )
                $content_width = 600; /* pixels */


        if ( ! function_exists( 'dl_theme_setup' ) ) :
                function dl_theme_setup() {

                //Add default posts and comments RSS feed links to head
                add_theme_support( 'automatic-feed-links' );

                //Enable support for Post Thumbnails on posts and pages
                add_theme_support( 'post-thumbnails' );
                add_image_size( 'port-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)

                //Register A WordPress Nav Menu
                register_nav_menus( array(
                        'primary' => ( 'Primary Menu' ),
                ) );

        }
        endif;

        add_action( 'after_setup_theme', 'dl_theme_setup' );



        //Register A Sidebar Widget
        function dl_widgets_init() {
            register_sidebar( array(
                'name' => ( 'Right Sidebar' ),
                'description'   => 'The Right sidebar',
                'class'         => '',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h6 class="widget-title"> ',
                'after_title' => ' </h6>',
            ) );
        }
        add_action( 'widgets_init', 'dl_widgets_init' );



        //Enqueue all the required stylesheet and javascript files
        function dl_load_style_scripts() {
                if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                        wp_enqueue_script( 'comment-reply' );
                }  

            wp_register_script('modernizr', get_template_directory_uri().'/js/modernizr-2.6.2.min.js','1.0', 'all');
            wp_register_script('gumby', get_template_directory_uri().'/js/gumby.min.js','1.0', 'all', true);
            wp_register_script('isotope', get_template_directory_uri().'/js/isotope.pkgd.min.js');
            wp_register_script('isotope-init', get_template_directory_uri().'/js/isotope-init.js');
            wp_register_script('jquery-transition', get_template_directory_uri().'/js/jquery-transition.js');
            // wp_register_script('gumby-parallax', get_template_directory_uri().'/js/gumby.parallax.js');

            wp_enqueue_script(  'modernizr');
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'gumby' );
            wp_enqueue_script( 'isotope' );
            wp_enqueue_script( 'isotope-init' );
            wp_enqueue_script( 'jquery-transition' );
            // wp_enqueue_script( 'gumby-parallax');

            wp_register_style('gumby', get_template_directory_uri().'/css/gumby.css','1.0', 'all');


            wp_enqueue_style( 'gumby' );
            wp_enqueue_style( 'style', get_stylesheet_uri() );

        }
        add_action( 'wp_enqueue_scripts', 'dl_load_style_scripts' );
        
        //Walker Class - This add support for the dropdown menu in the Gumbyframework
        class Walker_Page_Custom extends Walker_Nav_menu{

                function start_lvl(&$output, $depth){
                        $indent = str_repeat("\t", $depth);
                        $output .= "\n$indent<div class=\"dropdown\"><ul>\n";
                }

                function end_lvl(&$output , $depth){
                        $indent = str_repeat("\t", $depth);
                        $output .= "$indent</ul></div>\n";
                }
        }

//Adding the portfolio post type
add_action( 'init', 'create_post_type' );
            function create_post_type() {
                register_post_type( 'dl_portfolio',
                    array(
                        'labels' => array(
                                'name' => __( 'Portfolio' ),
                                'singular_name' => __( 'Portfolio' )
                        ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'portfolio'),
                    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
                    'taxonomies' => array('porfolio_cats', 'post_tag'),                
                )
        );
}

add_action( 'init', 'dl_create_taxonomies' );
function dl_create_taxonomies() {
    
// portfolio taxonomies
    $cat_labels = array(
        'name' => __( 'Portfolio Categories', '' ),
        'singular_name' => __( 'Portfolio Category', '' ),
        'search_items' =>  __( 'Search Portfolio Categories', '' ),
        'all_items' => __( 'All Portfolio Categories', '' ),
        'parent_item' => __( 'Parent Portfolio Category', '' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:', '' ),
        'edit_item' => __( 'Edit Portfolio Category', '' ),
        'update_item' => __( 'Update Portfolio Category', '' ),
        'add_new_item' => __( 'Add New Portfolio Category', '' ),
        'new_item_name' => __( 'New Portfolio Category Name', '' ),
        'choose_from_most_used' => __( 'Choose from the most used portfolio categories', '' )
    );  

    register_taxonomy('portfolio_cats','dl_portfolio',array(
        'hierarchical' => true,
        'labels' => $cat_labels,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio-category' ),
    ));
}

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if ( is_category() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'page', 'dl_portfolio' ) );
    return $query;
}



