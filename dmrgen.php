<?php
define('CURRENT_PAGE', 'dmrgen');
require('fragments/header.php');
?>
	<div class="well">
		<p>This tool creates a code plug file for the selected model of radio using
		data pulled from a shared base configuration and optionally from a personal
		spreadsheet containing additional configuration. Refer to the documentation
		for instructions.</p>
	</div>
	<div class="row">
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
				<label for="personalFileId">Google Drive Spreadsheet shareable link (or document ID) of personal configuration (optional):
				<a href="#" data-toggle="popover" title="What is this?" data-trigger="focus" data-placement="top" data-content="Refer to the <a href='documentation.php' target='_blank'>documentation</a> for details.">[?]</a></label>
				<input type="text" name="personalFileId" maxlength="200" class="form-control"/>
			</div>
			<div class="form-group col-sm-12">
				<label for="radioModel">Radio Model:</label>
				<select name="radioModel" id="radioModel" class="form-control">
					<option value="tyt">TYT MD-380</option>
					<option value="cs800">CS-800</option>
					<option value="anytonezip">Anytone Zip</option>
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
<?php 
require('fragments/footer.php');
?>