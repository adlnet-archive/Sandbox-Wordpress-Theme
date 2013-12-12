<html>
<head>
	<?php
		$root = get_template_directory_uri();
		wp_head(); 

		if($wp_query->post->post_type != 'page'){
			$categories = array();
			$category = get_the_category($wp_query->post->ID);
			$category = $category[0];
			$category->link = get_category_link($category->cat_ID);
			array_push($categories, $category);
			
			while($category->parent > 0){
				$category = get_category($category->parent);
				$category->link = get_category_link($category->cat_ID);
				array_push($categories, $category);
			}
		}
	?>
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $root;?>/css/bootstrap.min.css">
	<link rel="stylesheet"href="<?php echo $root;?>/css/style.css" type="text/css">
</head>

<body style="min-width:990px;">
	<div id="wrapper">
		<div id="header" style="text-align: center">
			<div class="headerMenu container">
				<?php if($wp_query->post->post_type != 'page'): ?>
				<div id="username">
					
					<?php if(!is_category()): ?>
						<a href="" style="float:right;padding:2px 5px 2px 0px;"><?php echo $wp_query->post->post_title; ?></a>
						<span style="float:right;padding:2px 5px 2px 0px;">&gt;</span>
					<?php endif; ?>
					<?php for($i = 0; $i < count($categories); $i++): ?>
						
						<a href="<?php echo $categories[$i]->link; ?>" style="float:right;padding:2px 5px 2px 0px;"><?php echo $categories[$i]->name; ?></a>
						<?php if($i + 1 < count($categories)): ?><span style="float:right;padding:2px 5px 2px 0px;">&gt;</span><?php endif; ?>
					<?php endfor; ?>
				
					<span class="headerSpan" data-bind="text:'Logged in as: '"></span>
					<a class="headerA" href="<?php echo $root;?>/user" id="userOptions" data-bind="text: user().username"></a>
				</div>
				<?php endif; ?>
			</div>
		</div>		
		<div class="container" style="box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.25);padding:0;">
			<div class="content container" style="border:none;padding:0;">
				<div id="pageLogo">
					<div id="logo">
						<a href="<?php echo $root;?>">
							<div style=" float:left;">
								<img src="<?php echo $root;?>/img/VWS_Logo.png" />
							</div>
							<div style=" margin-left:10px;margin-top:50px;float:left;">
								<img src="<?php echo $root;?>/img/VW_text.png" />
								<img src="<?php echo $root;?>/img/Sandbox_text.png" />
							</div>
						</a>
					</div>
					<div class="linkMenu">
						<a href="<?php echo $root;?>">Home</a> 
						<a href="<?php echo $root;?>/worlds">Worlds</a> 
						<a href="http://www.youtube.com/watch?list=PLbhwHX3OvksljQcxLkRT3YvyjgQaIY8m2&v=aWRQJJnBi5c">Videos</a> 
						<a href="<?php echo $root;?>/help">Help</a>
					</div>
				</div>
			</div>	