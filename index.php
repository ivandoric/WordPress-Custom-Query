<?php get_header(); ?>

	<div class="container">
        <h4 class="lesson-title">WP Custom Query - meta_query</h4>
        <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'relation' => 'OR',
                            array(
                                'key' => 'size',
                                'value' => 'l',
                                'type' => 'CHAR',
                                'compare' => '='
                            ),
                            array(
                                'key' => 'color',
                                'value' => 'green',
                                'type' => 'CHAR',
                                'compare' => '='
                            )

                        ),

                        array(
                            'key' => 'price',
                            'value' => 100,
                            'type' => 'NUMERIC',
                            'compare' => '<'
                        )
                    )
                );
                $query = new WP_Query($args);
                while($query -> have_posts()) : $query -> the_post();
        ?>
            <div class="post clearfix">
                <h5><?php the_title(); ?></h5>
                <div class="taxonomy clearfix">
                    <div class="categories">
                        <strong>Price:</strong>
                        <span class="price"><?php the_field('price') ?></span>
                    </div>
                
                    <div class="tags">
                        <strong>Size:</strong> <?php the_field('size'); ?><br>
                        <strong>Color:</strong> <?php the_field('color'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>

    
            
    
<?php get_footer(); ?>