<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 

?>
<div class="content container">	
	<?php
	
		$arr = get_categories();
		$category = get_the_category($wp_query->post->ID);
		$newArr = array();

		foreach($arr as $single){
			if($single->cat_ID == $category[0]->cat_ID){
				array_push($newArr, -1);
			}
			else if($single->parent == $category[0]->parent && $single->parent > 0){
				$single->link = get_category_link($single->cat_ID);
				array_push($newArr, $single);
			}
		}
		
		for($i = 0; $i < count($newArr); $i++){
			if($newArr[$i] == -1){
				
				if($i == 0){
					if($category[0]->parent > 0){
						$prevCat = get_category($category[0]->parent);
						$prevCat->link = $prevCat->parent > 0 ? get_category_link($prevCat->cat_ID) : get_permalink(get_page_by_title($prevCat->name));
					}
					else{
						$prevCat = $category[0];
						$prevCat->link = get_permalink(get_page_by_title($prevCat->name));
					}
				}
				
				else{
					$prevCat = $newArr[$i-1];
				}
				
				if($i + 1 >= count($newArr)){
					if($category[0]->parent > 0){
						
						$nextCat = get_category($category[0]->parent);
						$nextCat->link = get_category_link($nextCat->cat_ID);
					}
					else{
						
						$nextCat = $category[0];
						$nextCat->link = get_permalink(get_page_by_title($nextCat->name));
					}
				}
				
				else{
					$nextCat = $newArr[$i+1];
				}
				
				break;
			}
		}
		
		
	?>
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
				<?php echo $previous ? $previous : '<a href="'.$prevCat->link.'">&lt; '.$prevCat->name.'</a>'; ?>
			</div>
			<div class="nextLink">
			<?php echo $next ? $next : '<a href="'.$nextCat->link.'">'.$nextCat->name.' &gt;</a>'; ?>
			</div>
		</div>

		<h1><?php echo the_title(); ?></h1>
		


		<div class="the_post"><?php echo the_content(); ?></div>

	<?php endwhile; // end of the loop. ?>
	<?php echo posts_nav_link( "---", "pre", "Next" ); ?> 
</div>
<div class="content container">	
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>