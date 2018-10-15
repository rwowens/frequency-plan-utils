<?php
namespace RadioModels;

class AnytoneZipFileUtils implements \RadioFileUtils {
	public function generateRadioFile($baseSpreadsheetId, $personalSpreadsheetId) {
		$spreadsheetData = retrieveSpreadsheetData($baseSpreadsheetId, $personalSpreadsheetId);

		if ($spreadsheetData == null) {
			addError("No data found");
			return null;
		}

		$zip = new \ZipArchive();
		$zipFile = tempnam(sys_get_temp_dir(), 'zip');

		if ($zip->open($zipFile, \ZipArchive::OVERWRITE) === TRUE) {
			$contactArr = $spreadsheetData->getContactArray();
			$rxGrpListArr = $spreadsheetData->getRxGroupListArray();
			$chanArr = $spreadsheetData->getChannelArray();
			$scanListArr = $spreadsheetData->getScanListArray();
			$zoneInfoArr = $spreadsheetData->getZoneInfoArray();
			$textMsgArr = $spreadsheetData->getTextMessageArray();
			$genSettings = $spreadsheetData->getGeneralSettings();

			$filesToDelete = array();
			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeChannels($fh, $chanArr, $contactArr, $scanListArr, $rxGrpListArr, $genSettings);
				fclose($fh);
				$zip->addFile($csvFile, 'Channel.csv');
			}

			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeContacts($fh, $contactArr);
				fclose($fh);
				$zip->addFile($csvFile, 'DigitalContactList.csv');
			}

			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeTalkGroups($fh, $contactArr);
				fclose($fh);
				$zip->addFile($csvFile, 'TalkGroups.csv');
			}
			

			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeRxGroupLists($fh, $rxGrpListArr);
				fclose($fh);
				$zip->addFile($csvFile, 'ReceiveGroupCallList.csv');
			}

			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeZones($fh, $zoneInfoArr);
				fclose($fh);
				$zip->addFile($csvFile, 'Zone.csv');
			}

			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeTextMessages($fh, $textMsgArr);
				fclose($fh);
				$zip->addFile($csvFile, 'PrefabricatedSMS.csv');
			}

			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeScanLists($fh, $scanListArr);
				fclose($fh);
				$zip->addFile($csvFile, 'ScanList.csv');
			}

			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
			if ($fh = fopen($csvFile, 'w+')) {
				$filesToDelete[] = $csvFile;
				$this->writeRadioId($fh, $genSettings);
				fclose($fh);
				$zip->addFile($csvFile, 'RadioIDList.csv');
			}

