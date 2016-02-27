<?php get_header(); ?>

	<div class="container">
        <h4 class="lesson-title">WP Custom Query - Taxonomy</h4>
        <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'tag_slug__in' => array('craft','sass')
                );
                $query = new WP_Query($args);
                while($query -> have_posts()) : $query -> the_post();
        ?>
            <div class="post clearfix">
                <h5><?php the_title(); ?></h5>
                <div class="taxonomy clearfix">
                    <div class="categories">
                        <strong>Categories:</strong>
                        <?php the_category() ?>
                    </div>
                
                    <div class="tags">
                        <?php the_tags(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>

    
            
    
<?php get_footer(); ?>