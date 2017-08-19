<?php
define('CURRENT_PAGE', 'analog');
require('fragments/header.php');
?>
	<div class="well">
		<p>This tool reads channel information from a frequency plan spreadsheet
		and converts it into CSV files appropriate for use with either the Chirp
		programming software or RT Systems programming software.</p>
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
<?php 
require('fragments/footer.php');
?>