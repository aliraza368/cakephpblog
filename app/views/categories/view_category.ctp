	<!-- column-one -->
		<div id="content"><div class="col-one">
			<h2><a href="<?php echo $this->base.'/categories/view_category/'.$category['id'];?>"><?php echo ucwords($category['category_name']);?></a> (<?php echo count($posts);?>)</h2>
		
			<?php if( isset($posts) && $posts ): ?>
			<ul>
			<?php foreach($posts as $post):?>
				<li><a href="<?php echo $this->base.'/posts/view_post/'.$post['id'];?>"><?php echo $post['title']?></a></li>
			<?php endforeach; ?>
			</ul>
				
			<?php else: ?>
			<h3>No post yet!</h3>
			<?php endif;?>
			
		</div></div>