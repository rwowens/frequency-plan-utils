<?php
require_once __DIR__ . '/clientHelper.php';
require_once __DIR__ . '/utils.php';

define("ROW_GENERAL_INFO1", "Info Screen Line 1");
define("ROW_GENERAL_INFO2", "Info Screen Line 2");
define("ROW_GENERAL_MONITOR_TYPE", "Monitor Type");
define("ROW_GENERAL_DISABLE_LEDS", "Disable All LEDs");
define("ROW_GENERAL_TALK_PERMIT_TONE", "Talk Permit Tone");
define("ROW_GENERAL_PASSWORD_ENABLE", "Password and Lock Enable");
define("ROW_GENERAL_CH_FREE_TONE", "Ch Free Indication Tone");
define("ROW_GENERAL_DISABLE_ALL_TONE", "Disable All Tone");
define("ROW_GENERAL_SAVE_MODE_RECV", "Save Mode Receive");
define("ROW_GENERAL_SAVE_PREAMBLE", "Save Preamble");
define("ROW_GENERAL_INTRO_SCREEN", "Intro Screen");
define("ROW_GENERAL_RADIO_ID", "Radio Id");
define("ROW_GENERAL_TX_PREAMBLE", "Tx Preamble Duration (ms)");
define("ROW_GENERAL_GROUP_CALL_HANG_TIME", "Group Call Hang Time (ms)");
define("ROW_GENERAL_PRIVATE_CALL_HANG_TIME", "Private Call Hang Time (ms)");
define("ROW_GENERAL_VOX_SENSITIVITY", "Vox Sensitivity");
define("ROW_GENERAL_RX_LOW_BATT", "Rx Low Battery Interval (s)");
define("ROW_GENERAL_CALL_ALERT_TONE", "Call Alert Tone Duration (s)");
define("ROW_GENERAL_LONE_WORKER_RESP", "Lone Worker Resp Time (min)");
define("ROW_GENERAL_LONE_WORKER_REMIND", "Lone Worker Reminder Time (s)");
define("ROW_GENERAL_SCAN_DIGITAL_HANG_TIME", "Scan Digital Hang Time (ms)");
define("ROW_GENERAL_SCAN_ANALOG_HANG_TIME", "Scan Analog Hang Time (ms)");
define("ROW_GENERAL_KEYPAD_LOCK_TIME", "Keypad Lock Time");
define("ROW_GENERAL_BACKLIGHT_TIME", "Backlight Time (s)");
define("ROW_GENERAL_MODE", "Mode");
define("ROW_GENERAL_POWER_ON_PASSWORD", "Power On Password");
define("ROW_GENERAL_RADIO_PROGRAM_PASSWORD", "Radio Program Password");
define("ROW_GENERAL_PC_PROGRAM_PASSWORD", "PC Program Password");
define("ROW_GENERAL_RADIO_NAME", "Radio Name");

define("ROW_MENU_MENU_HANG_TIME", "Menu Hang Time [s]");
define("ROW_MENU_TEXT_MESSAGE", "Text Message");
define("ROW_MENU_CALL_ALERT", "Call Alert");
define("ROW_MENU_MANUAL_DIAL", "Manual Dial");
define("ROW_MENU_REMOTE_MONITOR", "Remote Monitor");
define("ROW_MENU_RADIO_ENABLE", "Radio Enable");
define("ROW_MENU_EDIT", "Edit");
define("ROW_MENU_RADIO_CHECK", "Radio Check");
define("ROW_MENU_PROGRAM_KEY", "Program Key");
define("ROW_MENU_RADIO_DISABLE", "Radio Disable");
define("ROW_MENU_MISSED", "Missed");
define("ROW_MENU_OUTGOING_RADIO", "Outgoing Radio");
define("ROW_MENU_ANSWERED", "Answered");
define("ROW_MENU_TALKAROUND", "Talkaround");
define("ROW_MENU_POWER", "Power");
define("ROW_MENU_INTRO_SCREEN", "Intro Screen");
define("ROW_MENU_LED_INDICATOR", "LED Indicator");
define("ROW_MENU_PASSWORD_AND_LOCK", "Password And Lock");
define("ROW_MENU_DISPLAY_MODE", "Display Mode");
define("ROW_MENU_TONE_OR_ALERT", "Tone Or Alert");
define("ROW_MENU_BACKLIGHT", "Backlight");
define("ROW_MENU_KEYBOARD_LOCK", "Keyboard Lock");
define("ROW_MENU_SQUELCH", "Squelch");
define("ROW_MENU_VOX", "Vox");
define("ROW_MENU_PROGRAM_RADIO", "Program Radio");
define("ROW_MENU_SCAN", "Scan");
define("ROW_MENU_EDIT_LIST", "Edit List");

define("ROW_BUTTONS_LONG_PRESS_DURATION_MS", "Long Press Duration [ms]");
define("ROW_BUTTONS_SIDE_BUTTON_1_SHORT_PRESS", "Side Button 1 Short Press");
define("ROW_BUTTONS_SIDE_BUTTON_1_LONG_PRESS", "Side Button 1 Long Press");
define("ROW_BUTTONS_SIDE_BUTTON_2_SHORT_PRESS", "Side Button 2 Short Press");
define("ROW_BUTTONS_SIDE_BUTTON_2_LONG_PRESS", "Side Button 2 Long Press");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_1", "One Touch Access #1");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_1_CALL", "One Touch Access #1 Call");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_1_MESSAGE", "One Touch Access #1 Message");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_2", "One Touch Access #2");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_2_CALL", "One Touch Access #2 Call");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_2_MESSAGE", "One Touch Access #2 Message");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_3", "One Touch Access #3");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_3_CALL", "One Touch Access #3 Call");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_3_MESSAGE", "One Touch Access #3 Message");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_4", "One Touch Access #4");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_4_CALL", "One Touch Access #4 Call");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_4_MESSAGE", "One Touch Access #4 Message");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_5", "One Touch Access #5");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_5_CALL", "One Touch Access #5 Call");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_5_MESSAGE", "One Touch Access #5 Message");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_6", "One Touch Access #6");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_6_CALL", "One Touch Access #6 Call");
define("ROW_BUTTONS_ONE_TOUCH_ACCESS_6_MESSAGE", "One Touch Access #6 Message");
define("ROW_BUTTONS_QUICK_ACCESS_0", "Number Key Quick Contact Access 0");
define("ROW_BUTTONS_QUICK_ACCESS_1", "Number Key Quick Contact Access 1");
define("ROW_BUTTONS_QUICK_ACCESS_2", "Number Key Quick Contact Access 2");
define("ROW_BUTTONS_QUICK_ACCESS_3", "Number Key Quick Contact Access 3");
define("ROW_BUTTONS_QUICK_ACCESS_4", "Number Key Quick Contact Access 4");
define("ROW_BUTTONS_QUICK_ACCESS_5", "Number Key Quick Contact Access 5");
define("ROW_BUTTONS_QUICK_ACCESS_6", "Number Key Quick Contact Access 6");
define("ROW_BUTTONS_QUICK_ACCESS_7", "Number Key Quick Contact Access 7");
define("ROW_BUTTONS_QUICK_ACCESS_8", "Number Key Quick Contact Access 8");
define("ROW_BUTTONS_QUICK_ACCESS_9", "Number Key Quick Contact Access 9");

