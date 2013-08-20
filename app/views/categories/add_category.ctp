<!-- column-one -->
		<div id="content"><div class="col-one">
			
			<h2>Add New Category</h2>
			<?php echo $this->Form->create('Category');?>
			
			<?php echo '<p class="success">'.$this->Session->flash().'</p>';?>
			
			<p>
			<?php echo $this->Form->input('category_name');?></p>
			
			<p>
			<?php echo $this->Form->input('slug');?></p>
			
			<br />	
			
			<?php echo $this->Form->end('Save Category');?>
			
			</form>
			
		</div></div>