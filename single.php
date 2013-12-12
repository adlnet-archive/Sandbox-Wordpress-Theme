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
	
		<?php
			ob_start(); 
			previous_post_link('%link', '<  %title', true); 
			$previous = ob_get_contents();
			ob_clean();
			next_post_link('%link', '%title  >', true); 
			$next = ob_get_contents();
			ob_end_clean();
		?>
		<div class="navContainer">
			<div class="previousLink">
				<?php echo $previous ? $previous : ''; ?>
			</div>
			<div class="nextLink">
			<?php	echo $next ? $next : ''; ?>
			</div>
		</div>

		<h1><?php echo the_title(); ?></h1>
		


		<div class="the_post"><?php echo the_content(); ?></div>

	<?php endwhile; // end of the loop. ?>

</div>
<div class="content container">	
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>