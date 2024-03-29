<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">
	<header class="entry-header has-text-align-center header-footer-group">

		<div class="entry-header-inner section-inner medium">
			<h1 class="entry-title">War Caster's Guidebook</h1>
		</div>

	</header>

	<figure class="featured-media">

		<div class="featured-media-inner section-inner">

			<img width="800" src="<?php echo get_theme_file_uri('/assets/images/d20.jpg') ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async" fetchpriority="high">
		</div>

	</figure>

	<div class="post-inner thin ">
		<div class="entry-content">
			<div class="wp-block-group alignwide">
				<div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
					<h2 class="has-text-align-center wp-block-heading">Last 4 months winner. Please Congratulate them</h2>
				</div>
			</div>
			<div class="wp-block-group alignwide">
				<?php

				$pastwinners = new WP_Query(array(
					'posts_per_page' => 4,
					'post_type' => 'winners',
					'meta_key' => 'contest_month',
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
					'meta_query' => array(
						array(
							'key' => 'contest_month',
							'compare' => '<=',
							'value' => date('Ymd'),
							'type' => 'numeric'
						)
					)
				));


				if ($pastwinners->have_posts()) {

					while ($pastwinners->have_posts()) {

						$pastwinners->the_post();
				?>
						<li class="character-card__list-item">
							<a class="character-card" href="<?php the_permalink(); ?>">
								<img class="character-card__image" src="<?php the_post_thumbnail_url('characterPortrait'); ?>">
								<span class="character-card__name"> <?php the_title(); ?></span>
							</a>
						</li>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>

	<figure class="wp-block-image alignfull size-full">
		<img decoding="async" src="<?php echo get_theme_file_uri('/assets/images/DnDBanner.webp') ?>" alt="" class="wp-image-37">
	</figure>

	<div class="wp-block-group alignwide">
		<div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
			<h2 class="has-accent-color has-text-align-center wp-block-heading">“But Why Homebrew....”</h2>
		</div>
	</div>
	<div class="wp-block-group alignwide">
		<p class="has-drop-cap">Incorporating homebrew content into Dungeons & Dragons (D&D) campaigns can enrich gameplay experiences in various ways. Firstly, it allows players and Dungeon Masters (DMs) to unleash their creativity, fostering a sense of ownership and investment in the game world. Homebrew content enables customization, tailoring adventures to suit the preferences and playstyles of participants, thereby enhancing immersion and enjoyment. Additionally, homebrew elements inject freshness and unpredictability into familiar settings, keeping gameplay engaging and challenging even for seasoned players. It encourages collaborative storytelling, where players and DMs can collaboratively shape the narrative, leading to memorable moments and unique character arcs. Ultimately, the use of homebrew content in D&D offers limitless possibilities, promoting exploration, innovation, and personalization within the game universe.</p>
	</div>
</main>

<?php
get_footer();
