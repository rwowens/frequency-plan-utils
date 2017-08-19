<?php
define('CURRENT_PAGE', 'dmrimport');
require('fragments/header.php');
?>
		<div class="well">
			<p>This tool will read an RDT file and import values from that file
			into a Google Drive spreadsheet. The target spreadsheet must be a copy
			of the personal configuration template in order for this to work.
			Refer to the documentation for instructions for creating a personal
			configuration sheet from the template.</p>
			<p>Currently only TYT MD-380 format RDT files are supported. Provide
			the ID or link to a personal configuration spreadsheet to load the
			data into then select an RDT file to load and the sections you wish
			to have loaded, then click the "Import File" button.
		</div>
		<form method="POST" action="rdtImport.php" id="uploadForm" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="262709"/>
			<div class="row">
				<div class="form-group col-sm-12">
					<label for="uploadFileId">Google Drive Spreadsheet shareable link (or document ID) target spreadsheet:</label>
					<input type="text" name="uploadFileId" maxlength="200" class="form-control"/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<label for="fileName">Source file:
						<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file"/>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<h4>Sections to import:</h4>
<?php 
					$sectionsArr = array(
							DATA_KEY_GENERAL_SETTINGS => 'General Settings',
							DATA_KEY_BUTTON_DEFINITIONS => 'Button Definitions',
							DATA_KEY_CHANNELS => 'Channels',
							DATA_KEY_CONTACTS => 'Contacts',
							DATA_KEY_MENU_ITEMS => 'Menu Items',
							DATA_KEY_RX_GROUP_LISTS => 'Rx Group Lists',
							DATA_KEY_SCAN_LISTS => 'Scan Lists',
							DATA_KEY_TEXT => 'Text Messages',
							DATA_KEY_ZONES => 'Zones',
					);
					
					foreach ( $sectionsArr as $key => $value) {
?>
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="sections[]" value="<?php echo $key; ?>"/>
							<?php echo $value; ?>
						</label>
					</div>
<?php 
					}
?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-offset-4 col-sm-4">
					<input type="submit" id="submitUploadBtn" value="Import File" class="form-control btn btn-primary"/>
				</div>
			</div>
		</form>
	</div>
<?php 
require('fragments/footer.php');
?>