<!-- column-one -->
		<div id="content"><div class="col-one">
			
			<h2>Add New Entry</h2>
			<?php echo $this->Form->create('Post'); ?>

			<?php echo '<p class="success">'.$this->Session->flash().'</p>';?>
			
			<p><?php echo $this->Form->input('title'); ?></p>
			
			<h3>Category</h3>
			<p><?php if( isset($categories) && $categories): foreach($categories as $category): ?>
				<label><input class="checkbox" type="checkbox" name="data[Category][Category][<?php echo $category['Category']['id'];?>]" value="<?php echo $category['Category']['id'];?>"><?php echo $category['Category']['category_name'];?></label>
				<?php endforeach; else:?>
				Please add your category first!
				<?php endif; ?>
			</p>
			<p>
				<?php echo $this->Form->input('body', array('rows' => '3')); ?>
			</p>

			<br />	

			<?php echo $this->Form->end('Save Post'); ?>
			</form>
			
		</div></div>