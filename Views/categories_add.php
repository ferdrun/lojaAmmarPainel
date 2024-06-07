<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Coleções
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<form method="POST" action="<?php echo BASE_URL; ?>categories/add_action">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Nova Coleção</h3>
				<div class="box-tools">
					<input type="submit" class="btn btn-success" value="Salvar" />
				</div>
			</div>
			<div class="box-body">

				<div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':''; ?>">
					<label for="group_name">Nome da coleção</label>
					<input type="text" class="form-control" id="group_name" name="name" />
				</div>

				<label for="cat_sub">Coleção pai</label>
				<select name="sub" id="cat_sub" class="form-control">
					<option value="">Nenhuma</option>
					<?php $this->loadView('categories_add_item', array(
			          'itens' => $list,
			          'level' => 0
			        )); ?>
				</select>


			</div>
		</div>
	</form>

</section>
<!-- /.content -->