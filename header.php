<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
    <?php wp_head(); ?>


    <meta name="viewport" content="width=device-width">
</head>
<body <?php body_class(); ?>>
<div class="search-site">
    <form action="/search" method="get">
        <input type="text" name="search_text">
        <label>Type:</label>
        <select name="type">
            <option value="">Any</option>
            <option value="post">Posts</option>
            <option value="movies">Movies</option>
            <option value="books">Books</option>                
        </select>
        <button type="submit" name="">Search</button>
    </form>
</div>
        
        

        
     	
       
