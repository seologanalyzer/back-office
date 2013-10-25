<?php
		echo form_open(
			current_url(),
			array('class' => 'form-inline')
		);
		
		echo form_fieldset(
			$this->lang->line('label_authentification')
		);
		
		echo form_input(
			array(
				'name'=> 'user',
				'placeholder' => $this->lang->line('label_login'),
				'value' => set_value('user')
			)
		);
		
		echo nbs(10);
		
		echo form_password(
			array(
				'name' => 'password',
				'placeholder' => $this->lang->line('label_motDePasse'),
				'value' => set_value('password')
			)
		);
		
		echo nbs(10);
		
		echo form_submit(
			array(
				'name' =>'submit-connect',
				'class' => 'btn btn-primary'
			),
			$this->lang->line('label_connexion')
		);
			
		echo form_fieldset_close();
		
		echo form_close(); 
?>
<script type="text/javascript">
	$("input[name='user']").focus();
</script>