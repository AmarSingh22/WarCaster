<?php
get_header();
?>

<header class="archive-header has-text-align-center header-footer-group">

    <div class="archive-header-inner section-inner medium">
        <h1 class="archive-title">Winners</h1>
    </div><!-- .archive-header-inner -->

</header><!-- .archive-header -->
<div>
    <ul>
        <?php
        $query = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'winners',
            'meta_key' => 'contest_month',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        ));


        while ($query->have_posts()) {
            $query->the_post();
        ?>
            <li class="character-card__list-item">
                <a class="character-card" href="<?php the_permalink(); ?>">
                    <img class="character-card__image" src="<?php the_post_thumbnail_url('characterPortrait'); ?>">
                    <span class="character-card__name"> <?php the_title(); ?></span>
                </a>
            </li>
        <?php
            wp_reset_postdata();
        }
        ?>
    </ul>
    <?php
    get_footer();
    ?>