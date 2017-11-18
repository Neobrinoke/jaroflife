<div class="ui attached message">
    <h1 class="header">
		<span>Tâche [<?= $result->tasklabel ?>]</span>
		<span><a class="ui right floated basic icon button" href="/task/edit/<?= $result->taskid ?>/" data-tooltip="Modifier une tâche"><i class="edit icon"></i></a></span>
	</h1>
</div>
<div class="ui attached fluid segment">
	<div class="ui items">
		<div class="item">
			<div class="description">
				<p><?= $result->description ?></p>
			</div>
		</div>
	</div>
</div>