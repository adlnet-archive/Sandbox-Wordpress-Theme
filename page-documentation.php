<?php
/**
 * The Template for the index
 *
 */
$doc_category = get_term_by('name', 'documentation', 'category');
$arr = get_categories(array('child_of' => $doc_category->term_id));
 

get_header();
?>				

<div class="content container">			
	<div class="row">
		<div class="col-md-12" style="float:none;margin:20px auto;">
			<h1>ADL Sandbox Documentation</h1>
		</div>
	</div>		
	
	<div class="row" style="margin: 20px 0 40px 0;">
		<?php foreach($arr as $cat): ?>
			<div class="col-md-4" style="text-align:center;">
				
				<h2><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></h2>
				<p><?php echo $cat->category_description ? $cat->category_description : 'Description not found'; ?></p>
				<a href="<?php echo get_category_link($cat->term_id); ?>" class="btn btn-primary">View <?php echo $cat->name; ?></a>
			</div>
		<?php endforeach; ?>
	</div>

</div><!-- #container -->
<div class="content container">	
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>