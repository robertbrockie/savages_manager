<?php

	include('SimpleHtmlDom.php');
	include('SavageScrapper.php');

	$savage_scrapper = new SavageScrapper();

	$savage_scrapper->getRoaster();

?>