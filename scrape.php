<?php

	include('SimpleHtmlDom.php');
	include('SavageScrapper.php');
	include('SavagePlayer.php');
	include('SavageGoalie.php');

	$savage_scrapper = new SavageScrapper();

	$savage_scrapper->getGoalieStats();

?>