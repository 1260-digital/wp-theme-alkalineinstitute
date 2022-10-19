<?php

	// Add registered styles to the theme
	add_action('wp_enqueue_scripts', function () {
		wp_register_style( 'googlefonts',  'https://fonts.googleapis.com/css?family=Open+Sans:300, 400,700|EB+Garamond', array(), null, 'all' );
		wp_enqueue_style( 'googlefonts' );
		wp_register_style( 'main',  get_template_directory_uri() .'/dist/styles/main.css', array(), null, 'all' );
		wp_enqueue_style( 'main' );
	});

	// Add registered scripts to the theme
	add_action('wp_enqueue_scripts', function () {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery',  get_template_directory_uri() .'/dist/scripts/jquery.js', array(), null, 'all' );
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'main',  get_template_directory_uri() .'/dist/scripts/main.js', array('jquery'), null, 'all' );
		wp_enqueue_script( 'main' );
	});


	add_filter( 'gform_init_scripts_footer', '__return_true' );

	// Setup theme for translation
	add_action('after_setup_theme', 'lang_theme_setup');
	function lang_theme_setup(){
	    load_theme_textdomain('alkaline', get_template_directory() . '/templates/languages');
	} 


  /**
     * Use main stylesheet for visual editor
     * @see assets/styles/layouts/_tinymce.scss
     */
    function add_editor_styles() {     
     add_editor_style( get_template_directory_uri() .'/dist/styles/main.css' );
    }
    add_action( 'init', 'add_editor_styles' );

    // Registers a custom Google font for the WordPress wysiwyg editor
    function add_editor_fonts() {
        $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:300, 400, 700|EB+Garamond' );
        add_editor_style( $font_url );
    }
    add_action( 'after_setup_theme', 'add_editor_fonts' );



    // Registers the styleselect option in WordPress wysiwyg editor
    function add_styleselect($buttons) {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }
    add_filter('mce_buttons_2', 'add_styleselect');

    // Registers custom styles for the styleselect option in WordPress wysiwyg editor
    function add_styles_for_styleselect( $init_array ) {  
        $style_formats = array(
            array(  
                'title' => 'Headline 1',  
                'block' => 'p',  
                'classes' => 'h1',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Headline 2',  
                'block' => 'p',  
                'classes' => 'h2',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Headline 3',  
                'block' => 'p',  
                'classes' => 'h3',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Intro',  
                'block' => 'div',  
                'classes' => 'lead',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Button Primary',  
                'selector' => 'a',  
                'classes' => 'btn btn-lg btn-primary'
            ),
            array(  
                'title' => 'Button Secondary',  
                'selector' => 'a',  
                'classes' => 'btn btn-lg btn-info'
            ),
            array(
                'title' => 'List: Checkmarks', 
                'selector' => 'ul',
                'classes' => 'fa-ul fa-li-check'
            ),
            array(
                'title' => 'List: Plus', 
                'selector' => 'ul',
                'classes' => 'fa-ul fa-li-plus'
            ),
            array(  
                'title' => 'Boxed Default',  
                'block' => 'div',  
                'classes' => 'well well-default',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Boxed Primary',  
                'block' => 'div',  
                'classes' => 'well well-primary',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Boxed Secondary',  
                'block' => 'div',  
                'classes' => 'well well-secondary',
                'wrapper' => true,
            ),
            array(  
                'title' => 'Boxed Tertiere',  
                'block' => 'div',  
                'classes' => 'well well-tertiere',
                'wrapper' => true,
            )
        );  
        $init_array['style_formats'] = json_encode( $style_formats );  
        return $init_array;  
    }
    add_filter( 'tiny_mce_before_init', 'add_styles_for_styleselect' ); 



    // Adds Twitter Bootstrap classes for responsive oembeds
    function bootstrap_wrap_oembed( $html ){
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        return'<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>'; 
    }
    add_filter( 'embed_oembed_html','bootstrap_wrap_oembed',10,1);


/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}


/**
 * Register navigation menus
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'alkaline')
]);


add_theme_support( 'post-thumbnails', array( 'post' ) );



function hap_hide_the_archive_title( $title ) {
    // Skip if the site isn't LTR, this is visual, not functional.
    // Should try to work out an elegant solution that works for both directions.
    if ( is_rtl() ) {
        return $title;
    }
    // Split the title into parts so we can wrap them with spans.
    $title_parts = explode( ': ', $title, 2 );
    // Glue it back together again.
    if ( ! empty( $title_parts[1] ) ) {
        $title = wp_kses(
            $title_parts[1],
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        );
        $title = '<span class="screen-reader-text">' . esc_html( $title_parts[0] ) . ': </span>' . $title;
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'hap_hide_the_archive_title' );



/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap Comment Walker
 * @version     1.0.0
 * @author      Edi Amin <to.ediamin@gmail.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/ediamin/wp-bootstrap-comment-walker
 */
class Bootstrap_Comment_Walker extends Walker_Comment {
    /**
     * Output a comment in the HTML5 format.
     *
     * @access protected
     * @since 1.0.0
     *
     * @see wp_list_comments()
     *
     * @param object $comment Comment to display.
     * @param int    $depth   Depth of comment.
     * @param array  $args    An array of arguments.
     */
    protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>      
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent media' : 'media' ); ?>>

            
            <div class="comment-header">
                <div class="comment-avatar">
                    <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </div>
                <div class="comment-meta">
                    <div v class="comment-title">
                        <?php printf( '<p>%s</p>', get_comment_author_link() ); ?>
                    </div>
                    <div v class="comment-date">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>"><?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?></time></a>
                    </div>
                </div>
            </div>
            
            <div class="comment-body" id="div-comment-<?php comment_ID(); ?>">
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p><?php _e( 'Your comment is awaiting moderation.', 'alkaline' ); ?></p>
                <?php endif; ?>             
                <div>
                    <?php comment_text(); ?>
                </div>
            </div>
        
            <div class="comment-footer">
                <ul class="list-inline">
                    <?php edit_comment_link( __( 'Edit', 'alkaline'  ), '<li class="edit-link">', '</li>' ); ?>
                    <?php
                        comment_reply_link( array_merge( $args, array(
                            'add_below' => 'div-comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<li class="reply-link">',
                            'after'     => '</li>'
                        ) ) );  
                    ?>
                </ul>
            </div>
     
<?php
    }   
}



    function custom_theme_setup() {
        add_theme_support( 'html5', array( 'comment-list' ) );
    }
    add_action( 'after_setup_theme', 'custom_theme_setup' );