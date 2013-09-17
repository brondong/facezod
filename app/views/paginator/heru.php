<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<div class="paginasi text-center">
		<ul class="pagination pagination-sm">
			<?php echo $presenter->render(); ?>
		</ul>
	</div>
<?php endif; ?>