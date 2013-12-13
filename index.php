<?php
/**
 * The Template for the index
 *
 */

get_header(); 
$offset = 0;
$per_page = 5;
if(is_numeric($_GET['paged']) && $_GET['paged'] > 0){
	$offset = $per_page * ((int)$_GET['paged'] - 1);
}

$currentArr = array(
	'category' => 4,
	'show'=>'category_name,post_title',
	'links'=> 'post_title,subcategory_name,category_name',
	'hide_empty'=>true,
	'order'=>'asc');

$args = array(
	'posts_per_page'   => $per_page,
	'offset'           => $offset,
	'category'         => '',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true );
$posts_array = get_posts( $args );
?>				
<div class="content container">			
	<div class="row">
		<div class="col-md-9">
			<?php foreach($posts_array as $post): setup_postdata( $post ); $time = get_the_date('U'); ?>
			
				<div class="post_preview">
					<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
					<div class="post_date">
						<?php echo date('F d, Y', $time); ?>
					</div>
					<p><?php the_excerpt(); ?></p>
				</div>
			<?php endforeach; ?>
			
			<?php if($offset > 0): ?>
				<button class="btn btn-default">
					<?php  previous_posts_link('< Previous Posts'); ?>
				</button>
			<?php endif; ?>
			
			<?php if($wp_query->found_posts > 0): ?>
				<button class="btn btn-default">
					<?php next_posts_link( 'Next Posts >', ceil($wp_query->found_posts / $per_page) ); ?>
				</button>
			<?php endif; ?>
		</div>
		<div class="col-md-3">
			<?php echo pcig_index_generator($currentArr); ?>
		</div>
	</div>

</div><!-- #container -->
<div class="content container">	
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>