<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="content container">	
	<?php while ( have_posts() ) : the_post(); ?>

		<h1><?php echo the_title(); ?></h1>

		<div class="the_post"><?php echo the_content(); ?></div>

	<?php endwhile; // end of the loop. ?>

</div>
<div class="content container">	
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>