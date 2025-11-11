<?php get_header(); ?>

<main>
	<section id="head">
		<h1><span>NEWS</span>NEWS</h1>
	</section>

	<?php if ( have_posts() ) : ?>
		<?php while(have_posts()): the_post(); ?>
	<section id="contents">
		<h2 class="title">
			<?php
				$title = get_the_title();
				$title = str_replace(" ", "<br>", $title);
				echo $title;
			?>
		</h2>
		<?php the_content(); ?>
	</section>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>