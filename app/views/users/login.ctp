<div id="content"><div class="col-one" style="margin-right: 0; padding-right: 25px;">
			<div class='mainInfo'>
				<div class="pageTitle" style><h3>Login</h3></div>
				
				<div class="pageTitleBorder"></div>
				<p>Please login with your email and password below.</p>
				<?php echo '<p class="success">'.$this->Session->flash('auth').'</p>';?>

				
				<?php echo $this->Form->create('User');?>
					
				  <p>
					<?php echo $this->Form->input('username');?>
				  </p>
				  
				  <p>
					<?php echo $this->Form->input('password');?>
				  </p>
			  
				  <p><?php echo $this->Form->end('Login');?></p>
			</div>
		</div></div>