<?php get_header(); ?>
<section id="wrapper">
    <div class="container">
        <div class="container">
            <div class="carrousel">
                
            </div>
        </div>
        
        <div class="container">
            <h2 class="block-title">Dernières Histoires</h2>
            <span class="show-all"><a href="">Afficher tout</a></span>
            <div class="mhn-slide owl-carousel">
                <?php 
                    $args = array(
                        'numberposts'      => 15,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'post',
                    );
                    $p = get_posts($args);
                    foreach($p as  $post){
                        echo "<div class='mhn-item recent-posts'>";
                        if (has_post_thumbnail( $post->ID ) ){
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                            echo "<img src=\"$image[0]\">";
                        }
                        echo "<div class='mhn-text'>";
                        echo "<h3 class='category-title'>".'<a href="' . get_post_permalink( $post->ID ) . '">'.$post->post_title."</a></h3>";
                        echo "<p class='post-excerpt'>".$post->post_excerpt."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
                
			</div>
		</div>
        
        
        <div class="container">
            <h2 class="block-title">Histoires par sujet</h2>
            <div class="mhn-slide owl-carousel">
                <?php 
                    $args = array(
                        'taxonomy' => 'category',
                        'hide_empty' => 0,
                        'exclude' =>1
                    );
                    $c = get_categories($args);;
                    foreach($c as  $cat){
                        echo "<div class='mhn-item category'>";
                        if ($img=get_field('categorie_image', 'category_'.$cat->term_id)) {
                            echo "<img src=".$img['url'].">";
                        }
                        echo "<div class='mhn-text'>";
                        echo "<h3 class='category-title'>".'<a href="' . get_category_link( $category->term_id ) . '">'.$cat->name."</a></h3>";
                        echo "<p class='category-description'>".$cat->category_description."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
                
			</div>
		</div>

    </div>
</section>


<?php get_footer(); ?>