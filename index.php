<?php get_header(); ?>

	<div class="container">
        <h4 class="lesson-title">WP Custom Query - Basics</h4>
    
        <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1
            );

            $query = new WP_Query($args);

            while($query->have_posts()) : $query->the_post();
            $dontshowthisguy = $post->ID;
        ?>
            <div class="featured">
                <h5><?php the_title(); ?></h5>
            </div>

        <?php endwhile; wp_reset_query();  ?>

        <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'post__not_in' => array($dontshowthisguy)
            );

            $query = new WP_Query($args);

            while($query->have_posts()) : $query->the_post();
        ?>
            
            <p><?php the_title(); ?></p>
            

        <?php endwhile; wp_reset_query();  ?>
    </div>

    
            
    
<?php get_footer(); ?>