<div class="ui attached message">
    <h1 class="header">Liste des tâches</h1>
</div>
<div class="ui attached fluid segment">
	<table class="ui celled selectable table">
		<thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Priorité</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?= getTasks() ?>
		</tbody>
	</table>
</div>