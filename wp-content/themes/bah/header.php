<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">

		<?php wp_head(); ?>
	
	 <script src="https://use.fontawesome.com/34c2f4efc6.js"></script>
	 <script src="https://kit.fontawesome.com/e2546dfc9d.js"></script>

	</head>
	<body <?php body_class(); ?>>
   
	<div class="header-wrapper">
			<header>

				<div class="toplinks"> 
					<a href="" class="menutoggle"><i class="fas  fa-bars"></i></a>
					<ul class="quicklinks">
						<li><a href="">Contact</a></li>
						<li><a href="">Gifts</a></li>
						<li><a href="">Book</a></li>
					</ul>


					<a href="/" class="logo"><img src="<?=get_template_directory_uri();?>/images/Borough-Arms-Logo.png" />
					<a href="tel:01782 629421" class="phone"><i class="fas fa-phone-alt"><span>01782 629421</span></i></a>
				</div>
			


					<nav id="navbar" class="main-menu navbar-collapse collapse" aria-expanded="false">
										<?php
									
											wp_nav_menu(array(
												'menu'    => 2, //menu id
												'walker'  => new Walker_Nav_Menu() //use our custom walker
											));
										?>
									</nav>

			
			</header>
	</div>
 