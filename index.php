<?php get_header(); ?>
    
    <?php 
        if($_GET['minprice'] && !empty($_GET['minprice']))
        {
            $minprice = $_GET['minprice'];
        } else {
            $minprice = 0;
        }

        if($_GET['maxprice'] && !empty($_GET['maxprice']))
        {
            $maxprice = $_GET['maxprice'];
        } else {
            $maxprice = 999999;
        }

        if($_GET['size'] && !empty($_GET['size']))
        {
            $size = $_GET['size'];
        }

        if($_GET['color'] && !empty($_GET['color']))
        {
            $color = $_GET['color'];
        }
    ?>


	<div class="container">
        <h4 class="lesson-title">WP Custom Query - Custom Filters</h4>
        <form action="/" method="get">
            <label>min:</label>
            <input type="number" name="minprice" value="<?php echo $minprice; ?>">
            <label>max:</label>
            <input type="number" name="maxprice" value="<?php echo $maxprice; ?>">

            <label>Size:</label>
            <select name="size">
                <option value="">Any</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>                
            </select>

            <label>Color:</label>
            <select name="color">
                <option value="">Any</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="purple">Purple</option>
                <option value="black">Black</option>                      
            </select>
            <button type="submit" name="">Filter</button>
        </form>
        <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'price',
                            'type' => 'NUMERIC',
                            'value' => array($minprice, $maxprice),
                            'compare' => 'BETWEEN'
                        ),

                        array(
                            'key' => 'size',
                            'value' => $size,
                            'compare' => 'LIKE'
                        ),

                        array(
                            'key' => 'color',
                            'value' => $color,
                            'compare' => 'LIKE'
                        )
                    )
                );
                $query = new WP_Query($args);
                while($query -> have_posts()) : $query -> the_post();
        ?>
            <div class="post clearfix">
                <h5><?php the_title(); ?></h5>
                <div class="taxonomy clearfix">
                    <div class="price categories">
                        <strong>Price:</strong>
                        <?php the_field('price'); ?>
                    </div>
                
                    <div class="tags">
                        <strong>Color:</strong> <?php the_field('color'); ?><br>
                        <strong>Size:</strong> <?php the_field('size'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>

    
            
    
<?php get_footer(); ?>