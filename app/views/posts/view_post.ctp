<div id="content"><div class="col-one">

		<h2><a href="<?php echo $this->base.'post/'.$post['Post']['id'];?>"><?php echo ucwords($post['Post']['title']);?></a></h2>
		<p class="post-info">Posted by <a href="javascript:;"><?php echo $post['User']['username']; ?></a> | Filed under <?php foreach($post['Category'] as $cat) { ?><a href="<?php echo $this->base.'/categories/view_category/'.$cat['id'];?>"><?php echo $cat['category_name'];?></a> <?php } ?></p>
		<?php echo $post['Post']['body']; ?>
		</p>

			<p class="postmeta">
			<a href="<?php echo $this->base.'/posts/view_post/'.$post['Post']['id'];?>" class="comments">Comments (<?php echo count($comments);?>)</a> |			

			<span class="date"><?php //echo mdate('%n %M %Y %H:%i:%s',human_to_unix($post->entry_date));?></span>
			</p>

			
			<?php if($comments): foreach($comments as $row):?>
				<div class="commentor">
					<div>
						<strong>
							<?php echo ucwords($row['Comment']['author_name']).' says';?></strong></span>
					</div>
					<div><?php echo $row['Comment']['comment'];?></div>
				</div>
				<?php endforeach; else: ?>
				<h3>No comment yet!</h3>
			<?php endif;?>

			
			<?php echo '<p class="success">'.$this->Session->flash().'</p>';?>
			<?php if( $authUser && !empty($username) ): ?>
				<form method="post" action="<?php echo $this->base; ?>/posts/view_post/<?php echo $id; ?>">
			<p>

			<textarea col="10" rows="3" name="data[Comment][comment]"></textarea>
			<br />

			<input type="hidden" name="data[Comment][post_id]" value="<?php echo $post['Post']['id'];?>" />
			<input type="hidden" name="data[Comment][user_id]" value="<?php echo $user_id?>" />
			<input type="hidden" name="data[Comment][author_name]" value="<?php echo $username?>" />
			<?php echo $this->Form->end('Save Comment');?>
			</p>
			<?php endif;?>
		</div></div>