define("COL_CHANNEL_NAME", "Name");
define("COL_CHANNEL_LONE_WORKER", "Lone Worker");
define("COL_CHANNEL_SQUELCH", "Squelch");
define("COL_CHANNEL_AUTOSCAN", "Autoscan");
define("COL_CHANNEL_BANDWIDTH", "Bandwidth");
define("COL_CHANNEL_CHANNEL_MODE", "Channel Mode");
define("COL_CHANNEL_COLOR_CODE", "Color Code");
define("COL_CHANNEL_REPEATER_SLOT", "Repeater Slot");
define("COL_CHANNEL_RX_ONLY", "Rx Only");
define("COL_CHANNEL_ALLOW_TALKAROUND", "Allow Talkaround");
define("COL_CHANNEL_DATA_CALL_CONFIRMED", "Data Call Confirmed");
define("COL_CHANNEL_PRIVATE_CALL_CONFIRMED", "Private Call Confirmed");
define("COL_CHANNEL_DISPLAY_PTT_ID", "Display PTT Id");
define("COL_CHANNEL_COMPRESSED_UDP_HEADER", "Compressed Udp Hdr");
define("COL_CHANNEL_RX_REF_FREQ", "Rx Ref Freq");
define("COL_CHANNEL_ADMIT_CRITERIA", "Admit Criteria");
define("COL_CHANNEL_POWER", "Power");
define("COL_CHANNEL_VOX", "VOX");
define("COL_CHANNEL_QT_REVERSE", "Qt Reverse");
define("COL_CHANNEL_REVERSE_BURST", "Reverse Burst");
define("COL_CHANNEL_TX_REF_FREQ", "Tx Ref Freq");
define("COL_CHANNEL_CONTACT_NAME", "Contact Name");
define("COL_CHANNEL_TOT", "TOT");
define("COL_CHANNEL_TOT_REKEY_DELAY", "TOT Rekey Delay");
define("COL_CHANNEL_SCAN_LIST", "Scan List");
define("COL_CHANNEL_GROUP_LIST", "Group List");
define("COL_CHANNEL_DECODE18", "Decode 18");
define("COL_CHANNEL_RX_FREQ", "Rx Freq");
define("COL_CHANNEL_TX_FREQ", "Tx Freq");
define("COL_CHANNEL_CTCSS_DCS_DECODE", "CTCSS DCS Decode");
define("COL_CHANNEL_CTCSS_DCS_ENCODE", "CTCSS DCS Encode");
define("COL_CHANNEL_TX_SIGNALING_SYSTEM", "Tx Signaling System");
define("COL_CHANNEL_RX_SIGNALING_SYSTEM", "Rx Signaling System");

