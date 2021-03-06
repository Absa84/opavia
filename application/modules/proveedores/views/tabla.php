
<h1 class="page-title"><i class="icon-truck"></i> Consulta de Proveedores</h1>

<?php if ($this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $this->session->flashdata('msg_success'); ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="<?php echo (isset($form_action)) ? $form_action:''?>" method="post">
		<div class="widget-header form-search force-top">
			<div class="input-append">
				<input type="text" name="buscar" value="<?php echo $buscar ?>" class="span2 search-query">
				<button type="submit" class="btn"><i class="icon-search"></i></button>
			</div>

			<?php if (!empty($buscar)): ?>
				<a href="/proveedores" class="btn btn-small"><i class="icon-undo"></i> Limpiar Filtro</a>
			<?php endif ?>
			
			<a href="/proveedores/agregar" class="btn btn-small btn-success btn-right"><i class="icon-plus"></i> Agregar</a> &nbsp;
			
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="3%">#</th>
						<th>Nombre</th>
						<th class="hidden-phone">Telefono</th>
						<th class="hidden-phone">E-Mail</th>
						<th width="4%">Opciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6" class="row-fluid">
							<div class="span2">
								<button type="button" class="btn btn-danger" id="btn-delete"><i class="icon-remove"></i> Eliminar</button>
							</div>
							<div class="span10">
								<?php echo $this->pagination->create_links(); ?>								
							</div>
						</td>
					</tr>
				</tfoot>
				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><input type="checkbox" name="del[]" value="<?php echo $row->id; ?>"></td>
						<td><?php echo $row->nombre; ?> </td>
						<td class="hidden-phone"><?php echo $row->telefono; ?></td>
						<td class="hidden-phone"><?php echo $row->email; ?></td>
						<td align="center">
							<div class="btn-group">
								<a href="/proveedores/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar"><i class="icon-pencil"></i></a>
								<a href="/proveedores/eliminar/<?php echo $row->id; ?>" class="btn btn-small btn-danger" title="eliminar"><i class="icon-remove"></i></a>
							</div>
						</td>
					</tr>

				<?php endforeach ?>

				<?php if ($query->num_rows() == 0): ?>
					<tr>
						<td colspan="5" class="center">No se encontraron resultados</td>
					</tr>
					
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>