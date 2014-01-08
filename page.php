<?php
/**
 * The Template for the index
 *
 */
get_header(); 

$offset = 0;
$per_page = 5;
$blog = get_term_by('slug', 'blog', 'category');

if(is_numeric($_GET['paged']) && $_GET['paged'] > 0){
	$offset = $per_page * ((int)$_GET['paged'] - 1);
}

/*$currentArr = array(
	'category' => 4,
	'show'=>'category_name,post_title',
	'links'=> 'post_title,subcategory_name,category_name',
	'hide_empty'=>true,
	'order'=>'asc');*/

$args = array(
	'posts_per_page'   => -1,
	'offset'           =>  0,
	'category'         => $blog->term_id,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true );
$posts_array = get_posts( $args );
?>				

<div class="content container">			
	<div class="row">
		<div class="col-md-8" style="float:none;margin:20px auto;">
			<?php 
				for($i = $offset; $i < sizeof($posts_array) && $i < $offset + $per_page; $i++):
					$post = $posts_array[$i]; 
					setup_postdata( $post ); 
					$time = get_the_date('U'); 
					$excerpt = get_the_excerpt();
				?>
			
				<div class="post_preview">
					<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
					<div class="post_date">
						<?php echo date('F d, Y', $time); ?>
					</div>
					<div style="margin:20px 0;">
						<?php the_excerpt(); ?>
					</div>
					<?php if(strlen($excerpt) > 100): ?>
						<a href="<?php the_permalink(); ?>" style="text-align:right;float:right;margin:10px 0;">Read More</a>
					<?php endif; ?>
				</div>
			<?php endfor; ?>
			
			<?php if($offset > 0): ?>
				<button class="btn btn-default" style="margin:20px 0;">
					<?php  previous_posts_link('< Previous Posts'); ?>
				</button>
			<?php endif; ?>
			
			<?php if(sizeof($posts_array) > $offset + $per_page): ?>
				<button class="btn btn-default" style="float:right;margin:20px 0;">
					<?php next_posts_link( 'Next Posts >', ceil(sizeof($posts_array)/$per_page) ); ?>
				</button>
			<?php endif; ?>
		</div>
	</div>

</div><!-- #container -->
<div class="content container">	
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>