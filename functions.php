<?php
/*add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyninteen-style' for the Twenty Ninteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',//recupere le style de l'enfant
        get_stylesheet_directory_uri() . '/style.css',//recupere le style de l'enfant
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}*/

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 'foo_modify_query_order' );//c'est un écouteur d'événement wordpress pour le serveur. pas pour le client

function my_theme_enqueue_styles() {

$parent_style = 'twentynineteen-style'; // This is 'twentynineteen-style' for the Twenty nineteen theme.

wp_enqueue_style ( $parent_style, get_template_directory_uri() .'/style.css' );

wp_enqueue_style(
'twentynineteen-style-enfant',
get_stylesheet_directory_uri() .'/style.css',
array(),
filemtime( get_stylesheet_directory() .'/style.css' )
);
wp_enqueue_script( //s'assurer que le dernier code js est à jour et l'ajoute a wordpress
    'animation',
    get_stylesheet_directory_uri() . '/js/animation.js',
    array(),
    filemtime( get_stylesheet_directory() . '/js/animation.js' ) //précise ici d'executer la dernière version du js présent
);
}

function foo_modify_query_order( $query ) {
   // if ( $query->is_home() && $query->is_main_query() ) {
    if ( $query->is_category('cours') ) {
        $query->set( 'posts_per_page', -1 );
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
        
    }
    //}

    /*get_page_template_slug( $post_id );
    get_post(2);*/
    /*get_page_by_path('/about/', OBJECT, 'cours');
    if($page_path == "tim-111-environnement-professionnel"){

    }*/

    /*global $post;
    $post_slug=$post->post_name;
    if($post_name == "tim-111-environnement-professionnel"){
        echo "hello";
    }*/

    $slug = get_post_field( 'post_name', get_post() );
    if($slug == "tim-111-environnement-professionnel"){
        echo "hello";
    }
}
add_action( 'pre_get_posts', 'foo_modify_query_order' );



?>

<!--add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );//c'est un écouteur d'événement wordpress pour le serveur. pas pour le client

function my_theme_enqueue_styles() {

$parent_style = 'twentynineteen-style'; // This is 'twentynineteen-style' for the Twenty nineteen theme.

wp_enqueue_style ( $parent_style, get_template_directory_uri() .'/style.css' );

wp_enqueue_style(
'twentynineteen-style-enfant',
get_stylesheet_directory_uri() .'/_layout.css',
array(),
filemtime( get_stylesheet_directory() .'/_layout.css' )
);
wp_enqueue_script( //s'assurer que le dernier code js est à jour et l'ajoute a wordpress
    'animation',
    get_stylesheet_directory_uri() . '/js/animation.js',
    array(),
    filemtime( get_stylesheet_directory() . '/js/animation.js' ) //précise ici d'executer la dernière version du js présent
);
}
?>-->