function findContactNameIndex(&$contactArr, $contactName) {
	$rowNum = 1;
	foreach ($contactArr as $contact) {
		if ($contact->getContactName() == $contactName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function findContactNameFromOriginalIndex(&$contactArr, $origIndex) {
	foreach ($contactArr as $contact) {
		if ($contact->getOriginalIndex() == $origIndex) {
			return $contact->getContactName();
		}
	}
	return NULL;
}

function findTextMessageIndex(&$textArr, $textMsg) {
	$rowNum = 1;
	foreach ($textArr as $text) {
		if ($text->getText() == $textMsg) {
			return $rowNum;
		}
		$rowNum++;
	}
}

function findChannelNameFromOriginalIndex(&$channelArr, $origIndex) {
	foreach ($channelArr as $channel) {
		if ($channel->getOriginalIndex() == $origIndex) {
			return $channel->getChannelName();
		}
	}
	return NULL;
}

function findRxGroupListNameFromOriginalIndex(&$rxGrpListArr, $origIndex) {
	foreach ($rxGrpListArr as $rxGrpList) {
		if ($rxGrpList->getOriginalIndex() == $origIndex) {
			return $rxGrpList->getGroupListName();
		}
	}
	return NULL;
}

function findScanListNameFromOriginalIndex(&$scanListArr, $origIndex) {
	foreach ($scanListArr as $scanList) {
		if ($scanList->getOriginalIndex() == $origIndex) {
			return $scanList->getScanListName();
		}
	}
	return NULL;
}


function findChannelNameIndex(&$channelArr, $channelName) {
	$rowNum = 1;
	foreach ($channelArr as $channel) {
		if ($channel->getChannelName() == $channelName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function findGroupListIndex(&$groupListArr, $groupListName) {
	$rowNum = 1;
	foreach ($groupListArr as $groupList) {
		if ($groupList->getGroupListName() == $groupListName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function findScanListIndex(&$scanListArr, $scanListName) {
	if ($scanListName == '') {
		return 0;
	}
	$rowNum = 1;
	foreach ($scanListArr as $scanList) {
		if ($scanList->getScanListName() == $scanListName) {
			return $rowNum;
		}
		$rowNum++;
	}
	return 0;
}

function readMenuItems($baseValues, $personalValues) {
	$menuItemsMap = array();

	if (count($baseValues) != 0) {
		processKeyValueRow($menuItemsMap, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processKeyValueRow($menuItemsMap, $personalValues);
	}

	$menuItems = new MenuItem(
			array_key_exists(ROW_MENU_TEXT_MESSAGE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_TEXT_MESSAGE] : NULL,
			array_key_exists(ROW_MENU_CALL_ALERT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_CALL_ALERT] : NULL,
			array_key_exists(ROW_MENU_MANUAL_DIAL, $menuItemsMap) ? $menuItemsMap[ROW_MENU_MANUAL_DIAL] : NULL,
			array_key_exists(ROW_MENU_REMOTE_MONITOR, $menuItemsMap) ? $menuItemsMap[ROW_MENU_REMOTE_MONITOR] : NULL,
			array_key_exists(ROW_MENU_RADIO_ENABLE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_RADIO_ENABLE] : NULL,
			array_key_exists(ROW_MENU_EDIT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_EDIT] : NULL,
			array_key_exists(ROW_MENU_RADIO_CHECK, $menuItemsMap) ? $menuItemsMap[ROW_MENU_RADIO_CHECK] : NULL,
			array_key_exists(ROW_MENU_PROGRAM_KEY, $menuItemsMap) ? $menuItemsMap[ROW_MENU_PROGRAM_KEY] : NULL,
			array_key_exists(ROW_MENU_RADIO_DISABLE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_RADIO_DISABLE] : NULL,
			array_key_exists(ROW_MENU_MISSED, $menuItemsMap) ? $menuItemsMap[ROW_MENU_MISSED] : NULL,
			array_key_exists(ROW_MENU_OUTGOING_RADIO, $menuItemsMap) ? $menuItemsMap[ROW_MENU_OUTGOING_RADIO] : NULL,
			array_key_exists(ROW_MENU_ANSWERED, $menuItemsMap) ? $menuItemsMap[ROW_MENU_ANSWERED] : NULL,
			array_key_exists(ROW_MENU_TALKAROUND, $menuItemsMap) ? $menuItemsMap[ROW_MENU_TALKAROUND] : NULL,
			array_key_exists(ROW_MENU_POWER, $menuItemsMap) ? $menuItemsMap[ROW_MENU_POWER] : NULL,
			array_key_exists(ROW_MENU_INTRO_SCREEN, $menuItemsMap) ? $menuItemsMap[ROW_MENU_INTRO_SCREEN] : NULL,
			array_key_exists(ROW_MENU_LED_INDICATOR, $menuItemsMap) ? $menuItemsMap[ROW_MENU_LED_INDICATOR] : NULL,
			array_key_exists(ROW_MENU_PASSWORD_AND_LOCK, $menuItemsMap) ? $menuItemsMap[ROW_MENU_PASSWORD_AND_LOCK] : NULL,
			array_key_exists(ROW_MENU_DISPLAY_MODE, $menuItemsMap) ? $menuItemsMap[ROW_MENU_DISPLAY_MODE] : NULL,
			array_key_exists(ROW_MENU_TONE_OR_ALERT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_TONE_OR_ALERT] : NULL,
			array_key_exists(ROW_MENU_BACKLIGHT, $menuItemsMap) ? $menuItemsMap[ROW_MENU_BACKLIGHT] : NULL,
			array_key_exists(ROW_MENU_KEYBOARD_LOCK, $menuItemsMap) ? $menuItemsMap[ROW_MENU_KEYBOARD_LOCK] : NULL,
			array_key_exists(ROW_MENU_SQUELCH, $menuItemsMap) ? $menuItemsMap[ROW_MENU_SQUELCH] : NULL,
			array_key_exists(ROW_MENU_VOX, $menuItemsMap) ? $menuItemsMap[ROW_MENU_VOX] : NULL,
			array_key_exists(ROW_MENU_PROGRAM_RADIO, $menuItemsMap) ? $menuItemsMap[ROW_MENU_PROGRAM_RADIO] : NULL,
			array_key_exists(ROW_MENU_SCAN, $menuItemsMap) ? $menuItemsMap[ROW_MENU_SCAN] : NULL,
			array_key_exists(ROW_MENU_EDIT_LIST, $menuItemsMap) ? $menuItemsMap[ROW_MENU_EDIT_LIST] : NULL,
			array_key_exists(ROW_MENU_MENU_HANG_TIME, $menuItemsMap) ? $menuItemsMap[ROW_MENU_MENU_HANG_TIME] : NULL
			);
	if (!is_numeric($menuItems->getMenuHangTime()) || $menuItems->getMenuHangTime() < 0 || $menuItems->getMenuHangTime() > 30) {
		addError("Menu Items menu hang time setting is invalid");
	}

	return $menuItems;
}

function processKeyValueRow(&$settingsMap, $values) {
	foreach ($values as $row) {
		if (count($row) < 2 || $row[1] == NULL) {
			continue;
		}
		$settingsMap[$row[0]] = $row[1];
	}
}

function readGeneralSettings($baseValues, $personalValues) {
	$genSettingsMap = array();

	if (count($baseValues) != 0) {
		processKeyValueRow($genSettingsMap, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processKeyValueRow($genSettingsMap, $personalValues);
	}

	$settings = new GeneralSettings(
			array_key_exists(ROW_GENERAL_INFO1, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_INFO1] : NULL,
			array_key_exists(ROW_GENERAL_INFO2, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_INFO2] : NULL,
			array_key_exists(ROW_GENERAL_MONITOR_TYPE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_MONITOR_TYPE] : NULL,
			array_key_exists(ROW_GENERAL_DISABLE_LEDS, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_DISABLE_LEDS] : NULL,
			array_key_exists(ROW_GENERAL_TALK_PERMIT_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_TALK_PERMIT_TONE] : NULL,
			array_key_exists(ROW_GENERAL_PASSWORD_ENABLE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_PASSWORD_ENABLE] : NULL,
			array_key_exists(ROW_GENERAL_CH_FREE_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_CH_FREE_TONE] : NULL,
			array_key_exists(ROW_GENERAL_DISABLE_ALL_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_DISABLE_ALL_TONE] : NULL,
			array_key_exists(ROW_GENERAL_SAVE_MODE_RECV, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SAVE_MODE_RECV] : NULL,
			array_key_exists(ROW_GENERAL_SAVE_PREAMBLE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SAVE_PREAMBLE] : NULL,
			array_key_exists(ROW_GENERAL_INTRO_SCREEN, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_INTRO_SCREEN] : NULL,
			array_key_exists(ROW_GENERAL_RADIO_ID, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RADIO_ID] : NULL,
			array_key_exists(ROW_GENERAL_TX_PREAMBLE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_TX_PREAMBLE] : NULL,
			array_key_exists(ROW_GENERAL_GROUP_CALL_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_GROUP_CALL_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_PRIVATE_CALL_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_PRIVATE_CALL_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_VOX_SENSITIVITY, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_VOX_SENSITIVITY] : NULL,
			array_key_exists(ROW_GENERAL_RX_LOW_BATT, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RX_LOW_BATT] : NULL,
			array_key_exists(ROW_GENERAL_CALL_ALERT_TONE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_CALL_ALERT_TONE] : NULL,
			array_key_exists(ROW_GENERAL_LONE_WORKER_RESP, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_LONE_WORKER_RESP] : NULL,
			array_key_exists(ROW_GENERAL_LONE_WORKER_REMIND, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_LONE_WORKER_REMIND] : NULL,
			array_key_exists(ROW_GENERAL_SCAN_DIGITAL_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SCAN_DIGITAL_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_SCAN_ANALOG_HANG_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_SCAN_ANALOG_HANG_TIME] : NULL,
			array_key_exists(ROW_GENERAL_KEYPAD_LOCK_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_KEYPAD_LOCK_TIME] : NULL,
			array_key_exists(ROW_GENERAL_BACKLIGHT_TIME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_BACKLIGHT_TIME] : NULL,
			array_key_exists(ROW_GENERAL_MODE, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_MODE] : NULL,
			array_key_exists(ROW_GENERAL_POWER_ON_PASSWORD, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_POWER_ON_PASSWORD] : NULL,
			array_key_exists(ROW_GENERAL_RADIO_PROGRAM_PASSWORD, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RADIO_PROGRAM_PASSWORD] : NULL,
			array_key_exists(ROW_GENERAL_PC_PROGRAM_PASSWORD, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_PC_PROGRAM_PASSWORD] : NULL,
			array_key_exists(ROW_GENERAL_RADIO_NAME, $genSettingsMap) ? $genSettingsMap[ROW_GENERAL_RADIO_NAME] : NULL);

	return $settings;
}

function readButtonDefinitions($baseValues, $personalValues) {
	$buttonDefinitionsMap = array();

	if (count($baseValues) != 0) {
		processKeyValueRow($buttonDefinitionsMap, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processKeyValueRow($buttonDefinitionsMap, $personalValues);
	}

	$buttonDefinitions = new ButtonsDefinitions(
			array_key_exists(ROW_BUTTONS_LONG_PRESS_DURATION_MS, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_LONG_PRESS_DURATION_MS] : NULL,
			array_key_exists(ROW_BUTTONS_SIDE_BUTTON_1_SHORT_PRESS, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_SIDE_BUTTON_1_SHORT_PRESS] : NULL,
			array_key_exists(ROW_BUTTONS_SIDE_BUTTON_1_LONG_PRESS, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_SIDE_BUTTON_1_LONG_PRESS] : NULL,
			array_key_exists(ROW_BUTTONS_SIDE_BUTTON_2_SHORT_PRESS, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_SIDE_BUTTON_2_SHORT_PRESS] : NULL,
			array_key_exists(ROW_BUTTONS_SIDE_BUTTON_2_LONG_PRESS, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_SIDE_BUTTON_2_LONG_PRESS] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_1, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_1] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_1_CALL, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_1_CALL] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_1_MESSAGE, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_1_MESSAGE] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_2, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_2] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_2_CALL, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_2_CALL] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_2_MESSAGE, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_2_MESSAGE] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_3, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_3] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_3_CALL, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_3_CALL] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_3_MESSAGE, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_3_MESSAGE] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_4, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_4] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_4_CALL, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_4_CALL] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_4_MESSAGE, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_4_MESSAGE] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_5, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_5] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_5_CALL, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_5_CALL] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_5_MESSAGE, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_5_MESSAGE] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_6, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_6] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_6_CALL, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_6_CALL] : NULL,
			array_key_exists(ROW_BUTTONS_ONE_TOUCH_ACCESS_6_MESSAGE, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_ONE_TOUCH_ACCESS_6_MESSAGE] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_0, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_0] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_1, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_1] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_2, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_2] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_3, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_3] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_4, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_4] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_5, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_5] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_6, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_6] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_7, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_7] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_8, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_8] : NULL,
			array_key_exists(ROW_BUTTONS_QUICK_ACCESS_9, $buttonDefinitionsMap) ? $buttonDefinitionsMap[ROW_BUTTONS_QUICK_ACCESS_9] : NULL
		);

	return $buttonDefinitions;
}

function processContactRows(&$contactArr, $values) {
	foreach ($values as $row) {
		$contactArr[] = new Contact($row[0], $row[1], $row[2], $row[3] === 'Y');
	}
}

