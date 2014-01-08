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
						$prevCat->link = $prevCat->parent > 0 ? get_category_link($prevCat->cat_ID) : get_permalink(get_page_by_title($prevCat->slug));
					}
					else{
						$prevCat = $category[0];
						$prevCat->link = get_permalink(get_page_by_title($prevCat->slug));
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
						$nextCat->link = get_permalink(get_page_by_title($nextCat->slug));
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

		
		<?php if($category[0]->slug == "videos"): ?>
			<h1><?php echo the_title(); ?></h1>
			<div><?php echo the_content(); ?></div>

		<?php elseif($category[0]->slug != "blog"): ?>
			<h1><?php echo the_title(); ?></h1>
			<div class="the_post"><?php echo the_content(); ?></div>

		<?php else: ?>

			<div class="post_preview" style="width:75%; margin:0 auto;">
				<h1><?php echo the_title(); ?></h1>
				<div class="post_date">
					<?php echo date('F d, Y', get_the_date('U')); ?>
				</div>
				<div style="margin: 20px 0;">
					<?php echo the_content(); ?>
				</div>
			</div>
		<?php endif; ?>

	<?php endwhile; // end of the loop. ?>
	<?php echo posts_nav_link( "---", "pre", "Next" ); ?> 
	
	<div id="disqus_thread" style="float:left; width:100%;margin-top:60px;"></div>
	<script type="text/javascript">
	/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
	var disqus_shortname = 'vwfsandbox'; // required: replace example with your forum shortname

	/* * * DON'T EDIT BELOW THIS LINE * * */
	(function() {
		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();
	</script>
    <noscript style="position: relative;top: 40px;">Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
</div>
<div class="content container">	
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>