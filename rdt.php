<?php
use RadioModels\CS800FileUtils;
use RadioModels\AnytoneZipFileUtils;

require_once __DIR__ . '/includes/utils.php';
require_once __DIR__ . '/includes/spreadsheetFunctions.php';

$outputFile = null;
$baseDocId = lookupDocumentId(isset($_GET['baseFile']) ? $_GET['baseFile'] : null);
$isPersonalSet = (isset($_GET['personalFileId']) && trim($_GET['personalFileId']) != '');
$importDocId = ($isPersonalSet ? extractDocumentId(trim($_GET['personalFileId'])) : null);
if ($baseDocId == null) {
	addError("You must select a base document");
} else {
	$radioModel = $_GET['radioModel'];
	$sendFileName = 'ares_custom.dat';
	if ($importDocId == null && $isPersonalSet) {
		addError("Invalid personal spreadsheet ID provided");
	} else if ($radioModel == 'tyt') {
		require_once __DIR__ . '/includes/rdtFunctions.php';
		$outputFile = generateRdtFile($baseDocId, $importDocId);
		$sendFileName = 'ares_custom.rdt';
	} else if ($radioModel == 'cs800') {
		$cs800FileUtils = new CS800FileUtils();
		$outputFile = $cs800FileUtils->generateRadioFile($baseDocId, $importDocId);
		$sendFileName = 'ares_custom.rdb';
	} else if ($radioModel == 'anytonezip') {
		$anytoneZipFileUtils = new AnytoneZipFileUtils();
		$outputFile = $anytoneZipFileUtils->generateRadioFile($baseDocId, $importDocId);
		$sendFileName = 'ares_custom.zip';
	}
}
$ackHash = calculateAckHash();
if (count(getErrors()) == 0 &&
		(count(getWarnings()) == 0 ||
		(isset($_GET['ackHash']) && $_GET['ackHash'] == $ackHash))) {
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.$sendFileName.'"');
	readfile($outputFile);
} else {
?>
<html>
<head>
<title>DMR Config Errors and Warnings</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>Errors and Warnings</h1>
<?php 
	$errorCount = count(getErrors());
	if ($errorCount > 0) {
?>
	<div class="row">
		<div class="alert alert-danger">
			<p>The following errors must be corrected:</p>
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
	if (count(getWarnings()) > 0) {
?>
	<div class="row">
		<div class="alert alert-warning">
			<p>The following warnings should be reviewed:</p>
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

	$queryString = http_build_query(array_merge($_GET, array("ackHash" => $ackHash)));
?>
	<div class="row">Correct any errors and then <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'].'?'.$queryString) ?>">click here</a> to ignore warnings and generate the file.
Note that if you made changes to your configuration which result in a different set of warnings being produced,
you will have to review them here again before generating the file.</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php
// 	header('Content-Type: application/json');
// 	echo json_encode(array('errors' => getErrors(),
// 			'warnings' => getWarnings(), 'ackHash' => $ackHash));
}
if ($outputFile != null) {
	unlink($outputFile);
}
?>