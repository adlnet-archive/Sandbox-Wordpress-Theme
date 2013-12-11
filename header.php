<html>
<head>
	<?php
		$root = get_template_directory_uri();
		wp_head(); 
	?>
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $root;?>/css/bootstrap.min.css">
	<link rel="stylesheet"href="<?php echo $root;?>/css/style.css" type="text/css">
</head>

<body style="min-width:990px;">
	<div id="wrapper">
		<div id="header" style="text-align: center">
			<div class="headerMenu container">
				<div id="username" data-bind="visible:user().isLoggedIn">
					<span class="headerSpan" data-bind="text:'Logged in as: '"></span>
					<a class="headerA" href="<?php echo $root;?>/user" id="userOptions" data-bind="text: user().username"></a>
				</div>
				<div id="login">
					<a class="headerA" href="<?php echo $root;?>/login?return=worlds"  id="login"  data-bind="visible:!user().isLoggedIn">Login</a>
					<a class="headerA" href="<?php echo $root;?>/user"  id="user"  data-bind="visible:user().isLoggedIn">Account</a>
					<a class="headerA" href="<?php echo $root;?>/logout?return=index" id="logout" data-bind="visible:user().isLoggedIn">Logout</a>
					<a class="headerA" href="<?php echo $root;?>/signup?return=worlds" id="signup" data-bind="visible:!user().isLoggedIn">Create Account</a>
				</div>
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