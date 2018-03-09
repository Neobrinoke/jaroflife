<div class="ui attached message">
	<h1 class="header">
		<span>Vos listes</span>
		<span><a class="ui right floated basic icon button" href="/list/add/" data-tooltip="Ajouter une liste"><i class="add icon"></i></a></span>
	</h1>
</div>
<div class="ui attached fluid segment">
	<?php
	if( !empty( $resTodos ) )
	{
		?>
		<div class="ui three column stackable grid">
			<?php
			foreach( $resTodos as $resTodo )
			{
				$todoInfo = $todo->findById( $resTodo->todo_id );
				$membersCount = sizeof( $todo->findMembersById( $resTodo->todo_id ) );
				$tasksCount = sizeof( $task->findByTodoId( $resTodo->todo_id ) );
				$dateTime = new DateTime( $resTodo->joined_at );
				$date = $dateTime->format( 'd-m-Y' );
				$time = $dateTime->format( 'H:i' );
				?>
				<div class="column">
					<div class="ui cards">
						<div class="card">
							<div class="content">
								<div class="header"><?= $todoInfo->name ?></div>
								<div class="description"><?= $todoInfo->description ?></div>
							</div>
							<div class="extra content">
								<span><i class="user icon"></i><?= $membersCount ?> <?= $membersCount > 1 ? 'Membres' : 'Membre' ?></span>
								<span class="right floated"><i class="browser icon"></i><?= $tasksCount ?> <?= $tasksCount > 1 ? 'Tâches' : 'Tâche' ?></span>
							</div>
							<div class="extra content">
								<span><i class="calendar icon"></i>Rejoins le <?= $date ?> à <?= $time ?></span>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<a href="/list/read/<?= $todoInfo->id ?>/" class="ui basic button purple"><i class="options icon"></i>Détails</a>
									<a href="/task/browse/<?= $todoInfo->id ?>/" class="ui basic button blue">Afficher<i class="arrow right icon"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	else sendMessage( 'Aucune liste actuellement disponible', 'error' ); ?>
</div>