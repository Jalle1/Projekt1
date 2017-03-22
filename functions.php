<?php

function theme_scripts(){
    wp_enqueue_style( 'bootstrap' , get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style( 'font-awesome' , get_template_directory_uri().'/css/font-awesome.css');
    wp_enqueue_style( 'extra' , get_template_directory_uri().'/css/extra.css');

    wp_enqueue_script( 'owl' , get_template_directory_uri().'/js/owl.carousel.js' , array('jquery') , null , true );
    wp_enqueue_script( 'script' , get_template_directory_uri().'/js/script.js' , array('jquery') , null , true );
}

function register_my_menu(){
    register_nav_menu( "huvudmeny" , "Huvudmeny" );
    register_nav_menu( "footermeny" , "Footermeny" );
    register_nav_menu( "sidomeny" , "Sidomeny" );
}

add_action( 'after_setup_theme' , 'register_my_menu' );

function register_my_sidebars(){
    register_sidebar(array(
        'name' => 'Min Sidebar',
        'id' => 'my-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'footer',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer två',
        'id' => 'footer-2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer tre',
        'id' => 'footer-3',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

add_action( 'widgets_init' , 'register_my_sidebars' );

add_theme_support('post-thumbnails');

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page();
}

# Lista alla undersidor till en sida

function list_sub_pages(){
    global $post;

    if ( !empty($post->post_parent) ) {
        $id = $post->post_parent;
    }
    else {
        $id = get_the_ID();
    }

    $sub_pages = get_posts(array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_parent' => $id
    ));

    echo '<ul class="side-menu">';
    foreach ( $sub_pages as $sub_page ) {


        echo '<li>';
        echo '<a href="'.get_permalink($sub_page->ID).'">';
        echo $sub_page->post_title;
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
}

/* breadcrumbs */

function breadcrumbs()
{
    global $post;

    $separator = " / ";
    $home = "Hem";

    echo '<ul class="breadcrumbs">';

    echo '<li>Du är här: </li>';

    if (is_front_page()) {
        echo '<li>' . $home . '</li>';
    } else {
        echo '<li><a href="' . get_site_url() . '">' . $home . '</a></li>';
    }

    if (is_home() || is_single()) {
        echo '<li>' . $separator . '</li>';
        if (is_home()) {
            echo '<li>Blogg</li>';
        } else {
            echo '<li><a href="">Blogg</a></li>';
            echo '<li>' . $separator . '</li>';
            echo '<li>' . $post->post_title . '</li>';
        }
    }

    if (is_page() && !is_front_page()) {
        echo '<li>' . $separator . '</li>';
        if (!empty($post->post_parent)) {
            echo '<li>';
            echo '<a href="' . get_permalink($post->post_parent) . '">';
            echo get_the_title($post->post_parent);
            echo '</a>';
            echo '</li>';
            echo '<li>' . $separator . '</li>';
        }
        echo '<li>' . $post->post_title . '</li>';
    }

    if (is_author()) {
        echo '<li>' . $separator . '</li>';
        echo '<li>Författare</li>';
        echo '<li>' . $separator . '</li>';
        echo '<li>' . get_the_author("display_name") . '</li>';
    }

    if (is_category()) {
        echo '<li>' . $separator . '</li>';
        echo '<li>Kategori</li>';
        echo '<li>' . $separator . '</li>';
        echo '<li>';
        single_cat_title();
        echo '</li>';
    }

    if (is_archive() && !is_author() && !is_category()) {
        echo '<li>' . $separator . '</li>';
        echo '<li>Arkiv</li>';
        echo '<li>' . $separator . '</li>';
        single_month_title(" ");
    }

    if (is_search()) {
        echo '<li>' . $separator . '</li>';
        echo '<li>Sökresultat</li>';
    }

    echo '</ul>';
}

function menu_loop () { 
    echo    '<div class="entry-content dishes">';

        if( have_rows('menu_sections') ):
 
         
            while ( have_rows('menu_sections') ) : the_row();
 
            
                echo '<h2>' . get_sub_field('section_title') . '</h2>';


                if ( have_rows('sections_items'));?>
 
                    <table>
 
                            <thead>
                                <tr class="tr">
                                    <td class="ja_name">Name</td>
                                    <td class="ja_description">Description</td>
                                    <td class="ja_price">Price</td>
                                </tr>
                            </thead>  
 
                        <?php while (have_rows('section_items') ): the_row(); ?>

                            <tr>
                                <td><?php the_sub_field('dish_name'); ?></td>
                                <td><?php the_sub_field('dish_desctription'); ?></td>
                                <td>Kr <?php the_sub_field('dish_price'); ?></td>
                            </tr>
 
                        <?php endwhile;?>
 
                    </table> <?php 
            
            endwhile;
 
         else : 
 
        endif; ?></div><?php
}

add_action('full_width_content', 'do_full_width_content');

add_filter('body_class', 'add_full_width_body_class');

function add_full_width_body_class($classes) {


    $classes[] = 'full-width-template';

    return $classes;
}

add_theme_support('genesis_structural_wraps' ,array ('header' , 'footer_widgets', 'footer' , 'nav' , 'subnav')
    );

function do_full_width_content(){

?>

<main>

<?php if ( have_rows('section') ) : ?>

   <?php while ( have_rows('section') ) : the_row(); ?>

        <?php if ( get_row_layout() == 'hero' ): ?>

            <section>
                
                <div class="hero" style="background-image: url('<?php the_sub_field("hero-image"); ?>');">
                    
                    <div class="cta_container">
                    
                        <div class="cta_content">
                    
                            <div class="cta_content wrap">

                                <?php the_sub_field('hero-text'); ?>

                                <?php 

                                    $selected = get_sub_field('display-cta-button');

                                        if( in_array ( true , [$selected] ) ) {
                                ?>
                    
                                    <button><a class="button" href="<?php the_sub_field('hero-cta-url') ?>"
                                    ><?php the_sub_field('hero_button_text'); ?></a></button>
                                    <?php 
                                    }
                                    else{ ?>
                                        <!-- No content --> <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

            <?php if ( get_row_layout() == 'text-image' ): ?>

                <section>
                    <div class="container text-image">
                    
                        <div class="col-xs-12 col-md-6 col-lg-6 text-left <?php the_sub_field('css_class')?>"><?php the_sub_field('left_text'); ?></div>
                        
                        <div class="image_right col-xs-12 col-md-6 col-lg-6"><img src="<?php the_sub_field('right_image') ?>"/></div>
                        
                    </div>
                    
                </section>

            <?php endif; ?>

            <?php if ( get_row_layout() == 'image-text' ): ?>

                <section>
                    <div class="container image-text">
                        
                        <div class="col-xs-12 col-md-6 col-lg-6 image_left"><img src="<?php the_sub_field('left_image') ?>"/></div>
                            
                        <div class="col-xs-12 col-md-6 col-lg-6 text-right <?php the_sub_field('css_class')?>"><?php the_sub_field('right_text'); ?></div>
                            
                    </div>
                    
                </section>

            <?php endif; ?>

    <?php endwhile; ?>
<?php endif;?>

</main>


<?php
}
