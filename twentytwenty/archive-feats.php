<?php
get_header();
?>

<header class="archive-header has-text-align-center header-footer-group">

    <div class="archive-header-inner section-inner medium">
        <h1 class="archive-title">Feats</h1>
    </div><!-- .archive-header-inner -->

</header><!-- .archive-header -->
<div>
<ul>
    <?php
    $query = new WP_Query(array(
        'post_type' => 'feats', 
        'posts_per_page' => -1,    
        'orderby' => 'title',
        'order' => 'ASC',
    ));


    while ($query->have_posts()) {
        $query->the_post();
    ?>
        <a class="feat" href='<?php the_permalink(); ?>'><li> <?php the_title(); ?></li> </a>
    <?php
    wp_reset_postdata();
    }
    ?>
</ul>
</div>
<?php
get_footer();
?>
