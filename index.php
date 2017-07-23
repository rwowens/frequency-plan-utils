<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Frequency Plan Utilities</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<?php
	define('JSON_FREQ_PLAN_ELEMENT', "Frequency plan");
	define('JSON_DMR_BASE_ELEMENT', "DMR base");
?>
<body>
<div class="container">
	<div class="page-header">
		<h1>Frequency Plan Utilities</h1>
	</div>
<?php 
	if (file_exists(__DIR__ . "/config/sheets.json")) {
		$sheetsFile = file_get_contents(__DIR__ . "/config/sheets.json");
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
	if (!file_exists(__DIR__ . '/config/google_creds.json')) {
		?>
		<div class="row">
			<div class="col-sm-12 bg-danger h3">
				Missing Google credentials file. This site has not been properly configured.
			</div>
		</div>
	<?php
		}
?>
	<div class="well">
		<div class="row">
			<div class="col-sm-12 h3">CSV Downloads</div>
		</div>
		<form method="GET" name="csvForm" id="csvForm">
			<div class="row">
				<div class="form-group col-sm-12">
					<label for="plan">Frequency plan:</label>
					<select name="plan" id="plan" class="form-control">
<?php
	if (isset($sheetsData[JSON_FREQ_PLAN_ELEMENT])) {
		foreach ($sheetsData[JSON_FREQ_PLAN_ELEMENT] as $key => $value) {
?>					<option value="<?php echo $key; ?>"><?php echo $value['name']?></option>
<?php
		}
	}
?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-offset-3 col-sm-3">
					<input type="button" id="submitChirp" value="Generate Chirp File" class="form-control btn btn-primary" onclick="$('#csvForm').attr('action', 'chirp.php'); $('#csvForm').submit();"/>
				</div>
				<div class="form-group col-sm-3">
					<input type="button" id="submitChirp" value="Generate RT Systems File" class="form-control btn btn-primary" onclick="$('#csvForm').attr('action', 'rtSystems.php'); $('#csvForm').submit();"/>
				</div>
			</div>
		</form>
	</div>
	<div class="well">
		<div class="row">
			<div class="col-sm-12 h3">DMR Config File Generator</div>
		</div>
		<form method="GET" action="rdt.php">
			<div class="form-group col-sm-12">
				<label for="baseFile">Base configuration:</label>
				<select name="baseFile" id="baseFile" class="form-control">
<?php
	if (isset($sheetsData[JSON_DMR_BASE_ELEMENT])) {
		foreach ($sheetsData[JSON_DMR_BASE_ELEMENT] as $key => $value) {
?>					<option value="<?php echo $key; ?>"><?php echo $value['name']?></option>
<?php
		}
	}
?>
				</select>
			</div>
			<div class="form-group col-sm-12">
				<label for="personalFileId">Google Drive Spreadsheet ID of personal configuration (optional):
				<a href="#" data-toggle="popover" title="What is this?" data-trigger="focus" data-placement="top" data-content="You may enter the Google Drive spreadsheet ID of your personal DMR configuration sheet here. Information in your personal sheet will augment information in the base sheet. To obtain the spreadsheet ID, make a copy of <a href='https://docs.google.com/spreadsheets/d/1XbzGn-9W2ydjr4V35HAWl3rYraKYfxO-EtZEwbM-UTw/edit?usp=sharing' target='_blank'>this template</a> in your personal Google Drive, add content to it as you wish (but do not change the layout of it or the named range definitions!), then click the &quot;Share&quot; button in the upper right of the spreadsheet page and get a shareable link. The link will look something like this: https://docs.google.com/spreadsheets/d/<u>1XbzGn-9W2ydjr4V35HAWl3rYraKYfxO-EtZEwbM-UTw</u>/edit?usp=sharing. The underlined portion is the spreadsheet ID.">[?]</a></label>
				<input type="text" name="personalFileId" maxlength="50" class="form-control"/>
			</div>
			<div class="form-group col-sm-12">
				<label for="radioModel">Radio Model:</label>
				<select name="radioModel" id="radioModel" class="form-control">
					<option value="tyt">TYT MD-380</option>
				</select>
			</div>
			<div class="form-group col-sm-12">
				<label for="disclaimer">
					<input type="checkbox" onclick="this.form.submitBtn.disabled = !this.checked;"> I agree that use of generated files is at my own risk. Neither this site nor the author of this software is responsible for any damage that may occur from use of files generated on this site.</input>
				</label>
			</div>
			<div class="form-group col-sm-offset-4 col-sm-4">
				<input type="submit" id="submitBtn" value="Click to Generate File" class="form-control btn btn-primary" disabled="disabled"/>
			</div>
		</form>
		<div class="row">
			<div class="col-sm-12 text-center">
			Thanks to IZ2UUF for providing a very helpful analysis of the 
			<a href="http://www.iz2uuf.net/wp/index.php/2016/06/04/tytera-dm380-codeplug-binary-format/">TYT file format.</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({html:true});
});
</script>
</body>
</html>