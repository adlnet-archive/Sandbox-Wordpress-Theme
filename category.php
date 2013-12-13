<?php
get_header(); 

$category = get_term_by('name', single_cat_title('', false), 'category');

$currentArr = array(
	'category' => $category->slug,
	'show'=>'category_name,post_title',
	'links'=>'post_title',
	'hide_empty'=>true,
	'order'=>'asc');


?>

<div class="content container">	
	<h1><?php echo single_cat_title( '', false ); ?> Index</h1>

	<div class="index_container">
		<?php echo pcig_index_generator($currentArr); ?>
	</div>
</div><!-- #content -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>