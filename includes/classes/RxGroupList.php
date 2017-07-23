<?php
class RxGroupList {
	private $groupListName;
	private $contactNames;
	private $originalIndex;

	public function __construct($groupListName, $contactNames, $originalIndex = NULL) {
		$this->groupListName = $groupListName;
		$this->contactNames = $contactNames;
		$this->originalIndex = $originalIndex;
	}

	public function getGroupListName() { return $this->groupListName; }
	public function getContactNames() { return $this->contactNames; }
	public function getOriginalIndex() { return $this->originalIndex; }
}
?>