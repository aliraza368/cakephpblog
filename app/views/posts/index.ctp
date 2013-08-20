<?php //debug($posts);exit(); ?>
<div id="content">
	<div class="col-one">
		<?php if( $posts ): foreach($posts as $post): ?>
		<h2><a href="<?php echo $this->base.'/posts/view_post/'.$post['Post']['id'];?>"><?php echo ucwords($post['Post']['title']);?></a></h2>
		<p class="post-info">Posted by <a href="javascript:;"><?php echo $post['User']['username']; ?></a> | Filed under <?php foreach($post['Category'] as $cat) { ?><a href="<?php echo $this->base.'/categories/view_category/'.$cat['id'];?>"><?php echo $cat['category_name'];?></a> <?php } ?></p>
		<?php echo $post['Post']['body']; ?>
		<p class="postmeta">		
		<a href="<?php echo $this->base.'/posts/view_post/'.$post['Post']['id'];?>" class="readmore">Read more</a> |
		<a href="<?php echo $this->base.'/posts/view_post/'.$post['Post']['id'];?>" class="comments">Comments (<?php echo count($post['Comment']);?>)</a> |				
		<span class="date"><?php //echo mdate('%n %M %Y %H:%i:%s',human_to_unix($post['Post']['created']));?></span>	
		</p>
		<?php endforeach; else: ?>
		<h2>No post yet!</h2>
		<?php endif;?>
			
	</div>
</div>