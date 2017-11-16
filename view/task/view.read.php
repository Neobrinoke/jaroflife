<div class="ui attached message">
    <h1 class="header">
		<span>Tâche [<?= $result->tasklabel ?>]</span>
		<a class="ui right floated label blue" href="/task/edit/<?= $result->taskid ?>/">Modifier</a>
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