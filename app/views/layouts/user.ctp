<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title><?php echo $title_for_layout; ?></title>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="author" content="Ali Raza" />
<meta name="description" content="This is a site demo on how to create a simple CAKEPHP blog" />
<meta name="keywords" content="CAKEPHP, blog, tutorial" />
<meta name="robots" content="index, follow, noarchive" />
<meta name="googlebot" content="noarchive" />

<?php echo $this->Html->css('unbound'); ?>
</head>

<body>
	
		<div id="header-wrap">

		<div id="header-photo">
		<img alt="header photo" src="<?php echo $this->base;?>/assets/img/header-photo.jpg" width="890" height="290" />
		</div>
		
		<h1 id="logo-text"><a href="<?php echo $this->base;?>" title="">CAKEPHP Blog</a></h1>
		
		<div id="nav">
			<ul>
				<li <?php echo ( isset($current) && $current === 'HOME' ) ? 'id="current"' : ''?>><a href="<?php echo $this->base;?>">Home</a></li>
				<li <?php echo ( isset($current) && $current === 'ABOUT' ) ? 'id="current"' : ''?>><a href="<?php echo $this->base;?>/posts/about">About</a></li>
			</ul>
		</div>
		
		
		<form id="quick-search" action="<?php echo $this->base;?>/posts/search" method="post" >
			<p>
			<label for="qsearch">Search:</label>
			<input class="tbox" id="qsearch" type="text" name="data[Post][q]" value="Search this site..." title="Start typing and hit ENTER" />
			<input class="btn" type="submit" value="Submit" />
			</p>
		</form>
	</div>
	
	
	<div id="content-outer" class="clear"><div id="content-wrapper">
		<?php echo $content_for_layout; ?>
		
		
		
				<div class="col-two">
			
			<?php if ( $authUser && !empty($username) ):?>
			<h3>Sidebar Menu</h3>
			<ul class="sidemenu">
				<li><a href="<?php echo $this->base.'/users/dashboard/';?>">Dashboard</a></li>
				<li><a href="<?php echo $this->base.'/posts/add_new_post';?>">Add new entry</a></li>
				<li><a href="<?php echo $this->base.'/categories/add_category';?>">Add new category</a></li>
				<li><a href="<?php echo $this->base.'/users/logout';?>">Logout</a></li>
			<?php else: ?>
			<h3>Admin Menu</h3>
			<ul class="sidemenu">
				<li><a href="<?php echo $this->base.'/users/login';?>">Login</a></li>
				<li><a href="<?php echo $this->base.'about';?>">About</a></li>	
			<?php endif; ?>
				
			</ul>

            <?php if( isset($categories) && $categories ):?>
			<h3>Category</h3>
			<ul class="sidemenu">
			<?php foreach( $categories as $category ):?>
				<li><a href="<?php echo $this->base.'/categories/view_category/'.$category['Category']['id'];?>"><?php echo $category['Category']['category_name'];?></a></li>
			<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		
		
		<div class="col-three">

			<h3>Demo</h3>
			<p>You may login as admin using <a>admin@admin.com</a> and the password is <a>password</a>.</p>

		</div>
		
		
		
	</div></div>
	
	<div id="footer-wrapper">
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>

</html>