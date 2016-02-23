<?php get_header(); ?>

	<div class="container">
        <h4 class="lesson-title">WP Custom Query - Ordering</h4>
        <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 20,
                    'meta_key' => 'order',
                    'orderby' => 'meta_value',
                    'order' => 'ASC'
                );
                $query = new WP_Query($args);
                while($query -> have_posts()) : $query -> the_post();
        ?>
            <h5><?php the_title(); ?></h5>
        <?php endwhile; wp_reset_query(); ?>
    </div>

    
            
    
<?php get_footer(); ?>