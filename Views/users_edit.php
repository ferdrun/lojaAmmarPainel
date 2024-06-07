<section class="content-header">
  <h1>
    Usuários
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<form method="POST" action="<?php echo BASE_URL; ?>users/edit_action">

    
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Editar Usuário</h3>
				<div class="box-tools">
					<input type="submit" class="btn btn-success" value="Salvar" />
				</div>
			</div>
			<div class="box-body">

				<div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':''; ?>">
				<label for="user_name">Nome</label> 
				<input type="text" class="form-control" id="user_name" name="name" value="<?php echo $info['name']; ?>"/></div>

				<div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':''; ?>">
                <label for="user_email">Email</label>
				<input type="text" class="form-control" id="user_email" name="email" value="<?php echo $info['email']; ?>"/></div>
				
				<div class="form-group <?php echo (in_array('id_perm', $errorItems))?'has-error':''; ?>">
				<label for="p_cat">Permissão</label>
				<select required name="id_permission" id="p_perm" name="id_perm" class="form-control">
				<?php foreach($permission_items as $item): ?>
					<option <?php echo ($item['id']==$info['id_permission'])?'selected':''; ?> value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
				<?php endforeach; ?>
				</select> </div>

				</div>
				</div>

			</div>
		</div>
	</form>

</section>
<!-- /.content -->