<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>" style="margin-bottom: 30px;">

<div class="p-head">
<h1><?php the_title(); ?></h1>
<p class="p-cat">In: <?php the_category('|') ?></p>
<small class="p-time">
<strong class="day"><?php the_time('j') ?></strong>
<strong class="month"><?php the_time('M') ?></strong>
<strong class="year"><?php the_time('Y') ?></strong>
</small>
</div>

<div class="p-con">
<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php wp_link_pages(); ?>
<?php edit_post_link('Edit this entry.', '<p class="edit">', '</p>'); ?>
</div>

 <?php if (function_exists('the_tags')) { ?> <?php the_tags('<div class="p-det"><ul><li class="p-det-tag">Tags: ', ', ', '</li></ul></div>'); ?> <?php } ?>



</div>	


<?php comments_template(); ?>
				
<?php endwhile; ?>
<?php include("nav.php"); ?>
<?php else : ?>

<?php include("404.php"); ?>
<?php endif; ?>

<?php get_footer(); ?>