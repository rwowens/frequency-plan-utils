<?php
define('CURRENT_PAGE', 'dmrimport-result');
require('fragments/header.php');
require_once __DIR__ . '/includes/utils.php';
require_once __DIR__ . '/includes/rdtFunctions.php';

$importDocId = (isset($_POST['uploadFileId']) ? extractDocumentId($_POST['uploadFileId']) : null);

if ($importDocId != null) {
	if ($_FILES['fileToUpload']['size'] == 262709) {
		if ($fh = fopen($_FILES['fileToUpload']['tmp_name'], 'rb+')) {
			try {
				$rec = fread($fh, 7);
			} finally {
				fclose($fh);
			}
			$binVals = unpack("C7chars", $rec);
			if ($binVals['chars1'] == 0x44 && $binVals['chars2'] == 0x66 && $binVals['chars3'] == 0x75 && $binVals['chars4'] == 0x53 &&
					$binVals['chars5'] == 0x65 && $binVals['chars6'] == 0x01 && $binVals['chars7'] == 0x25) {
				importRDTFile($_FILES['fileToUpload']['tmp_name'], $importDocId, $_POST['sections']);
			} else {
				addError("File does not appear to be valid.");
			}
		} else {
			addError("Failed to open file");
		}
	} else {
		addError("Invalid file size");
	}
} else {
	addError("Invalid target spreadsheet");
}
	$errorCount = count(getErrors());
	$warningCount = count(getWarnings());
	if ($errorCount == 0 && $warningCount == 0) {
?>
	<div class="row">
		<h3>Import Results</h3>
	</div>
	<div class="row">
		<div class="col-sm-12 h3 alert alert-success">Import complete</div>
	</div>
<?php
	} else {
		if ($errorCount > 0) {
?>
	<div class="row">
		<div class="alert alert-danger">
			<p>The following errors occurred:</p>
			<ul>
<?php 
			foreach (getErrors() as $error) {
?>
				<li><?php echo $error; ?></li>
<?php
			}
?>
			</ul>
		</div>
	</div>
<?php
		}
?>
<?php 
		if ($warningCount> 0) {
?>
	<div class="row">
		<div class="alert alert-warning">
			<p>The following warnings occurred:</p>
			<ul>
<?php 
			foreach (getWarnings() as $warning) {
?>
				<li><?php echo $warning; ?></li>
<?php
			}
?>
			</ul>
		</div>
	</div>
<?php
		}
	}

require('fragments/footer.php');
?>