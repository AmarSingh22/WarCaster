<?php
get_header();
?>
<main>
    <?php while (have_posts()) {
        the_post(); ?>
        <div class="single_post">
            <h2 class="detailed_header"><?php the_title(); ?></h2>
            <?php $associated_spells = get_field('associated_spells');
            if ($associated_spells) { ?>
                <table cellspacing="0" cellpadding="0">
                    <thead>
                        <th>Spell Name</th>
                        <th>Spell School</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($associated_spells as $spell) {
                        ?>
                            <tr>
                                <td><a href="<?php echo get_the_permalink($spell)?>"><?php echo get_the_title($spell); ?> </a></td>
                                <td><?php echo get_field('school', $spell->ID); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php  } ?>
            <p><?php echo the_content(); ?></p>
        </div>
    <?php  } ?>

</main>
<?php
get_footer();
?>