function readContactList($baseValues, $personalValues) {
	$contactArr = array();

	if (count($baseValues) != 0) {
		processContactRows($contactArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processContactRows($contactArr, $personalValues);
	}

	return $contactArr;
}


function readChannelColumns($channelColumns) {
	$row = $channelColumns[0];
	$rowCount = count($row);
	$columnMap = array();

	for ($i = 0; $i < $rowCount; $i++) {
		$columnMap[$row[$i]] = $i;
	}

	return $columnMap;
}

function readChannelList($baseValues, $baseChannelColumns, $personalValues, $personalChannelColumns) {
	$channelArr = array();

	$baseColumnMap = readChannelColumns($baseChannelColumns);
	if (count($baseValues) != 0) {
		$channelArr = processChannelRows($channelArr, $baseValues, $baseColumnMap);
	}

	if ($personalValues != null) {
		$personalColumnMap = readChannelColumns($personalChannelColumns);

		if (count($personalValues) != 0) {
			$channelArr = processChannelRows($channelArr, $personalValues, $personalColumnMap);
		}
	}

	return $channelArr;
}

function processChannelRows(&$channelArr, $values, &$columnMap) {
	foreach ($values as $row) {
		$rowSize = count($row);
		$channel = new Channel(
				$rowSize > $columnMap[COL_CHANNEL_NAME] ? $row[$columnMap[COL_CHANNEL_NAME]] : NULL, //$channelName
				$rowSize > $columnMap[COL_CHANNEL_LONE_WORKER] ? $row[$columnMap[COL_CHANNEL_LONE_WORKER]] === 'On' : FALSE, //$isLoneWorker
				$rowSize > $columnMap[COL_CHANNEL_SQUELCH] ? $row[$columnMap[COL_CHANNEL_SQUELCH]] : NULL, //$squelch
				$rowSize > $columnMap[COL_CHANNEL_AUTOSCAN] ? $row[$columnMap[COL_CHANNEL_AUTOSCAN]] === 'On' : FALSE, //$isAutoScan
				$rowSize > $columnMap[COL_CHANNEL_BANDWIDTH] ? $row[$columnMap[COL_CHANNEL_BANDWIDTH]] : NULL, //$bandwidth
				$rowSize > $columnMap[COL_CHANNEL_CHANNEL_MODE] ? $row[$columnMap[COL_CHANNEL_CHANNEL_MODE]] : NULL, //$mode
				$rowSize > $columnMap[COL_CHANNEL_COLOR_CODE] ? $row[$columnMap[COL_CHANNEL_COLOR_CODE]] : NULL, //$colorCode
				$rowSize > $columnMap[COL_CHANNEL_REPEATER_SLOT] ? $row[$columnMap[COL_CHANNEL_REPEATER_SLOT]] : NULL, //$slot
				$rowSize > $columnMap[COL_CHANNEL_RX_ONLY] ? $row[$columnMap[COL_CHANNEL_RX_ONLY]] === 'On' : FALSE, //$isRxOnly
				$rowSize > $columnMap[COL_CHANNEL_ALLOW_TALKAROUND] ? $row[$columnMap[COL_CHANNEL_ALLOW_TALKAROUND]] === 'On' : FALSE, //$isAllowTalkaround
				$rowSize > $columnMap[COL_CHANNEL_DATA_CALL_CONFIRMED] ? $row[$columnMap[COL_CHANNEL_DATA_CALL_CONFIRMED]] === 'On' : FALSE, //$isDataCallConf
				$rowSize > $columnMap[COL_CHANNEL_PRIVATE_CALL_CONFIRMED] ? $row[$columnMap[COL_CHANNEL_PRIVATE_CALL_CONFIRMED]] === 'On' : FALSE, //$isPrivateCallConf
				$rowSize > $columnMap[COL_CHANNEL_DISPLAY_PTT_ID] ? $row[$columnMap[COL_CHANNEL_DISPLAY_PTT_ID]] === 'On' : FALSE, //$isDisplayPttId
				$rowSize > $columnMap[COL_CHANNEL_COMPRESSED_UDP_HEADER] ? $row[$columnMap[COL_CHANNEL_COMPRESSED_UDP_HEADER]] === 'On' : FALSE, //$isCompressedUdpHeader
				$rowSize > $columnMap[COL_CHANNEL_RX_REF_FREQ] ? $row[$columnMap[COL_CHANNEL_RX_REF_FREQ]] : NULL, //$rxRefFrequency
				$rowSize > $columnMap[COL_CHANNEL_ADMIT_CRITERIA] ? $row[$columnMap[COL_CHANNEL_ADMIT_CRITERIA]] : NULL, //$admitCriteria
				$rowSize > $columnMap[COL_CHANNEL_POWER] ? $row[$columnMap[COL_CHANNEL_POWER]] : NULL, //$power
				$rowSize > $columnMap[COL_CHANNEL_VOX] ? $row[$columnMap[COL_CHANNEL_VOX]] === 'On' : FALSE, //$isVox
				$rowSize > $columnMap[COL_CHANNEL_QT_REVERSE] ? $row[$columnMap[COL_CHANNEL_QT_REVERSE]] : NULL, //$qtReverse
				$rowSize > $columnMap[COL_CHANNEL_REVERSE_BURST] ? $row[$columnMap[COL_CHANNEL_REVERSE_BURST]] === 'On' : FALSE, //$isReverseBurst
				$rowSize > $columnMap[COL_CHANNEL_TX_REF_FREQ] ? $row[$columnMap[COL_CHANNEL_TX_REF_FREQ]] : NULL, //$txRefFrequency
				$rowSize > $columnMap[COL_CHANNEL_CONTACT_NAME] ? $row[$columnMap[COL_CHANNEL_CONTACT_NAME]] : NULL, //$contactName
				$rowSize > $columnMap[COL_CHANNEL_TOT] ? $row[$columnMap[COL_CHANNEL_TOT]] : NULL, //$tot
				$rowSize > $columnMap[COL_CHANNEL_TOT_REKEY_DELAY] ? $row[$columnMap[COL_CHANNEL_TOT_REKEY_DELAY]] : NULL, //$totRekeyDelay
				$rowSize > $columnMap[COL_CHANNEL_SCAN_LIST] ? $row[$columnMap[COL_CHANNEL_SCAN_LIST]] : NULL, //$scanListName
				$rowSize > $columnMap[COL_CHANNEL_GROUP_LIST] ? $row[$columnMap[COL_CHANNEL_GROUP_LIST]] : NULL, //$groupListName
				$rowSize > $columnMap[COL_CHANNEL_DECODE18] ? $row[$columnMap[COL_CHANNEL_DECODE18]] : NULL, //$decode18
				$rowSize > $columnMap[COL_CHANNEL_RX_FREQ] ? $row[$columnMap[COL_CHANNEL_RX_FREQ]] : NULL, //$rxFrequency
				$rowSize > $columnMap[COL_CHANNEL_TX_FREQ] ? $row[$columnMap[COL_CHANNEL_TX_FREQ]] : NULL, //$txFrequency
				$rowSize > $columnMap[COL_CHANNEL_CTCSS_DCS_DECODE] ? $row[$columnMap[COL_CHANNEL_CTCSS_DCS_DECODE]] : NULL, //$ctcssDcsDecode
				$rowSize > $columnMap[COL_CHANNEL_CTCSS_DCS_ENCODE] ? $row[$columnMap[COL_CHANNEL_CTCSS_DCS_ENCODE]] : NULL, //$ctcssDcsEncode
				$rowSize > $columnMap[COL_CHANNEL_TX_SIGNALING_SYSTEM] ? $row[$columnMap[COL_CHANNEL_TX_SIGNALING_SYSTEM]] : NULL, //$txSignalingSystem
				$rowSize > $columnMap[COL_CHANNEL_RX_SIGNALING_SYSTEM] ? $row[$columnMap[COL_CHANNEL_RX_SIGNALING_SYSTEM]] : NULL //$rxSignalingSystem
				);
		if (strlen($channel->getChannelName()) > 16) {
			addError("Channel name too long: ".$channel->getChannelName());
		}
		if ($channel->getMode() != 'Digital' && $channel->getMode() != 'Analog') {
			addError("Invalid channel mode for channel ".$channel->getChannelName().': '.$channel->getMode());
		}
		if ($channel->getSquelch() != 'Normal' && $channel->getSquelch() != 'Tight') {
			addError("Invalid squelch setting for channel ".$channel->getChannelName().': '.$channel->getSquelch());
		}
		if ($channel->getBandwidth() != '12.5' && $channel->getBandwidth() != '25.0') {
			addError("Invalid bandwidth setting for channel ".$channel->getChannelName().': '.$channel->getBandwidth());
		}
		if ($channel->getRxRefFrequency() != 'Low' && $channel->getRxRefFrequency() != 'Medium' && $channel->getRxRefFrequency() != 'High') {
			addError("Invalid rx reference frequency setting for channel ".$channel->getChannelName().': '.$channel->getRxRefFrequency());
		}
		if ($channel->getTxRefFrequency() != 'Low' && $channel->getTxRefFrequency() != 'Medium' && $channel->getTxRefFrequency() != 'High') {
			addError("Invalid tx reference frequency setting for channel ".$channel->getChannelName().': '.$channel->getTxRefFrequency());
		}
		if ($channel->getAdmitCriteria() != 'Always' && $channel->getAdmitCriteria() != 'Channel Free' && $channel->getAdmitCriteria() != 'CTCSS/DCS' && $channel->getAdmitCriteria() != 'Color Code') {
			addError("Invalid admit criteria setting for channel ".$channel->getChannelName().': '.$channel->getAdmitCriteria());
		}
		if ($channel->getPower() != 'Low' && $channel->getPower() != 'High') {
			addError("Invalid power setting for channel ".$channel->getChannelName().': '.$channel->getPower());
		}
		if (!is_numeric($channel->getTot()) || $channel->getTot() < 0 || $channel->getTot() >= 555 || $channel->getTot() % 15 != 0) {
			addError("Invalid TOT setting for channel ".$channel->getChannelName().': '.$channel->getTot());
		}
		if (!is_numeric($channel->getTotRekeyDelay()) || $channel->getTotRekeyDelay() < 0 || $channel->getTotRekeyDelay() > 255) {
			addError("Invalid TOT setting for channel ".$channel->getChannelName().': '.$channel->getTot());
		}
		if (!is_numeric($channel->getRxFrequency()) || $channel->getRxFrequency() < 400.0 || $channel->getRxFrequency() > 480.0) {
			addError("Invalid rx frequency setting for channel ".$channel->getChannelName().': '.$channel->getRxFrequency());
		}
		if (!is_numeric($channel->getTxFrequency()) || $channel->getTxFrequency() < 400.0 || $channel->getTxFrequency() > 480.0) {
			addError("Invalid tx frequency setting for channel ".$channel->getChannelName().': '.$channel->getTxFrequency());
		}
		if ($channel->getMode() == 'Digital') {
			if ($channel->getColorCode() < 0 || $channel->getColorCode() > 15) {
				addError("Invalid color code for channel ".$channel->getChannelName().': '.$channel->getColorCode());
			}
			if ($channel->getSlot() != 'TS1' && $channel->getSlot() != 'TS2') {
				addError("Invalid time slot setting for channel ".$channel->getChannelName().': '.$channel->getSlot());
			}
		} else if ($channel->getMode() == 'Analog') {
			if ($channel->getQtReverse() != '120' && $channel->getQtReverse() != '180') {
				addError("Invalid qt reverse setting for channel ".$channel->getChannelName().': '.$channel->getQtReverse());
			}
			if ((!is_numeric($channel->getDecode18()) || $channel->getDecode18() < 0 || $channel->getDecode18() > 255) && $channel->getDecode18() != '') {
				addError("Invalid Decode18 setting for channel ".$channel->getChannelName().': '.$channel->getDecode18());
			}
			if (!preg_match("/\d{2,3}.\d/", $channel->getCtcssDcsDecode()) && !preg_match("/D\d\d\d[NI]/", $channel->getCtcssDcsDecode()) && $channel->getCtcssDcsDecode() != '') {
				addError("Invalid CTCSS/DCS decode setting for channel ".$channel->getChannelName().': '.$channel->getCtcssDcsDecode());
			}
			if (!preg_match("/\d{2,3}.\d/", $channel->getCtcssDcsEncode()) && !preg_match("/D\d\d\d[NI]/", $channel->getCtcssDcsEncode()) && $channel->getCtcssDcsEncode() != '') {
				addError("Invalid CTCSS/DCS encode setting for channel ".$channel->getChannelName().': '.$channel->getCtcssDcsEncode());
			}
			if (!preg_match("/DTMF-[1234]/", $channel->getTxSignalingSystem()) && $channel->getTxSignalingSystem() != 'Off') {
				addError("Invalid tx signalling system setting for channel ".$channel->getChannelName().': '.$channel->getTxSignalingSystem());
			}
			if (!preg_match("/DTMF-[1234]/", $channel->getRxSignalingSystem()) && $channel->getRxSignalingSystem() != 'Off') {
				addError("Invalid rx signalling system setting for channel ".$channel->getChannelName().': '.$channel->getRxSignalingSystem());
			}
		}
		$channelArr[] = $channel;
	}

	return $channelArr;
}

function readTextMessages($baseValues, $personalValues) {
	$textArr = array();

	if (count($baseValues) != 0) {
		processTextMessageRow($textArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processTextMessageRow($textArr, $personalValues);
	}

	return $textArr;
}

function processTextMessageRow(&$textArr, $values) {
	foreach ($values as $row) {
		if (count($row) < 1) {
			continue;
		}
		$textArr[] = new TextMessage($row[0]);
	}
}

function processRxGroupListRows(&$groupListArr, $values) {
	foreach ($values as $row) {
		$contactArr = array();
		for ($ci = 0; $ci < 32 && ($ci + 1) < count($row) &&  $row[$ci + 1] != NULL && $row[$ci + 1] != ''; $ci++) {
			$contactArr[] = $row[$ci + 1];
		}
		$groupListArr[] = new RxGroupList($row[0], $contactArr);
	}
}

function readRxGroupLists($baseValues, $personalValues) {
	$listArr = array();

	if (count($baseValues) != 0) {
		processRxGroupListRows($listArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processRxGroupListRows($listArr, $personalValues);
	}

	return $listArr;
}

function processScanListRows(&$scanListArr, $values) {
	foreach ($values as $row) {
		if (count($row) < 7 || $row[0] == NULL || $row[0] == '') {
			continue;
		}
		$channelArr = array();
		if (count($row) > 7) {
			for ($ci = 0; $ci < 33 && ($ci + 7) < count($row) && $row[$ci + 7] != NULL && $row[$ci + 7] != ''; $ci++) {
				$channelArr[] = $row[$ci + 7];
			}
		}
		$scanListArr[] = new ScanList($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $channelArr);
	}
}

function readScanLists($baseValues, $personalValues) {
	$listArr = array();

	if (count($baseValues) != 0) {
		processScanListRows($listArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processScanListRows($listArr, $personalValues);
	}

	return $listArr;
}

function processZoneInfoRow(&$zoneInfoArr, $values) {
	foreach ($values as $row) {
		if (count($row) < 1) {
			continue;
		}
		$channelArr = array();
		for ($ci = 1; $ci <= 16 && $ci < count($row) && $row[$ci] != NULL && $row[$ci] != ''; $ci++) {
			$channelArr[] = $row[$ci];
		}
		$zoneInfoArr[] = new ZoneInfo($row[0], $channelArr);
	}
}

function readZoneInfoList($baseValues, $personalValues) {
	$zoneArr = array();

	if (count($baseValues) != 0) {
		processZoneInfoRow($zoneArr, $baseValues);
	}

	if ($personalValues != null && count($personalValues) != 0) {
		processZoneInfoRow($zoneArr, $personalValues);
	}

	return $zoneArr;
}

function getGeneralSettingByFieldName(&$generalSettings, &$fieldName) {
	switch ($fieldName) {
		case ROW_GENERAL_BACKLIGHT_TIME: return $generalSettings->getBacklightTime();
		case ROW_GENERAL_CALL_ALERT_TONE: return $generalSettings->getCallAlertToneDuration();
		case ROW_GENERAL_CH_FREE_TONE: return $generalSettings->isChFreeIndicationTone() ? 'On' : 'Off';
		case ROW_GENERAL_DISABLE_ALL_TONE: return $generalSettings->isDisableAllTone() ? 'On' : 'Off';
		case ROW_GENERAL_DISABLE_LEDS: return $generalSettings->isDisableAllLeds() ? 'On' : 'Off';
		case ROW_GENERAL_GROUP_CALL_HANG_TIME: return $generalSettings->getGroupCallHangTime();
		case ROW_GENERAL_INFO1: return $generalSettings->getInfoScreenLine1();
		case ROW_GENERAL_INFO2: return $generalSettings->getInfoScreenLine2();
		case ROW_GENERAL_INTRO_SCREEN: return $generalSettings->getIntroScreen();
		case ROW_GENERAL_KEYPAD_LOCK_TIME: return $generalSettings->getKeypadLockTime();
		case ROW_GENERAL_LONE_WORKER_REMIND: return $generalSettings->getLoneWorkerReminderTime();
		case ROW_GENERAL_LONE_WORKER_RESP: return $generalSettings->getLoneWorkerRespTime();
		case ROW_GENERAL_MODE: return $generalSettings->getMode();
		case ROW_GENERAL_MONITOR_TYPE: return $generalSettings->getMonitorType();
		case ROW_GENERAL_PASSWORD_ENABLE: return $generalSettings->isPasswordAndLockEnable() ? 'On' : 'Off';
		case ROW_GENERAL_PC_PROGRAM_PASSWORD: return $generalSettings->getPcProgramPassword();
		case ROW_GENERAL_POWER_ON_PASSWORD: return $generalSettings->getPowerOnPassword();
		case ROW_GENERAL_PRIVATE_CALL_HANG_TIME: return $generalSettings->getPrivateCallHangTime();
		case ROW_GENERAL_RADIO_ID: return $generalSettings->getRadioId();
		case ROW_GENERAL_RADIO_NAME: return $generalSettings->getRadioName();
		case ROW_GENERAL_RADIO_PROGRAM_PASSWORD: return $generalSettings->getRadioProgramPassword();
		case ROW_GENERAL_RX_LOW_BATT: return $generalSettings->getRxLowBatteryInterval();
		case ROW_GENERAL_SAVE_MODE_RECV: return $generalSettings->isSaveModeReceive() ? 'On' : 'Off';
		case ROW_GENERAL_SAVE_PREAMBLE: return $generalSettings->isSavePreamble() ? 'On' : 'Off';
		case ROW_GENERAL_SCAN_ANALOG_HANG_TIME: return $generalSettings->getScanAnalogHangTime();
		case ROW_GENERAL_SCAN_DIGITAL_HANG_TIME: return $generalSettings->getScanDigitalHangTime();
		case ROW_GENERAL_TALK_PERMIT_TONE: return $generalSettings->getTalkPermitTone();
		case ROW_GENERAL_TX_PREAMBLE: return $generalSettings->getTxPreamble();
		case ROW_GENERAL_VOX_SENSITIVITY: return $generalSettings->getVoxSensitivity();
		default: return '';
	}
}

function convertToSpreadsheetValuesFromGeneralSettings(&$generalSettings, &$oldSettings) {
	$values = array();

	foreach ($oldSettings as $oldRow) {
		if (count($oldRow) > 0 && strlen($oldRow[0]) > 0) { 
			$values[] = array($oldRow[0], getGeneralSettingByFieldName($generalSettings, $oldRow[0]));
		} else {
			$values[] = array();
		}
	}
	return $values;
}

function convertBooleanToChecked($boolean) {
	return $boolean ? 'Checked' : 'Unchecked';
}

function getMenuItemByFieldName(&$menuItems, &$fieldName) {
	switch ($fieldName) {
		case ROW_MENU_ANSWERED: return convertBooleanToChecked($menuItems->isAnswered());
		case ROW_MENU_BACKLIGHT: return convertBooleanToChecked($menuItems->isBacklight());
		case ROW_MENU_CALL_ALERT: return convertBooleanToChecked($menuItems->isCallAlert());
		case ROW_MENU_DISPLAY_MODE: return convertBooleanToChecked($menuItems->isDisplayMode());
		case ROW_MENU_EDIT: return convertBooleanToChecked($menuItems->isEdit());
		case ROW_MENU_EDIT_LIST: return convertBooleanToChecked($menuItems->isEditList());
		case ROW_MENU_INTRO_SCREEN: return convertBooleanToChecked($menuItems->isIntroScreen());
		case ROW_MENU_KEYBOARD_LOCK: return convertBooleanToChecked($menuItems->isKeyboardLock());
		case ROW_MENU_LED_INDICATOR: return convertBooleanToChecked($menuItems->isLedIndicator());
		case ROW_MENU_MANUAL_DIAL: return convertBooleanToChecked($menuItems->isManualDial());
		case ROW_MENU_MENU_HANG_TIME: return $menuItems->getMenuHangTime();
		case ROW_MENU_MISSED: return convertBooleanToChecked($menuItems->isMissed());
		case ROW_MENU_OUTGOING_RADIO: return convertBooleanToChecked($menuItems->isOutgoingRadio());
		case ROW_MENU_PASSWORD_AND_LOCK: return convertBooleanToChecked($menuItems->isPasswordAndLock());
		case ROW_MENU_POWER: return convertBooleanToChecked($menuItems->isPower());
		case ROW_MENU_PROGRAM_KEY: return convertBooleanToChecked($menuItems->isProgramKey());
		case ROW_MENU_PROGRAM_RADIO: return convertBooleanToChecked($menuItems->isProgramRadio());
		case ROW_MENU_RADIO_CHECK: return convertBooleanToChecked($menuItems->isRadioCheck());
		case ROW_MENU_RADIO_DISABLE: return convertBooleanToChecked($menuItems->isRadioDisable());
		case ROW_MENU_RADIO_ENABLE: return convertBooleanToChecked($menuItems->isRadioEnable());
		case ROW_MENU_REMOTE_MONITOR: return convertBooleanToChecked($menuItems->isRemoteMonitor());
		case ROW_MENU_SCAN: return convertBooleanToChecked($menuItems->isScan());
		case ROW_MENU_SQUELCH: return convertBooleanToChecked($menuItems->isSquelch());
		case ROW_MENU_TALKAROUND: return convertBooleanToChecked($menuItems->isTalkaround());
		case ROW_MENU_TEXT_MESSAGE: return convertBooleanToChecked($menuItems->isTextMessage());
		case ROW_MENU_TONE_OR_ALERT: return convertBooleanToChecked($menuItems->isToneOrAlert());
		case ROW_MENU_VOX: return convertBooleanToChecked($menuItems->isVox());
		default: return '';
	}
}

function convertToSpreadsheetValuesFromMenuItems(&$menuItems, &$oldSettings) {
	$values = array();

	foreach ($oldSettings as $oldRow) {
		if (count($oldRow) > 0 && strlen($oldRow[0]) > 0) {
			$values[] = array($oldRow[0], getMenuItemByFieldName($menuItems, $oldRow[0]));
		} else {
			$values[] = array();
		}
	}
	return $values;
}

function getButtonDefinitionByFieldName(&$buttonDefinitions, &$fieldName) {
	switch ($fieldName) {
		case ROW_BUTTONS_LONG_PRESS_DURATION_MS: return $buttonDefinitions->getLongPressDuration();
		case ROW_BUTTONS_SIDE_BUTTON_1_SHORT_PRESS: return $buttonDefinitions->getSideButton1ShortPress();
		case ROW_BUTTONS_SIDE_BUTTON_1_LONG_PRESS: return $buttonDefinitions->getSideButton1LongPress();
		case ROW_BUTTONS_SIDE_BUTTON_2_SHORT_PRESS: return $buttonDefinitions->getSideButton2ShortPress();
		case ROW_BUTTONS_SIDE_BUTTON_2_LONG_PRESS: return $buttonDefinitions->getSideButton2LongPress();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_1: return $buttonDefinitions->getOneTouch1();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_1_CALL: return $buttonDefinitions->getOneTouch1Call();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_1_MESSAGE: return $buttonDefinitions->getOneTouch1Message();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_2: return $buttonDefinitions->getOneTouch2();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_2_CALL: return $buttonDefinitions->getOneTouch2Call();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_2_MESSAGE: return $buttonDefinitions->getOneTouch2Message();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_3: return $buttonDefinitions->getOneTouch3();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_3_CALL: return $buttonDefinitions->getOneTouch3Call();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_3_MESSAGE: return $buttonDefinitions->getOneTouch3Message();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_4: return $buttonDefinitions->getOneTouch4();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_4_CALL: return $buttonDefinitions->getOneTouch4Call();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_4_MESSAGE: return $buttonDefinitions->getOneTouch4Message();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_5: return $buttonDefinitions->getOneTouch5();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_5_CALL: return $buttonDefinitions->getOneTouch5Call();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_5_MESSAGE: return $buttonDefinitions->getOneTouch5Message();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_6: return $buttonDefinitions->getOneTouch6();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_6_CALL: return $buttonDefinitions->getOneTouch6Call();
		case ROW_BUTTONS_ONE_TOUCH_ACCESS_6_MESSAGE: return $buttonDefinitions->getOneTouch6Message();
		case ROW_BUTTONS_QUICK_ACCESS_0: return $buttonDefinitions->getQuickKey0();
		case ROW_BUTTONS_QUICK_ACCESS_1: return $buttonDefinitions->getQuickKey1();
		case ROW_BUTTONS_QUICK_ACCESS_2: return $buttonDefinitions->getQuickKey2();
		case ROW_BUTTONS_QUICK_ACCESS_3: return $buttonDefinitions->getQuickKey3();
		case ROW_BUTTONS_QUICK_ACCESS_4: return $buttonDefinitions->getQuickKey4();
		case ROW_BUTTONS_QUICK_ACCESS_5: return $buttonDefinitions->getQuickKey5();
		case ROW_BUTTONS_QUICK_ACCESS_6: return $buttonDefinitions->getQuickKey6();
		case ROW_BUTTONS_QUICK_ACCESS_7: return $buttonDefinitions->getQuickKey7();
		case ROW_BUTTONS_QUICK_ACCESS_8: return $buttonDefinitions->getQuickKey8();
		case ROW_BUTTONS_QUICK_ACCESS_9: return $buttonDefinitions->getQuickKey9();
		default: return '';
	}
}

function convertToSpreadsheetValuesFromButtonsDefinitions(&$buttonDefinitions, &$oldSettings) {
	$values = array();
	
	foreach ($oldSettings as $oldRow) {
		if (count($oldRow) > 0 && strlen($oldRow[0]) > 0) {
			$values[] = array($oldRow[0], getButtonDefinitionByFieldName($buttonDefinitions, $oldRow[0]));
		} else {
			$values[] = array();
		}
	}
	return $values;
}

function getChannelAttributeByColumnName(&$channel, &$colName, &$scanListArr) {
	switch ($colName) {
		case COL_CHANNEL_ADMIT_CRITERIA: return $channel->getAdmitCriteria();
		case COL_CHANNEL_ALLOW_TALKAROUND: return $channel->isAllowTalkaround() ? 'On' : 'Off';
		case COL_CHANNEL_AUTOSCAN: return $channel->isAutoScan() ? 'On' : 'Off';
		case COL_CHANNEL_BANDWIDTH: return $channel->getBandwidth();
		case COL_CHANNEL_CHANNEL_MODE: return $channel->getMode();
		case COL_CHANNEL_COLOR_CODE: return $channel->getColorCode();
		case COL_CHANNEL_COMPRESSED_UDP_HEADER: return $channel->isCompressedUdpHeader() ? 'On' : 'Off';
		case COL_CHANNEL_CONTACT_NAME: return $channel->getContactName();
		case COL_CHANNEL_CTCSS_DCS_DECODE: return $channel->getCtcssDcsDecode();
		case COL_CHANNEL_CTCSS_DCS_ENCODE: return $channel->getCtcssDcsEncode();
		case COL_CHANNEL_DATA_CALL_CONFIRMED: return $channel->isDataCallConf() ? 'On' : 'Off';
		case COL_CHANNEL_DECODE18: return $channel->getDecode18();
		case COL_CHANNEL_DISPLAY_PTT_ID: return $channel->isDisplayPttId() ? 'On' : 'Off';
		case COL_CHANNEL_GROUP_LIST: return $channel->getGroupListName();
		case COL_CHANNEL_LONE_WORKER: return $channel->isLoneWorker() ? 'On' : 'Off';
		case COL_CHANNEL_NAME: return $channel->getChannelName();
		case COL_CHANNEL_POWER: return $channel->getPower();
		case COL_CHANNEL_PRIVATE_CALL_CONFIRMED: return $channel->isPrivateCallConf() ? 'On' : 'Off';
		case COL_CHANNEL_QT_REVERSE: return $channel->getQtReverse();
		case COL_CHANNEL_REPEATER_SLOT: return $channel->getSlot();
		case COL_CHANNEL_REVERSE_BURST: return $channel->isReverseBurst() ? 'On' : 'Off';
		case COL_CHANNEL_RX_FREQ: return $channel->getRxFrequency();
		case COL_CHANNEL_RX_ONLY: return $channel->isRxOnly() ? 'On' : 'Off';
		case COL_CHANNEL_RX_REF_FREQ: return $channel->getRxRefFrequency();
		case COL_CHANNEL_RX_SIGNALING_SYSTEM: return $channel->getRxSignalingSystem();
		case COL_CHANNEL_SCAN_LIST: return findScanListNameFromOriginalIndex($scanListArr, $channel->getImportScanListIndex());
		case COL_CHANNEL_SQUELCH: return $channel->getSquelch();
		case COL_CHANNEL_TOT: return ($channel->getTot() == 0) ? '0' : $channel->getTot();
		case COL_CHANNEL_TOT_REKEY_DELAY: return $channel->getTotRekeyDelay();
		case COL_CHANNEL_TX_FREQ: return $channel->getTxFrequency();
		case COL_CHANNEL_TX_REF_FREQ: return $channel->getTxRefFrequency();
		case COL_CHANNEL_TX_SIGNALING_SYSTEM: return $channel->getTxSignalingSystem();
		case COL_CHANNEL_VOX: return $channel->isVox() ? 'On' : 'Off';
	}
	return NULL;
}

function convertToSpreadsheetValuesFromChannels($objArr, &$channelColumns, &$scanListArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		foreach ($channelColumns as $col) {
			$colVal = getChannelAttributeByColumnName($obj, $col, $scanListArr);
			if ($colVal == NULL) {
				$colVal = '';
			}
			$row[] = $colVal;
		}
		$values[] = $row;
	}
	return $values;
}

function convertToSpreadsheetValuesFromContacts($contactsArr) {
	$values = array();
	foreach ($contactsArr as $contact) {
		$values[] = array($contact->getContactName(), $contact->getContactNum(),
				$contact->getContactType(), $contact->isCallReceiveTone() ? 'Y' : 'N');
	}
	return $values;
}

function convertToSpreadsheetValuesFromRxGroupLists($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getGroupListName();
		foreach ($obj->getContactNames() as $contactName) {
			$row[] = $contactName;
		}
		$values[] = $row;
	}
	return $values;
}

function convertToSpreadsheetValuesFromScanLists($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getScanListName();
		$row[] = $obj->getPriorityChannel1();
		$row[] = $obj->getPriorityChannel2();
		$row[] = $obj->getTxDesignatedChannel();
		$row[] = $obj->getSignalHoldTime();
		$row[] = $obj->getPrioritySampleTime();
		$row[] = 'Last';
		foreach ($obj->getChannelNames() as $channelName) {
			$row[] = $channelName;
		}
		$values[] = $row;
	}
	return $values;
}

function convertToSpreadsheetValuesFromTextMessages($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getText();
		$values[] = $row;
	}
	return $values;
}

