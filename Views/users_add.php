<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usuários
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<form method="POST" action="<?php echo BASE_URL; ?>users/add_action">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Novo Usuário</h3>
				<div class="box-tools">
					<input type="submit" class="btn btn-success" value="Salvar" />
				</div>
			</div>
			<div class="box-body">

				<div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':''; ?>">
				<label for="user_name">Nome</label> 
				<input type="text" class="form-control" id="user_name" name="name" /></div>

				<div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':''; ?>">
                <label for="user_email">Email</label>
				<input type="text" class="form-control" id="user_email" name="email" /></div>

				<div class="form-group <?php echo (in_array('password', $errorItems))?'has-error':''; ?>">
				<label for="user_password">Senha</label>
				<input type="password" class="form-control" id="user_password" name="password" /></div>
				
				<div class="form-group <?php echo (in_array('id_perm', $errorItems))?'has-error':''; ?>">
				<label for="p_cat">Permissão</label>
				<select required name="id_permission" id="p_perm" class="form-control">
				<?php foreach($permission_items as $item): ?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
				<?php endforeach; ?>
				</select> </div>

				</div>
				</div>

			</div>
		</div>
	</form>

</section>
<!-- /.content -->