<?php
class SpreadsheetData {
	private $generalSettings;
	private $menuItemsMap;
	private $buttonDefinitions;
	private $channelArray;
	private $contactArray;
	private $rxGroupListArray;
	private $scanListArray;
	private $textMessageArray;
	private $zoneInfoArray;

	public function __construct($generalSettings,
								$menuItemsMap,
								$buttonDefinitions,
								$channelArray,
								$contactArray,
								$rxGroupListArray,
								$scanListArray,
								$textMessageArray,
								$zoneInfoArray) {
		$this->generalSettings = $generalSettings;
		$this->menuItemsMap = $menuItemsMap;
		$this->buttonDefinitions = $buttonDefinitions;
		$this->channelArray = $channelArray;
		$this->contactArray = $contactArray;
		$this->rxGroupListArray = $rxGroupListArray;
		$this->scanListArray = $scanListArray;
		$this->textMessageArray = $textMessageArray;
		$this->zoneInfoArray = $zoneInfoArray;
	}

	public function getGeneralSettings() { return $this->generalSettings; }
	public function getMenuItemsMap() { return $this->menuItemsMap; }
	public function getButtonDefinitions() { return $this->buttonDefinitions; }
	public function getChannelArray() { return $this->channelArray; }
	public function getContactArray() { return $this->contactArray; }
	public function getRxGroupListArray() { return $this->rxGroupListArray; }
	public function getScanListArray() { return $this->scanListArray; }
	public function getTextMessageArray() { return $this->textMessageArray; }
	public function getZoneInfoArray() { return $this->zoneInfoArray; }
}
?>