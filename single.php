<?php global $post; ?>
<?php get_header(); ?>
<main id="content">
<section id="main" class="page">
    <div class="container">
        <div class="header-image">
            <h1 class='page-title'><?php echo $post->post_title ;?></h1>
            <?php 
            if (has_post_thumbnail( $post->ID ) ){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                $url =str_replace("/uploads","/webp-express/webp-images/uploads",$image[0]);
                $webp=$url.".webp";
                echo "<div class='slide-image-wrapper'><figure><picture>";
                echo "<source srcset=\"$webp\"  type='image/webp'>";
                echo "<img src='\"$image[0]\"' class='slide-img'>";
                echo "</picture></figure></div>";
            }
            ?>
        
        </div>
    </div>

    <div class="container content">
        <?php echo $post->post_content ?>
    </div>

    
    <div class="container home-page-block">
    
        <h2 class="block-title">Histoires Liées</h2>
        <div class="related-histories kj-slide owl-carousel">
        <?php 
        $histories= get_field('histoires_liees');
        if( $histories ): ?>
        <?php foreach( $histories as $history ):  ?>
            
        <div class="related-history slide-item recent-posts">
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $history->ID ), 'large' );?>
            <?php
                $url =str_replace("/uploads","/webp-express/webp-images/uploads",$image[0]);
                $webp=$url.".webp";
                echo "<div class='slide-image-wrapper'><figure><picture>";
                echo "<source srcset=\"$webp\"  type='image/webp'>";
                echo "<img src='\"$image[0]\"' class='slide-img'>";
                echo "</picture></figure></div>";
            ?>
            <div class="slide-text">
                <a href="<?php echo get_post_permalink( $history->ID ); ?>"> 
                    <h3 class='category-title'>
                    <?php echo $history->post_title; ?>
                    </h3>
                </a>
            <?php
                if ($lecture=get_field('temps_lecture', 'post_'.$history->ID)) {
                    if($lecture==1){
                        echo "<p class='post-minute font-roboto'>".$lecture." minute de lecture</p>";
                    }else{
                        echo "<p class='post-minute font-roboto'>".$lecture." minutes de lecture</p>";
                    }
                    
                }
            ?>
            </div>
        </div>
        <?php endforeach; ?>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>
        </div>
    </div>

</section>
</main>
<?php get_footer(); ?>