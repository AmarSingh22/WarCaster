<?php
get_header();
?>
<main>
    <?php while (have_posts()) {
        the_post(); ?>
        <div class="single_post">
            <h2 class="detailed_header"><?php the_title(); ?></h2>
            <p><?php echo the_content(); ?></p>
        <?php } ?>
        </div>
</main>
<?php
get_footer();
?>