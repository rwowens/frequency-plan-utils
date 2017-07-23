<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/csvConstants.php';
require_once __DIR__ . '/includes/clientHelper.php';

function generateChirpFile($baseSpreadsheetId) {
	$gClient = getGoogleClient();
	$gService = new Google_Service_Sheets($gClient);
	$response = $gService->spreadsheets_values->get($baseSpreadsheetId, 'AllChannels');
	$values = $response->getValues();

	$genFile = tempnam(sys_get_temp_dir(), 'CSV');
	if ($fh = fopen($genFile, 'w')) {
		$chOffset = 0;
		$isAnyWritten = false;
		fputcsv($fh, array('Location','Name','Frequency','Duplex','Offset','Tone','rToneFreq','cToneFreq','DtcsCode','DtcsPolarity','Mode','TStep','Skip','Comment','URCALL','RPT1CALL','RPT2CALL'));
		foreach ($values as $row) {
			$colCount = count($row);
			if ($colCount >= 11) {
				if (!is_numeric($row[INDX_ChNum])) {
					continue;
				}
				$isAnyWritten = true;
				$duplex = '';
				$txOffset = number_format(abs($row[INDX_RxFreq] - $row[INDX_TxFreq]), 6, '.', '');
				if ($row[INDX_ChConfig] == 'Repeater') {
					if (abs($row[INDX_RxFreq] - $row[INDX_TxFreq])/(float)$row[INDX_RxFreq] > 0.2) {
						$duplex = 'split';
						$offset = $row[INDX_TxFreq];
					} else if ($row[INDX_RxFreq] > $row[INDX_TxFreq]) {
						$duplex = '-';
					} else if ($row[INDX_RxFreq] < $row[INDX_TxFreq]) {
						$duplex = '+';
					}
				}
				$tone = '';
				$tTone = 88.5;
				$rTone = 88.5;
				if (is_numeric($row[INDX_RxTone]) && is_numeric($row[INDX_TxTone])) {
					$tone = 'TSQL';
					$tTone = $row[INDX_TxTone];
					$rTone = $row[INDX_RxTone];
				} else if (is_numeric($row[INDX_TxTone])) {
					$tone = 'Tone';
					$tTone = $row[INDX_TxTone];
				}
				$mode = $row[INDX_Bandwidth];
				if ($mode == 'W') {
					$mode = 'FM';
				} else if ($mode == 'N') {
					$mode = 'NFM';
				}
				fputcsv($fh, array($row[INDX_ChNum] + $chOffset, $row[INDX_Name], $row[INDX_RxFreq],
						$duplex,
						$txOffset,
						$tone,
						$tTone,
						$rTone,
						'023',
						'NN',
						$mode,
						'5.00',
						'',
						($colCount > INDX_Comments ? $row[INDX_Comments] : ''),
						'','',''
				));
			} else if ($colCount > 2 && $row[1] == 'Version') {
				fputcsv($fh, array($row[INDX_ChNum] + $chOffset, $row[INDX_Name], '146.0000',
						'off',
						'0.000000',
						'',
						88.5,
						88.5,
						'023',
						'NN',
						'FM',
						'5.00',
						'',
						'Version Info',
						'','',''
				));
			} else if ($isAnyWritten && $colCount > 1 && $row[0] == 'Band:' && $row[1] != 'Version Info') {
				$chOffset += 100;
			}
		}
		fclose($fh);
		readfile($genFile);
		unlink($genFile);
	}
}

$sheetsFile = file_get_contents(__DIR__ . "/config/sheets.json");
$sheetsData = json_decode($sheetsFile, true);
if (isset($sheetsData['Frequency plan']) && key_exists($_GET['plan'], $sheetsData['Frequency plan'])) {
	$sheetId = $sheetsData['Frequency plan'][$_GET['plan']]['id'];
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="chirpPlan.csv"');
	generateChirpFile($sheetId, null);
} else {
?>
<html>
<head>
<title>Failed to find plan</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Failed to find selected plan</h1>
			<p>Please go <a href="frequencyPlanUtils.html">here</a> to select a valid plan and try again.</p>
		</div>
	</div>
</div>
</body>
</html>
<?php
}
?>