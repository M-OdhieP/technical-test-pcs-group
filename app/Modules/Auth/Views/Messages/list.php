<?php if (!empty($messages)) : ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert" id="messages">
		<?php foreach ($messages as $message) : ?>
			<?= esc($message) ?>
		<?php endforeach ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>



<?php endif ?>