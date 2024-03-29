<?php
get_header();
?>
<main>
    <?php while (have_posts()) {
        the_post(); ?>
        <div class="single_post">
            <h2 class="detailed_header"><?php the_title(); ?></h2>
            <div class="player">
                <img src="<?php the_post_thumbnail_url('characterPortrait'); ?>"></td>
                <div class="text_player">
                    <p>
                        <b>Player Name: </b> <?php the_field('player_name') ?><br>
                        <b>Winner Month: </b> <?php $date = get_field('contest_month');
                                            $timestamp = strtotime($date);
                                            echo date('F, Y', $timestamp)?><br>
                        <b>Character Level: </b> <?php the_field('character_level') ?><br>
                        <b>Race: </b> <?php the_field('species') ?> <br>
                        <?php 
                            $subclasses = get_field('subclass');
                            if ($subclasses) {
                                foreach ($subclasses as $subclass) {
                        ?>
                            <b>Sublass: </b> <a href="<?php echo get_the_permalink($subclass)?>"><?php echo get_the_title($subclass)?> </a><br>
                        <?php }} ?>
                    </p>
                    <p><?php echo the_content(); ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
</main>
<?php
get_footer();
?>