// 			$csvFile = tempnam(sys_get_temp_dir(), 'csv');
// 			if ($fh = fopen($csvFile, 'w+')) {
// 				$filesToDelete[] = $csvFile;
// 				fwrite($fh, "16\r\n");
// 				fwrite($fh, "0,\"Channel.csv\"\r\n");
// 				fwrite($fh, "1,\"RadioIDList.csv\"\r\n");
// 				fwrite($fh, "2,\"Zone.csv\"\r\n");
// 				fwrite($fh, "3,\"ScanList.csv\"\r\n");
// 				fwrite($fh, "4,\"\"\r\n");
// 				fwrite($fh, "5,\"TalkGroups.csv\"\r\n");
// 				fwrite($fh, "6,\"PrefabricatedSMS.csv\"\r\n");
// 				fwrite($fh, "7,\"\"\r\n");
// 				fwrite($fh, "8,\"ReceiveGroupCallList.csv\"\r\n");
// 				fwrite($fh, "9,\"\"\r\n");
// 				fwrite($fh, "10,\"\"\r\n");
// 				fwrite($fh, "11,\"\"\r\n");
// 				fwrite($fh, "12,\"\"\r\n");
// 				fwrite($fh, "13,\"\"\r\n");
// 				fwrite($fh, "14,\"\"\r\n");
// 				fwrite($fh, "15,\"DigitalContactList.csv\"\r\n");
// 				fclose($fh);
// 				$zip->addFile($csvFile, 'exp.LST');
// 			}


			$zip->close();
			foreach ($filesToDelete as $curFile) {
				unlink($curFile);
			}
			return $zipFile;
		} else {
			addError("Failed to open temporary file");
			return null;
		}
	}

	protected function writeCSVLine(&$fh, $rowArray) {
		$str = '';
		foreach ($rowArray as $val) {
			$str .= '"' . $val . '",';
		}
		$str = substr($str, 0, -1) . "\r\n";
		fwrite($fh, $str);
	}

	protected function writeChannels($fh, &$channelArr, &$contactArr, &$scanListArr, &$rxGroupListArr, &$generalSettings) {
		$channelCount = count($channelArr);

		$header = array('No.','Channel Name','Receive Frequency','Transmit Frequency','Channel Type','Transmit Power','Band Width','CTCSS/DCS Decode','CTCSS/DCS Encode','Contact','Contact Call Type','Radio ID','Busy Lock/TX Permit','Squelch Mode','Optional Signal','DTMF ID','2Tone ID','5Tone ID','PTT ID','Color Code','Slot','CH Scan List','Receive Group List','TX Prohibit','Reverse','Simplex TDMA','TDMA Adaptive','Encryption Type','Digital Encryption','Call Confirmation','Talk Around','Work Alone','Custom CTCSS','2TONE Decode','Ranging','Through Mode','APRS Report','APRS Report Channel');
		$this->writeCSVLine($fh, $header);

		for ($channelRowNum = 0; $channelRowNum < $channelCount; $channelRowNum++) {
			$channel = $channelArr[$channelRowNum];
			$chanVal = $this->buildChannel($channel, $channelRowNum+1, $rxGroupListArr, $contactArr, $scanListArr, $generalSettings);
			$this->writeCSVLine($fh, $chanVal);
		}

	}

	protected function buildChannel($channel, $channelNum, &$rxGroupListArr, &$contactArr, &$scanListArr, &$generalSettings) {
		$vals = array();

		//'TDMA Adaptive','Encryption Type','Digital Encryption','Call Confirmation','Talk Around','Work Alone','Custom CTCSS','2TONE Decode','Ranging','Through Mode','APRS Report','APRS Report Channel'
		$vals[] = $channelNum;
		$vals[] = $channel->getChannelName();
		$vals[] = $channel->getRxFrequency();
		$vals[] = $channel->getTxFrequency();
		$vals[] = ($channel->getMode() == 'Digital') ? 'D-Digital' : 'A-Analog';
		$vals[] = $channel->getPower();
		$bandwidth = '12.5K';
		if ($channel->getBandwidth() == '25.0') {
			$bandwidth = '25K';
		}
		$vals[] = $bandwidth;
		$vals[] = ($channel->getCtcssDcsDecode() == '') ? 'Off' : $channel->getCtcssDcsDecode();
		$vals[] = ($channel->getCtcssDcsEncode() == '') ? 'Off' : $channel->getCtcssDcsEncode();
		$vals[] = $channel->getContactName();
		$contactIndex = findContactNameIndex($contactArr, $channel->getContactName());
		$contact = $contactArr[$contactIndex];
		$vals[] = ($contact == null || $contact->getContactType()) == 'G' ? 'Group Call' : 'Private Call';
		$vals[] = $generalSettings->getRadioName();
		if ($channel->getAdmitCriteria() == 'Channel Free') {
			$vals[] = 'ChannelFree';
		} else if ($channel->getAdmitCriteria() == 'Color Code') {
			$vals[] = 'Same Color Code'; 
		} else {
			$vals[] = 'Always';
		}
		$rxSqlMode = 'Carrier';
		if ($channel->getRxSquelchMode() == 'CTCSS/DCS' || $channel->getRxSquelchMode() == 'CTCSS/DCS and Audio') {
			$rxSqlMode = 'CTCSS/DCS';
		}
		$vals[] = $rxSqlMode; //Squelch mode
		$vals[] = 'Off'; // Optional signal
		$vals[] = '1'; // DTMF ID
		$vals[] = '1'; // 2Tone ID
		$vals[] = '1'; // 5Tone ID
		$vals[] = 'Off'; // PTT ID
		$vals[] = $channel->getColorCode();
		$vals[] = $channel->getSlot() == 'TS1' ? '1' : '2';
		$vals[] = $channel->getScanListName(); //Scan list
		$vals[] = $channel->getGroupListName(); // Receive group list
		$vals[] = $channel->isRxOnly() ? 'On' : 'Off';
		$vals[] = 'Off'; // Reverse FIXME
		$vals[] = 'Off'; // Simplex TDMA
		$vals[] = 'Off'; // TDMA Adaptive
		$vals[] = 'Normal Encryption'; // Encryption type
		$vals[] = 'Off'; // Digital encryption
		$vals[] = 'Off'; // Call confirmation
		$vals[] = 'Off'; // Talk around
		$vals[] = 'Off'; // Work alone
		$vals[] = '0.0'; // Custom CTCSS
		$vals[] = '1'; // 2TONE Decode
		$vals[] = 'Off'; //Ranging
		$vals[] = 'Off'; //Through mode
		$vals[] = 'Off'; //APRS Report
		$vals[] = '1'; // APRS Report Channel
		return $vals;
	}

	protected function buildContact($contact, $contactNum) {
		$vals = array();
		$vals[] = $contactNum;
		$vals[] = $contact->getContactNum();
		$callsign = '';
		$name = $contact->getContactName();
		if (1 == preg_match('/(\d?[a-zA-Z]{1,2}\d{1,4}[a-zA-Z]{1,4}) ?(.*)/', $contact->getContactName(), $matches)) {
			$callsign = $matches[1];
			$name = $matches[2];
		}
		$vals[] = $callsign;
		$vals[] = $name;
		$vals[] = ''; // City
		$vals[] = ''; // State
		$vals[] = ''; // Country
		$vals[] = ''; // Remarks
		if ($contact->getContactType() == 'P') {
			$vals[] = 'Private Call';
		} else if ($contact->getContactType() == 'G') {
			$vals[] = 'Group Call';
		} else {
			$vals[] = 'All Call';
		}
		$vals[] = 'None'; // Call Alert

		return $vals;
	}

	protected function writeContacts(&$fh, &$contactArr) {
		$header = array('No.','Radio ID','Callsign','Name','City','State','Country','Remarks','Call Type','Call Alert');
		$this->writeCSVLine($fh, $header);

		$rowNum = 0;
		foreach ($contactArr as $contact) {
			if ($contact->getContactType() != 'G') {
				$rowNum++;
				$contactVal = $this->buildContact($contact, $rowNum);
				$this->writeCSVLine($fh, $contactVal);
			}
		}
	}

	protected function buildTalkGroup($contact, $contactNum) {
		$vals = array();
		$vals[] = $contactNum;
		$vals[] = $contact->getContactNum();
		$vals[] = $contact->getContactName();
		$vals[] = 'Group Call';
		$vals[] = 'None'; // Call Alert

		return $vals;
	}

	protected function writeTalkGroups(&$fh, &$contactArr) {
		$header = array('No.','Radio ID','Name','Call Type','Call Alert');
		$this->writeCSVLine($fh, $header);
		
		$rowNum = 0;
		foreach ($contactArr as $contact) {
			if ($contact->getContactType() == 'G') {
				$rowNum++;
				$contactVal = $this->buildTalkGroup($contact, $rowNum);
				$this->writeCSVLine($fh, $contactVal);
			}
		}
	}

	protected function buildRxGroup($rxGroup, $rxGroupNum) {
		$vals = array();
		$vals[] = $rxGroupNum;
		$vals[] = $rxGroup->getGroupListName();

		$str = '';
		foreach ($rxGroup->getContactNames() as $contact) {
			$str .= $contact . '|';
		}
		$vals[] = substr($str, 0, -1);

		return $vals;
	}

	protected function writeRxGroupLists(&$fh, $rxGroupArr) {
		$groupCount = count($rxGroupArr);

		$header = array('No.','Group Name','Contact');
		$this->writeCSVLine($fh, $header);
		
		for ($rowNum = 0; $rowNum < $groupCount; $rowNum++) {
			$group = $rxGroupArr[$rowNum];
			$rxGroupVal = $this->buildRxGroup($group, $rowNum+1);
			$this->writeCSVLine($fh, $rxGroupVal);
		}
	}

	protected function buildZone($zone, $zoneNum) {
		$vals = array();
		$vals[] = $zoneNum;
		$vals[] = $zone->getZoneName();

		$str = '';
		foreach ($zone->getChannelNames() as $channelName) {
			$str .= $channelName. '|';
		}
		$vals[] = substr($str, 0, -1);

		$vals[] = ''; // A Channel
		$vals[] = ''; // B Channel
		return $vals;
	}

	protected function writeZones(&$fh, $zoneArr) {
		$zoneCount = count($zoneArr);

		$header = array('No.','Zone Name','Zone Channel Member','A Channel','B Channel');
		$this->writeCSVLine($fh, $header);

		for ($rowNum = 0; $rowNum < $zoneCount; $rowNum++) {
			$zone = $zoneArr[$rowNum];
			$zoneVal = $this->buildZone($zone, $rowNum+1);
			$this->writeCSVLine($fh, $zoneVal);
		}
	}

	protected function buildTextMsg($textMsg, $textMsgNum) {
		$vals = array();
		$vals[] = $textMsgNum;
		$vals[] = $textMsg->getText();

		return $vals;
	}
	
	protected function writeTextMessages(&$fh, &$textMsgArr) {
		$header = array('No.','Text');
		$this->writeCSVLine($fh, $header);
		
		$rowNum = 0;
		foreach ($textMsgArr as $textMsg) {
			$rowNum++;
			$val = $this->buildTextMsg($textMsg, $rowNum);
			$this->writeCSVLine($fh, $val);
		}
	}

	protected function buildScanList($scanList, $scanListNum) {
		$vals = array();
		$vals[] = $scanListNum;
		$vals[] = $scanList->getScanListName();

		$str = '';
		foreach ($scanList->getChannelNames() as $channelName) {
			$str .= $channelName. '|';
		}
		$vals[] = substr($str, 0, -1);

		$vals[] = 'Off'; // Scan mode
		$priChanSel = 'Off';
		if ($scanList->getPriorityChannel1() == 'None' && $scanList->getPriorityChannel2() == 'None') {
			$priChanSel = 'Off';
		} else if ($scanList->getPriorityChannel2() == 'None') {
			$priChanSel = 'Priority Channel Select1';
		} else if ($scanList->getPriorityChannel1() == 'None') {
			$priChanSel = 'Priority Channel Select2';
		} else {
			$priChanSel = 'Priority Channel Select1 + Priority Channel Select2';
		}
		$vals[] = $priChanSel;

		$priChan1 = 'Off';
		if ($scanList->getPriorityChannel1() == 'Selected') {
			$priChan1 = 'Current Channel';
		} else if ($scanList->getPriorityChannel1() == 'None') {
			$priChan1 = 'Off';
		} else {
			$priChan1 = $scanList->getPriorityChannel1();
		}
		$vals[] = $priChan1;

		$priChan2 = 'Off';
		if ($scanList->getPriorityChannel2() == 'Selected') {
			$priChan2 = 'Current Channel';
		} else if ($scanList->getPriorityChannel2() == 'None') {
			$priChan2 = 'Off';
		} else {
			$priChan2 = $scanList->getPriorityChannel2();
		}
		$vals[] = $priChan2;

		$vals[] = 'Selected'; // Revert channel
		$vals[] = '2.0'; // Look back time A
		$vals[] = '3.0'; // Look back time B
		$vals[] = '3.1'; // Dropout delay time
		$vals[] = '3.1'; // Dwell time

		return $vals;
	}
	
	protected function writeScanLists(&$fh, $scanListArr) {
		$scanListCount = count($scanListArr);

		$header = array('No.','Scan List Name','Scan Channel Member','Scan Mode','Priority Channel Select','Priority Channel 1','Priority Channel 2','Revert Channel','Look Back Time A[s]','Look Back Time B[s]','Dropout Delay Time[s]','Dwell Time[s]');
		$this->writeCSVLine($fh, $header);
		
		for ($rowNum = 0; $rowNum < $scanListCount; $rowNum++) {
			$scanList = $scanListArr[$rowNum];
			$scanListVal = $this->buildScanList($scanList, $rowNum+1);
			$this->writeCSVLine($fh, $scanListVal);
		}
	}

	protected function writeRadioID(&$fh, &$generalSettings) {
		$header = array('No.','Radio ID','Name');
		$this->writeCSVLine($fh, $header);

		$valArr = array('1', $generalSettings->getRadioId(), $generalSettings->getRadioName());
		$this->writeCSVLine($fh, $valArr);
	}
}
