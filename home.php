<?php get_header(); ?>
<section id="wrapper">
    <div class="container">
        <div class="container">
            <div class="carrousel">
                
            </div>
        </div>
        
        <!-- <div class="last-stories">
            <h2 class="block-title">Dernières histories</h2>
             <div class="card-group last-stories owl-carousel owl-theme">
                 <?php
                    $categories = get_categories(); 
                    foreach($categories as $category){
                        
                    }
                 ?>
                <div class="card story owl-item">
                    <img class="card-img-top" src=" " alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">story title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card story owl-item">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card story owl-item">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card story owl-item">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                
                <div class="card show-all">
                    <h5 class="card-title">
                        <a href="<?php ?>">Afficher tout</a>
                    </h5>
                </div>
                <div class="owl-nav">
                    <button type="button" role="presentation" class="owl-prev">
                        <i class="material-icons"></i>
                    </button>
                    <button type="button" role="presentation" class="owl-next disabled">
                         <i class="material-icons"></i>
                    </button>
                </div>
             </div>
        </div> -->
        
        
        <div class="container">
            <h2 class="block-title">Histoires par sujet</h2>
            <div class="mhn-slide owl-carousel">
            <?php 
                $args = array(
                    'taxonomy' => 'category',
                    'hide_empty' => 0
                );
                $c = get_categories($args);
                foreach($c as  $cat){
                    echo "<div class='mhn-item'>";
                    if (get_field('categorie_image', 'category_'.$cat->term_id)) {
                        echo "<img src=".get_field('categorie_image', 'category_'.$cat->term_id).">";
                    }
                    echo "<div class='mhn-text'>";
                    echo "<p>".$cat->category_description."</p>";
                    echo "</div>";
                }
            ?>
			
			</div>
		</div>

    </div>
</section>


<?php get_footer(); ?>