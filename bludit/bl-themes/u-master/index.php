<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="icon" href="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=">
		<?php echo Theme::metaTags( 'title' ); ?>
		<?php echo Theme::metaTags( 'description' ); ?>
		<?php if ( ! isset( $_GET['textonly'] ) ): ?>
		<style>
			<?php include('css/style.css'); ?>
		</style>
		<?php endif; ?>
	</head>
	<body>
		<ul style="line-height:110%;list-style-type:none;padding-left:0; ">
			<li><a href="../index.html"><p>Manu Srivastava</p></a></li>
			<li><a href="work"><p>work</p></a></li>
			<li><a href="about"><p>about</p></a></li>
			<li><a href="https://altermanu.wordpress.com/blog-feed/" target="_blank"><p>Alt-manu↗</p></a></li>
		</ul>

		<hr style="margin-block-start:2rem;">
		<div class="container<?php echo ($page->template())?? ''; ?>">
			<?php
			if ( $WHERE_AM_I === 'home' ) { ?>
			<header class="mb2">

				<?php echo $site->title(); ?>
				<?php Theme::plugins( 'siteHead' ) ?>
			</header>
			<?php
			$posts = $pages->getList(0,-1,1,0,1);
			echo '<div class="entries mb2">';
			foreach ( $posts as $page ) {
			  $page = new Page($page);
			  ?>
			  <div class="entry mbh">
			    <a href="<?php echo $page->permalink(); ?>"><?php echo $page->title(); ?></a>
			    <span class="meta g">&mdash; <?php echo $page->date("d.m.y");?><?php echo ($page->category())? ', ' . $page->category() : ''; ?></span>
			  </div>
			  <?php
			}
			echo '</div>';
			}
			if ( $WHERE_AM_I === 'page' ) {
			?>
			<header class="mb2">
			  <?php if ( $page->parent() ) {
			    $parent = new Page($page->parent());
			    $p = '<a href="'.$parent->permalink().'">'.$parent->title().'</a> / ';
			  } ?>
			  <a href="<?php echo $site->url(); ?>"><?php echo $site->title(); ?></a> / <?php echo ($p)?? ''; ?><?php echo $page->title(); ?></header>
			<?php if ($page->coverImage()): ?>
			  <div class="cover"><img src="<?php echo $page->coverImage(); ?>" alt="<?php echo $site->title(); ?></a>"></div>
			<?php endif; ?>
			<div class="entry mb2">
			  <?php echo $page->content(); ?>


				</div><?php } ?>


		</div>
		<div class="footer"><?php echo $site->footer(); ?>| <a href="mailto:manu_srivastava@outlook.com">manu_srivastava@outlook.com</a> | <a href="tel:+91-7093145-nine-five-three">+91-7093145-nine-five-three</a></div>

	</body>

</html>
