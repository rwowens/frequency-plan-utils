<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Frequency Plan Utilities</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<style type="text/css">
ol.docs li { padding-bottom: 20px; }
</style>
<?php 
	$isHeaderPresent = true;
	function activateCurrentPage($name) {
		if (CURRENT_PAGE == $name) {
			echo ' active';
		}
	}
?></head>
<body>
<div class="container">
	<div class="page-header">
		<h1>Frequency Plan Utilities</h1>
	</div>
<?php 
	require_once __DIR__ . '/../includes/utils.php';
	
	define('JSON_FREQ_PLAN_ELEMENT', "Frequency plan");
	define('JSON_DMR_BASE_ELEMENT', "DMR base");

	if (file_exists(__DIR__ . "/../config/sheets.json")) {
		$sheetsFile = file_get_contents(__DIR__ . "/../config/sheets.json");
		$sheetsData = json_decode($sheetsFile, true);
	} else {
		$sheetsData = [];
	}

	if (!isset($sheetsData[JSON_FREQ_PLAN_ELEMENT]) && !isset($sheetsData[JSON_DMR_BASE_ELEMENT])) {
?>
	<div class="row">
		<div class="col-sm-12 bg-danger h3">
			Missing sheets.json configuration file. This site has not been properly configured.
		</div>
	</div>
<?php
	}
	if (!file_exists(__DIR__ . '/../config/google_creds.json')) {
		?>
		<div class="row">
			<div class="col-sm-12 bg-danger h3">
				Missing Google credentials file. This site has not been properly configured.
			</div>
		</div>
	<?php
		}
?>
<div class="row">
<div class="col-sm-3 col-md-2">
	<ul class="nav nav-pills nav-stacked">
		<li role="presentation" class="<?php activateCurrentPage('analog');?>"><a href="analog.php">Analog Tools</a></li>
		<li role="presentation" class="<?php activateCurrentPage('dmrgen');?>"><a href="dmrgen.php">DMR File Generation</a></li>
		<li role="presentation" class="<?php activateCurrentPage('dmrimport');?>"><a href="dmrimport.php">DMR File Import</a></li>
		<li role="presentation" class="<?php activateCurrentPage('docs');?>"><a href="documentation.php">Documentation</a></li>
	</ul>
</div>
<div class="col-sm-9 col-md-10">