<?= $this->extend(dashboard_view('_layouts')); ?>





<?= $this->section('content'); ?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12 p-0">
			<h2 class="mb-2 page-title"><?= $title ?></h2>
			<div class="row my-2">
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-body">
							<table class="table datatables" id="dataTable-1">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Email</th>
										<th>Groups</th>
										<th>Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user) : ?>

										<tr>
											<td><?= htmlspecialchars($user->first_name . ' ' . $user->last_name); ?></td>
											<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<?php foreach ($user->groups as $group) : ?>
													<!-- <?php echo anchor('auth/edit_group/' . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br /> -->
													<?= $group->name ?> <br />
												<?php endforeach ?>
											</td>
											<td><?php echo ($user->active) ? anchor('auth/deactivate/' . $user->id, lang('Auth.index_active_link')) : anchor("auth/activate/" . $user->id, lang('Auth.index_inactive_link')); ?></td>
											<td class="text-center">
												<div>
													<a href="<?= base_url("auth/edit_user/" . $user->id) ?>"><button type="button" class="btn btn-sm mb-1 btn-warning"><span class="fe fe-edit fe-16 mr-2"></span>Edit</button></a>
													<a href="<?= base_url("auth/delete_user/" . $user->id) ?>" class="btn-delete"><button type="button" class="btn btn-sm mb-1 btn-danger"><span class="fe fe-trash fe-16 mr-2"></span>Delete</button></a>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $message ?>

<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('modules_assets/dashboard/css/dataTables.bootstrap4.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src='<?= base_url('modules_assets/dashboard/js/jquery.dataTables.min.js') ?>'></script>
<script src='<?= base_url('modules_assets/dashboard/js/dataTables.bootstrap4.min.js') ?>'></script>

<script>
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[10, 15, 25, -1],
			[10, 15, 25, "All"]
		]
	});

	$('.btn-delete').on('click', function(e) {
		e.preventDefault();
		var urlToRedirect = e.currentTarget.getAttribute('href');
		console.log(urlToRedirect);
		Swal.fire({
			title: 'Yakin menghapus data ini?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: `Hapus`,
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = urlToRedirect;
			}
		});
	});
</script>
<?= $this->endSection(); ?>