function convertToSpreadsheetValuesFromZones($objArr) {
	$values = array();
	foreach ($objArr as $obj) {
		$row = array();
		$row[] = $obj->getZoneName();
		foreach ($obj->getChannelNames() as $channelName) {
			$row[] = $channelName;
		}
		$values[] = $row;
	}
	return $values;
}

function readMetadataFromSpreadsheet($gService, $spreadsheetId) {
	$ranges = array(
			DATA_KEY_CHANNEL_COLUMNS,
			DATA_KEY_GENERAL_SETTINGS,
			DATA_KEY_MENU_ITEMS,
			DATA_KEY_BUTTON_DEFINITIONS,
	);
	$params = array(
			'ranges' => $ranges
	);
	$rangeContents = $gService->spreadsheets_values->batchGet($spreadsheetId, $params);
	$results = array();
	$results[DATA_KEY_CHANNEL_COLUMNS] = $rangeContents->valueRanges[0]->values;
	$results[DATA_KEY_GENERAL_SETTINGS] = $rangeContents->valueRanges[1]->values;
	$results[DATA_KEY_MENU_ITEMS] = $rangeContents->valueRanges[2]->values;
	$results[DATA_KEY_BUTTON_DEFINITIONS] = $rangeContents->valueRanges[3]->values;
	return $results;
}

