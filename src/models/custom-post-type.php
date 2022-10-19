<?php 

/**
 * Register custom post type
 * @link https://developer.wordpress.org/reference/hooks/init/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @link https://generatewp.com/post-type/
 */


// Our custom post type function
    function create_posttype() {

        if ( get_locale() == 'da_DK' ) :
            $rewrites = array( 'slug' => 'produkter' );
        else : 
            $rewrites = array( 'slug' => 'products' );
        endif;    
        
        register_post_type( 'products',
        // custom post type options
            array(
                'labels' => array(
                    'name' => __( 'Products' ),
                    'singular_name' => __( 'Product' ),
                    'parent_item_colon' => ''
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => $rewrites,
                'hierarchical' => true,
                'supports' => array('title', 'revisions'),

                'taxonomies' => array(
            'project_category'
        ) 
            )
        );

         if ( get_locale() == 'da_DK' ) :
            $rewrite_taxonomy = array( 'slug' => 'produkt-kategorier', 'hierarchical' => false );
        else : 
            $rewrite_taxonomy = array( 'slug' => 'product-categories', 'hierarchical' => false );
        endif;  

        register_taxonomy( 'product-categories',  'products',  
            array(  
                'hierarchical' => true,  
                'label' => 'Categories',
                'rewrite' => $rewrite_taxonomy,
                'query_var' => true
            )  
        ); 
        }   

        // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );


