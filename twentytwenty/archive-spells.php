<?php
get_header();
?>

<header class="archive-header has-text-align-center header-footer-group">

    <div class="archive-header-inner section-inner medium">
        <h1 class="archive-title">Spells</h1>
    </div><!-- .archive-header-inner -->

</header><!-- .archive-header -->
<main class="container">
    <div class="content">
    <ul>
        <?php
        $schools = new WP_Query(array(
            'post_type' => 'spells',
            'posts_per_page' => -1,
            'groupby' => 'meta_value',
            'orderby' => array(
                'meta_value' => 'ASC',
                'spell_level' => 'DESC',
            ),
            'meta_key'  => 'school',
            'meta_query' => array(
                array(
                    'key' => 'school',
                    'compare' => 'EXISTS',
                ),
            ),
        ));

        $prev_group_value = '';


        while ($schools->have_posts()) {
            $schools->the_post();

            $group_value = get_post_meta(get_the_ID(), 'school', true);
            if ($group_value !== $prev_group_value) {
                echo '<hr></ul><h2 class="category_title" id="' . $group_value . '">' . $group_value . '</h2><ul>';
            }
        ?>
            <a href='<?php the_permalink(); ?>'>
                <li> <?php the_title(); ?></li>
            </a>
        <?php
            $prev_group_value = $group_value;
            wp_reset_postdata();
        }
        ?>
    </ul>
    </div>
    <div class="sidenav">
        <?php
        $values_query = new WP_Query(array(
            'post_type' => 'spells',
            'posts_per_page' => -1,
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'school',
                    'compare' => 'EXISTS',
                ),
            ),
            'fields' => 'ids',
            'groupby' => 'meta_value',
        ));

        $unique_values = array();

        if ($values_query->have_posts()) :
            while ($values_query->have_posts()) : $values_query->the_post();
                $field_value = get_post_meta(get_the_ID(), 'school', true);
                if (!in_array($field_value, $unique_values)) {
                    $unique_values[] = $field_value;
                }
            endwhile;
            wp_reset_postdata();
        endif;


        foreach ($unique_values as $value) {
            echo '<a href="#' . $value . '"><h5>' . $value . '</h5></a>';
        }
        ?>

    </div>
</main>
<?php
get_footer();
?>