function readAllDataFromSpreadsheet($gService, $spreadsheetId) {
	$ranges = array(
			DATA_KEY_CHANNEL_COLUMNS,
			DATA_KEY_CHANNELS,
			DATA_KEY_CONTACTS,
			DATA_KEY_GENERAL_SETTINGS,
			DATA_KEY_RX_GROUP_LISTS,
			DATA_KEY_SCAN_LISTS,
			DATA_KEY_TEXT,
			DATA_KEY_ZONES,
			DATA_KEY_MENU_ITEMS,
			DATA_KEY_BUTTON_DEFINITIONS
	);
	$params = array(
			'ranges' => $ranges
	);
	$rangeContents = $gService->spreadsheets_values->batchGet($spreadsheetId, $params);
	$results = array();
	$results[DATA_KEY_CHANNEL_COLUMNS] = $rangeContents->valueRanges[0]->values;
	$results[DATA_KEY_CHANNELS] = $rangeContents->valueRanges[1]->values;
	$results[DATA_KEY_CONTACTS] = $rangeContents->valueRanges[2]->values;
	$results[DATA_KEY_GENERAL_SETTINGS] = $rangeContents->valueRanges[3]->values;
	$results[DATA_KEY_RX_GROUP_LISTS] = $rangeContents->valueRanges[4]->values;
	$results[DATA_KEY_SCAN_LISTS] = $rangeContents->valueRanges[5]->values;
	$results[DATA_KEY_TEXT] = $rangeContents->valueRanges[6]->values;
	$results[DATA_KEY_ZONES] = $rangeContents->valueRanges[7]->values;
	$results[DATA_KEY_MENU_ITEMS] = $rangeContents->valueRanges[8]->values;
	$results[DATA_KEY_BUTTON_DEFINITIONS] = $rangeContents->valueRanges[9]->values;
	return $results;
}

