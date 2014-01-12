<?php

	include('SimpleHtmlDom.php');
	include('SavageScrapper.php');
	include('SavagePlayer.php');

	$savage_scrapper = new SavageScrapper();

	$savage_scrapper->getRoaster();

?>