<?php get_header(); ?>

<main>
	<section id="head">
		<h1><span>オリジナル特集</span>オリジナル特集</h1>
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
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="single__thumbnail">
				<?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
			</div>
		<?php endif; ?>
		<?php the_content(); ?>
	</section>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>