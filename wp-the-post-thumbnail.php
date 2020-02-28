<?php

// Post Thumbnails
// https://developer.wordpress.org/reference/functions/the_post_thumbnail/

// in functions.php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails' ['post','page','produse','books'] );

// Thumbnails Tags:

has_post_thumbnail();
the_post_thumbnail();
get_the_post_thumbnail();
get_post_thumbnail_id();


// Verifica daca este setata
if( has_post_thumbnail() ) : 
	the_post_thumbnail();
endif; 


// Add custom class and title
// the_post_thumbnail( $size, $attr );

$attr = [
	'class' => 'img-class featured-image',
	'title' => get_the_title(),
];
the_post_thumbnail( 'full-size', $attr );


//Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)
 
//With WooCommerce
the_post_thumbnail( 'shop_thumbnail' ); // Shop thumbnail (180 x 180 hard cropped)
the_post_thumbnail( 'shop_catalog' );   // Shop catalog (300 x 300 hard cropped)
the_post_thumbnail( 'shop_single' );    // Shop single (600 x 600 hard cropped)

?>

<?php // Post Thumbnail Linking to the Post Permalink ?>

<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>
<?php endif; ?>


<?php
/*
Styling Post Thumbnails

Post Thumbnails are given a class “wp-post-image” and also get a class depending on the size of the thumbnail being displayed. You can style the output with these CSS selectors:

img.wp-post-image
img.attachment-thumbnail
img.attachment-medium
img.attachment-large
img.attachment-full

*/
	
// You can also give Post Thumbnails their own class.
// Display the Post Thumbnail with a class “alignleft”:
the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );


/*

Add custom image size
Register a new image size.

add_image_size( string $name, int $width, int $height, bool|array $crop = false )

Parameters

$name
    (string) (Required) Image size identifier.

$width
    (int) (Optional) Image width in pixels. Default 0.

$height
    (int) (Optional) Image height in pixels. Default 0.

$crop

    (bool|array) (Optional) Image cropping behavior. If false, the image will be scaled (default), If true, image will be cropped to the specified dimensions using center positions. If an array, the image will be cropped using the array to specify the crop location. Array values must be in the format: array( x_crop_position, y_crop_position ) where: - x_crop_position accepts: 'left', 'center', or 'right'. - y_crop_position accepts: 'top', 'center', or 'bottom'.
    Default value: false

*/

add_image_size( $name, $width, $height, $crop );

// Crop Mode
// Set the image size by resizing the image proportionally (without distorting it):

add_image_size( 'custom-size', 220, 180 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode

// Set the image size by cropping the image (not showing part of it):
add_image_size( 'custom-size', 220, 180, true ); // 220 pixels wide by 180 pixels tall, hard crop mode

// Set the image size by cropping the image and defining a crop position:
add_image_size( 'custom-size', 220, 220, array( 'left', 'top' ) ); // Hard crop left top

// Guide to Cropping Thumbnails in WordPress
// @ https://havecamerawilltravel.com/photographer/wordpress-thumbnail-crop/

// How to use:
if ( has_post_thumbnail() ) { 
    the_post_thumbnail( 'custom-size' ); 
}