function lookupDocumentId($docName) {
	$sheetsFile = file_get_contents(__DIR__ . "/../config/sheets.json");
	$sheetsData = json_decode($sheetsFile, true);
	if (isset($sheetsData['DMR base']) && isset($sheetsData['DMR base'][$docName])) {
		return $sheetsData['DMR base'][$docName]['id'];
	} else {
		return null;
	}
}

function retrieveSpreadsheetData($baseSpreadsheetId, $personalSpreadsheetId) {
	$gClient = getGoogleClient();
	try {
		$service = new Google_Service_Sheets($gClient);
		$baseSheetValues = readAllDataFromSpreadsheet($service, $baseSpreadsheetId);
		$personalSheetValues = array();
		if ($personalSpreadsheetId != null) {
			try {
				$personalSheetValues = readAllDataFromSpreadsheet($service, $personalSpreadsheetId);
			} catch (Google_Service_Exception $gse) {
				addError("Unable to read personal spreadsheet file with ID ".$personalSpreadsheetId);
			}
		}
		$genSettings = readGeneralSettings($baseSheetValues[DATA_KEY_GENERAL_SETTINGS],
				array_key_exists(DATA_KEY_GENERAL_SETTINGS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_GENERAL_SETTINGS] : null);
		$menuItems = readMenuItems($baseSheetValues[DATA_KEY_MENU_ITEMS],
				array_key_exists(DATA_KEY_MENU_ITEMS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_MENU_ITEMS] : null);
		$buttonDefinitions = readButtonDefinitions($baseSheetValues[DATA_KEY_BUTTON_DEFINITIONS],
				array_key_exists(DATA_KEY_BUTTON_DEFINITIONS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_BUTTON_DEFINITIONS] : null);
		$contactArr = readContactList($baseSheetValues[DATA_KEY_CONTACTS],
				array_key_exists(DATA_KEY_CONTACTS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_CONTACTS] : null);
		$groupListArr = readRxGroupLists($baseSheetValues[DATA_KEY_RX_GROUP_LISTS],
				array_key_exists(DATA_KEY_RX_GROUP_LISTS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_RX_GROUP_LISTS] : null);
		$channelArr = readChannelList($baseSheetValues[DATA_KEY_CHANNELS], $baseSheetValues[DATA_KEY_CHANNEL_COLUMNS],
				array_key_exists(DATA_KEY_CHANNELS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_CHANNELS] : null,
				array_key_exists(DATA_KEY_CHANNEL_COLUMNS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_CHANNEL_COLUMNS] : null);
		$scanListArr = readScanLists($baseSheetValues[DATA_KEY_SCAN_LISTS],
				array_key_exists(DATA_KEY_SCAN_LISTS, $personalSheetValues) ? $personalSheetValues[DATA_KEY_SCAN_LISTS] : null);
		$zoneArr = readZoneInfoList($baseSheetValues[DATA_KEY_ZONES],
				array_key_exists(DATA_KEY_ZONES, $personalSheetValues) ? $personalSheetValues[DATA_KEY_ZONES] : null);
		$textMessageArr = readTextMessages($baseSheetValues[DATA_KEY_TEXT],
				array_key_exists(DATA_KEY_TEXT, $personalSheetValues) ? $personalSheetValues[DATA_KEY_TEXT] : null);
	
		return new SpreadsheetData($genSettings, $menuItems, $buttonDefinitions, $channelArr, $contactArr, $groupListArr, $scanListArr, $textMessageArr, $zoneArr);
	} catch (Google_Service_Exception $e) {
		addError("Failed to retrieve spreadsheet data - check server log for details");
		error_log($e->getMessage());
		return null;
	}
}
?>