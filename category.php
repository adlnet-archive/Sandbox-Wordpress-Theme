<?php
wp_enqueue_script("jquery", get_template_directory_uri() . "/js/jquery-1.10.2.min.js" );
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

<script type="text/javascript">
	(function($){

		function getChildren(levelArr, jqObj){
			
			var children = jqObj.children('.pcig-li-item, .pcig-ul-list'), tempChild, tempStr = "";
			
			for(var i = 1; i <= children.length; i++){
			
				tempChild = $(children[i-1]);
				console.log(levelArr);
				if(tempChild.text()){
					
					if(tempChild.hasClass('pcig-li-item')){
						tempStr = levelArr.join(".");
						tempStr = tempStr.substr(2, tempStr.length) + '. ';
						tempChild.prepend(tempStr.length > 2 ? tempStr : '');
						levelArr[levelArr.length-1]++;
					}
					
					else if(tempChild.hasClass('pcig-ul-list')){
						
						levelArr[levelArr.length-1]--;
						levelArr.push(1);
						getChildren(levelArr, tempChild)
						g = levelArr.pop();
						levelArr[levelArr.length-1]++;
					}					
				}
			}	
		}
	
		$(document).ready(function(){
			getChildren([1], $('.pcig-top-ul-list'));
		});
	
	})(jQuery);
</script>