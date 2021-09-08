<?php get_header(); ?>

<section id="wrapper">

<div class="container home-page-block category-blog">


<?php

$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
$title = get_cat_name($category_id);

$args=array(
    'category'=>$category_id,
);
$posts= get_posts($args);

echo "<h1> $title </h1>";

echo "<div class=\"kj-slide owl-carousel\">";

foreach($posts as  $post){
    echo "<div class='slide-item recent-posts'>";
    echo '<a href="' . get_post_permalink( $post->ID ) . '">';
    if (has_post_thumbnail( $post->ID ) ){
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $url =str_replace("/uploads","/webp-express/webp-images/uploads",$image[0]);
        $webp=$url.".webp";
        echo "<div class='slide-image-wrapper'><figure><picture>";
        echo "<source srcset=\"$webp\"  type='image/webp'>";
        echo "<img src='\"$image[0]\"' class='slide-img'>";
        echo "</picture></figure></div>";
    }
    echo "<div class='slide-text'>";
    echo '<h3 class="category-title">'.$post->post_title."</h3>";
    
    if ($lecture=get_field('temps_lecture', 'post_'.$post->ID)) {
        if($lecture==1){
            echo "<p class='post-minute font-roboto'>".$lecture." minute de lecture</p>";
        }else{
            echo "<p class='post-minute font-roboto'>".$lecture." minutes de lecture</p>";
        }
        
    }
    echo "</div>";
    echo "</a></div>";

}

echo "</div>";

		
?>

</div>

</section>

<?php get_footer(); ?>
