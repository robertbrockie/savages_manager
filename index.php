<?php

	include('SimpleHtmlDom.php');
	include('SavageScrapper.php');
	include('SavagePlayer.php');
	include('SavageGoalie.php');
	include('SavageGame.php');

	$savage_scrapper = new SavageScrapper();

	$savage_players = $savage_scrapper->getPlayerStats();
	$savage_goalies = $savage_scrapper->getGoalieStats();
	@$savage_games = $savage_scrapper->getSchedule();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Montreal Savages</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
	  		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="panel panel-default">
			<div class="panel-heading">Player Stats</div>
			<table class="table">
				<tbody>
					<tr>
						<th>Number</th>
						<th>Name</th>
						<th>Position</th>
						<th>GP</th>
						<th>G</th>
						<th>A</th>
						<th>PTS</th>
						<th>P/G</th>
						<th>PIM</th>
					</tr>
					<?php foreach($savage_players as $savage_players) { ?>
					<tr>
						<td><?= $savage_players->getNumber() ?></td>
						<td><?= $savage_players->getName() ?></td>
						<td><?= $savage_players->getPosition() ?></td>
						<td><?= $savage_players->getGamesPlayed() ?></td>
						<td><?= $savage_players->getGoals() ?></td>
						<td><?= $savage_players->getAssists() ?></td>
						<td><?= $savage_players->getTotalPoints() ?></td>
						<td><?= $savage_players->getPointsPerGame() ?></td>
						<td><?= $savage_players->getPenaltyMinutes() ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">Goalie Stats</div>
			<table class="table">
				<tbody>
					<tr>
						<th>Number</th>
						<th>Name</th>
						<th>GP</th>
						<th>W</th>
						<th>L</th>
						<th>T</th>
						<th>G</th>
						<th>A</th>
						<th>PIM</th>
						<th>SO</th>
						<th>MP</th>
						<th>GA</th>
						<th>GAA</th>
						<th>SH</th>
						<th>SA</th>
						<th>SAV%</th>
					</tr>
					<?php foreach($savage_goalies as $savage_goalie) { ?>
					<tr>
						<td><?= $savage_goalie->getNumber() ?></td>
						<td><?= $savage_goalie->getName() ?></td>
						<td><?= $savage_goalie->getGamesPlayed() ?></td>
						<td><?= $savage_goalie->getWins() ?></td>
						<td><?= $savage_goalie->getLoses() ?></td>
						<td><?= $savage_goalie->getTies() ?></td>
						<td><?= $savage_goalie->getGoals() ?></td>
						<td><?= $savage_goalie->getAssists() ?></td>
						<td><?= $savage_goalie->getPenaltyMinutes() ?></td>
						<td><?= $savage_goalie->getShutouts() ?></td>
						<td><?= $savage_goalie->getMinutesPlayed() ?></td>
						<td><?= $savage_goalie->getGoalsAgainst() ?></td>
						<td><?= $savage_goalie->getGoalsAgainstAverage() ?></td>
						<td><?= $savage_goalie->getShotsFaced() ?></td>
						<td><?= $savage_goalie->getSavesMade() ?></td>
						<td><?= $savage_goalie->getSavePercentage() ?>%</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">Upcoming Games</div>
			<table class="table">
				<tbody>
					<tr>
						<th>Date</th>
						<th>Time</th>
						<th>Away Team</th>
						<th>Away Score</th>
						<th>Home Team</th>
						<th>Home Score</th>
						<th>Location</th>
					</tr>
					<?php foreach($savage_games as $savage_game) { ?>
					<tr>
						<td><?= $savage_game->getDate() ?></td>
						<td><?= $savage_game->getTime() ?></td>
						<td><?= $savage_game->getAwayTeam() ?></td>
						<td><?= $savage_game->getAwayScore() ?></td>
						<td><?= $savage_game->getHomeTeam() ?></td>
						<td><?= $savage_game->getHomeScore() ?></td>
						<td><?= $savage_game->getLocation() ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>