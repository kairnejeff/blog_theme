<?php get_header(); ?>
<section id="wrapper">
        <div class="container home-page-block">
            <div class="header-image">
                <?php
                 $args = array(
                    'post_type'        => 'carrousel',
                );
                $carrousel = get_posts($args);
                $acfInfo = get_field('carrousel_image', $carrousel[0]->ID);
                if( $acfInfo ): ?>
                    <div class="card">
                        <div class="content">
                            <?php echo $acfInfo['description']; ?>
                        </div>
                        <?php if( $acfInfo['media']['type'] =='image' ): ?>
                            <?php 
                            $url =str_replace("/uploads","/webp-express/webp-images/uploads",$acfInfo['media']['sizes']['large']);
                            ?>
                        <figure>
                            <picture>
                                 <source srcset="<?php echo $url.".webp"; ?>" alt="<?php echo esc_attr( $acfInfo['media']['alt'] ); ?>" type="image/webp" >
                                 <img src="<?php echo $acfInfo['media']['sizes']['large'] ; ?>" 
                                    srcset="<?php echo $acfInfo['media']['sizes']['large'] ; ?> 320w,
                                            <?php echo $acfInfo['media']['sizes']['medium'] ; ?> 300w,
                                            <?php echo $acfInfo['media']['sizes']['thumbnail'] ; ?> 150w"
                                    alt="<?php echo esc_attr( $acfInfo['media']['alt'] ); ?>" class="carousel-img"/>
                            </picture>
                        </figure>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="container home-page-block">
            <h2 class="block-title">Dernières Histoires</h2>
            <div class="kj-slide owl-carousel">
                <?php 
                    $args = array(
                        'numberposts'      => 15,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => 'post',
                    );
                    $p = get_posts($args);
                    foreach($p as  $post){
                        echo "<div class='slide-item recent-posts'>";
                        if (has_post_thumbnail( $post->ID ) ){
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'large');
                            $url =str_replace("/uploads","/webp-express/webp-images/uploads",$image[0]);
                            $webp=$url.".webp";
                            echo "<div class='slide-image-wrapper'><figure><picture>";
                            echo "<source srcset=\"$webp\"  type='image/webp'>";
                            echo "<img src='\"$image[0]\"' class='slide-img'>";
                            echo "</picture></figure></div>";
                        }
                        echo "<div class='slide-text'>";
                        echo '<a href="' . get_post_permalink( $post->ID ) . '"><h3 class="category-title">'.$post->post_title."</h3></a>";
                        
                        if ($lecture=get_field('temps_lecture', 'post_'.$post->ID)) {
                            if($lecture==1){
                                echo "<p class='post-minute font-roboto'>".$lecture." minute de lecture</p>";
                            }else{
                                echo "<p class='post-minute font-roboto'>".$lecture." minutes de lecture</p>";
                            }
                            
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
                
			</div>
		</div>
        
        
        
        <?php 
            $args = array(
                'taxonomy' => 'category',
                'hide_empty' => 0,
                'exclude' =>1
            );
            $c = get_categories($args);
            foreach($c as  $cat){
                $args=array(
                    'numberposts'=>10,
                    'category'=> $cat->term_id,
                );
                $posts= get_posts($args);
                echo "<div class=\"container home-page-block\">";
                echo "<h2 class=\"block-title\">".$cat->name."</h2>";
                echo "<div class=\"kj-slide owl-carousel\">";
                foreach($posts as  $post){
                    echo "<div class='slide-item recent-posts'>";
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
                    echo '<a href="' . get_post_permalink( $post->ID ) . '"><h3 class="category-title">'.$post->post_title."</h3></a>";
                    
                    if ($lecture=get_field('temps_lecture', 'post_'.$post->ID)) {
                        if($lecture==1){
                            echo "<p class='post-minute font-roboto'>".$lecture." minute de lecture</p>";
                        }else{
                            echo "<p class='post-minute font-roboto'>".$lecture." minutes de lecture</p>";
                        }
                        
                    }
                    echo "</div>";
                    echo "</div>";

                }
                echo "</div>";
                echo "</div>";

                // echo "<div class='slide-item category'>";
                // if ($img=get_field('categorie_image', 'category_'.$cat->term_id)) {
                //     echo "<img src=".$img['url']." class='slide-img'>";
                // }
                // echo "<div class='slide-text'>";
                // echo "<h3 class='category-title'>".'<a href="' . get_category_link( $cat->term_id ) . '">'.$cat->name."</a></h3>";
                // echo "<p class='category-description'>".$cat->category_description."</p>";
                // echo "</div>";
                // echo "</div>";
            }
        ?>
            

</section>


<?php get_footer(); ?>