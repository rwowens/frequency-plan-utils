<?php
function getGoogleClient($readonly = true) {
	putenv('GOOGLE_APPLICATION_CREDENTIALS=config/google_creds.json');
	define('APPLICATION_NAME', 'AC8UJ File Creator');
	define('SCOPES', implode(' ', array(
			Google_Service_Sheets::SPREADSHEETS)
			));

	define('SCOPES_RO', implode(' ', array(
			Google_Service_Sheets::SPREADSHEETS_READONLY)
			));

	$client = new Google_Client();
	$client->setApplicationName(APPLICATION_NAME);
	if ($readonly === false) {
		$client->setScopes(SCOPES);
	} else {
		$client->setScopes(SCOPES_RO);
	}
	$client->useApplicationDefaultCredentials();
	return $client;
}
?>