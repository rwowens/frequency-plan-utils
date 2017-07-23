<?php
class GeneralSettings {
	private $infoScreenLine1;
	private $infoScreenLine2;
	private $monitorType;
	private $isDisableAllLeds;
	private $talkPermitTone;
	private $isPasswordAndLockEnable;
	private $isChFreeIndicationTone;
	private $isDisableAllTone;
	private $isSaveModeReceive;
	private $isSavePreamble;
	private $introScreen;
	private $radioId;
	private $txPreamble;
	private $groupCallHangTime;
	private $privateCallHangTime;
	private $voxSensitivity;
	private $rxLowBatteryInterval;
	private $callAlertToneDuration;
	private $loneWorkerRespTime;
	private $loneWorkerReminderTime;
	private $scanDigitalHangTime;
	private $scanAnalogHangTime;
	private $keypadLockTime;
	private $backlightTime;
	private $mode;
	private $powerOnPassword;
	private $radioProgramPassword;
	private $pcProgramPassword;
	private $radioName;

	public function __construct(
			$infoScreenLine1,
			$infoScreenLine2,
			$monitorType,
			$isDisableAllLeds,
			$talkPermitTone,
			$isPasswordAndLockEnable,
			$isChFreeIndicationTone,
			$isDisableAllTone,
			$isSaveModeReceive,
			$isSavePreamble,
			$introScreen,
			$radioId,
			$txPreamble,
			$groupCallHangTime,
			$privateCallHangTime,
			$voxSensitivity,
			$rxLowBatteryInterval,
			$callAlertToneDuration,
			$loneWorkerRespTime,
			$loneWorkerReminderTime,
			$scanDigitalHangTime,
			$scanAnalogHangTime,
			$keypadLockTime,
			$backlightTime,
			$mode,
			$powerOnPassword,
			$radioProgramPassword,
			$pcProgramPassword,
			$radioName) {
				$this->infoScreenLine1 = $infoScreenLine1;
				$this->infoScreenLine2 = $infoScreenLine2;
				$this->monitorType = $monitorType;
				$this->isDisableAllLeds = $isDisableAllLeds === 'On';
				$this->talkPermitTone = $talkPermitTone;
				$this->isPasswordAndLockEnable = $isPasswordAndLockEnable === 'On';
				$this->isChFreeIndicationTone = $isChFreeIndicationTone === 'On';
				$this->isDisableAllTone = $isDisableAllTone === 'On';
				$this->isSaveModeReceive = $isSaveModeReceive === 'On';
				$this->isSavePreamble = $isSavePreamble === 'On';
				$this->introScreen = $introScreen;
				$this->radioId = $radioId;
				$this->txPreamble = $txPreamble;
				$this->groupCallHangTime = $groupCallHangTime;
				$this->privateCallHangTime = $privateCallHangTime;
				$this->voxSensitivity = $voxSensitivity;
				$this->rxLowBatteryInterval = $rxLowBatteryInterval;
				$this->callAlertToneDuration = $callAlertToneDuration;
				$this->loneWorkerRespTime = $loneWorkerRespTime;
				$this->loneWorkerReminderTime = $loneWorkerReminderTime;
				$this->scanDigitalHangTime = $scanDigitalHangTime;
				$this->scanAnalogHangTime = $scanAnalogHangTime;
				$this->keypadLockTime = $keypadLockTime;
				$this->backlightTime = $backlightTime;
				$this->mode = $mode;
				$this->powerOnPassword = $powerOnPassword;
				$this->radioProgramPassword = $radioProgramPassword;
				$this->pcProgramPassword = $pcProgramPassword;
				$this->radioName = $radioName;
	}

	public function getInfoScreenLine1() { return $this->infoScreenLine1; }
	public function getInfoScreenLine2() { return $this->infoScreenLine2; }
	public function getMonitorType() { return $this->monitorType; }
	public function isDisableAllLeds() { return $this->isDisableAllLeds; }
	public function getTalkPermitTone() { return $this->talkPermitTone; }
	public function isPasswordAndLockEnable() { return $this->isPasswordAndLockEnable; }
	public function isChFreeIndicationTone() { return $this->isChFreeIndicationTone; }
	public function isDisableAllTone() { return $this->isDisableAllTone; }
	public function isSaveModeReceive() { return $this->isSaveModeReceive; }
	public function isSavePreamble() { return $this->isSavePreamble; }
	public function getIntroScreen() { return $this->introScreen; }
	public function getRadioId() { return $this->radioId; }
	public function getTxPreamble() { return $this->txPreamble; }
	public function getGroupCallHangTime() { return $this->groupCallHangTime; }
	public function getPrivateCallHangTime() { return $this->privateCallHangTime; }
	public function getVoxSensitivity() { return $this->voxSensitivity; }
	public function getRxLowBatteryInterval() { return $this->rxLowBatteryInterval; }
	public function getCallAlertToneDuration() { return $this->callAlertToneDuration; }
	public function getLoneWorkerRespTime() { return $this->loneWorkerRespTime; }
	public function getLoneWorkerReminderTime() { return $this->loneWorkerReminderTime; }
	public function getScanDigitalHangTime() { return $this->scanDigitalHangTime; }
	public function getScanAnalogHangTime() { return $this->scanAnalogHangTime; }
	public function getKeypadLockTime() { return $this->keypadLockTime; }
	public function getBacklightTime() { return $this->backlightTime; }
	public function getMode() { return $this->mode; }
	public function getPowerOnPassword() { return $this->powerOnPassword; }
	public function getRadioProgramPassword() { return $this->radioProgramPassword; }
	public function getPcProgramPassword() { return $this->pcProgramPassword; }
	public function getRadioName() { return $this->radioName; }
}
?>