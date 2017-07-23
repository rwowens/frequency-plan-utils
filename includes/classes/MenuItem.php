<?php
class MenuItem {
	private $isTextMessage;
	private $isCallAlert;
	private $isManualDial;
	private $isRemoteMonitor;
	private $isRadioEnable;
	private $isEdit;
	private $isRadioCheck;
	private $isProgramKey;
	private $isRadioDisable;
	private $isMissed;
	private $isOutgoingRadio;
	private $isAnswered;
	private $isTalkaround;
	private $isPower;
	private $isIntroScreen;
	private $isLedIndicator;
	private $isPasswordAndLock;
	private $isDisplayMode;
	private $isToneOrAlert;
	private $isBacklight;
	private $isKeyboardLock;
	private $isSquelch;
	private $isVox;
	private $isProgramRadio;
	private $isScan;
	private $isEditList;
	private $menuHangTime;

	public function __construct($isTextMessage,
			$isCallAlert,
			$isManualDial,
			$isRemoteMonitor,
			$isRadioEnable,
			$isEdit,
			$isRadioCheck,
			$isProgramKey,
			$isRadioDisable,
			$isMissed,
			$isOutgoingRadio,
			$isAnswered,
			$isTalkaround,
			$isPower,
			$isIntroScreen,
			$isLedIndicator,
			$isPasswordAndLock,
			$isDisplayMode,
			$isToneOrAlert,
			$isBacklight,
			$isKeyboardLock,
			$isSquelch,
			$isVox,
			$isProgramRadio,
			$isScan,
			$isEditList,
			$menuHangTime) {
				$this->isTextMessage = ($isTextMessage === 'Checked');
				$this->isCallAlert = ($isCallAlert === 'Checked');
				$this->isManualDial = ($isManualDial === 'Checked');
				$this->isRemoteMonitor = ($isRemoteMonitor === 'Checked');
				$this->isRadioEnable = ($isRadioEnable === 'Checked');
				$this->isEdit = ($isEdit === 'Checked');
				$this->isRadioCheck = ($isRadioCheck === 'Checked');
				$this->isProgramKey = ($isProgramKey === 'Checked');
				$this->isRadioDisable = ($isRadioDisable === 'Checked');
				$this->isMissed = ($isMissed === 'Checked');
				$this->isOutgoingRadio = ($isOutgoingRadio === 'Checked');
				$this->isAnswered = ($isAnswered === 'Checked');
				$this->isTalkaround = ($isTalkaround === 'Checked');
				$this->isPower = ($isPower === 'Checked');
				$this->isIntroScreen = ($isIntroScreen === 'Checked');
				$this->isLedIndicator = ($isLedIndicator === 'Checked');
				$this->isPasswordAndLock = ($isPasswordAndLock === 'Checked');
				$this->isDisplayMode = ($isDisplayMode === 'Checked');
				$this->isToneOrAlert = ($isToneOrAlert === 'Checked');
				$this->isBacklight = ($isBacklight === 'Checked');
				$this->isKeyboardLock = ($isKeyboardLock === 'Checked');
				$this->isSquelch = ($isSquelch === 'Checked');
				$this->isVox = ($isVox === 'Checked');
				$this->isProgramRadio = ($isProgramRadio === 'Checked');
				$this->isScan = ($isScan === 'Checked');
				$this->isEditList = ($isEditList === 'Checked');
				$this->menuHangTime = $menuHangTime;
	}

	public function isTextMessage() { return $this->isTextMessage; }
	public function isCallAlert() { return $this->isCallAlert; }
	public function isManualDial() { return $this->isManualDial; }
	public function isRemoteMonitor() { return $this->isRemoteMonitor; }
	public function isRadioEnable() { return $this->isRadioEnable; }
	public function isEdit() { return $this->isEdit; }
	public function isRadioCheck() { return $this->isRadioCheck; }
	public function isProgramKey() { return $this->isProgramKey; }
	public function isRadioDisable() { return $this->isRadioDisable; }
	public function isMissed() { return $this->isMissed; }
	public function isOutgoingRadio() { return $this->isOutgoingRadio; }
	public function isAnswered() { return $this->isAnswered; }
	public function isTalkaround() { return $this->isTalkaround; }
	public function isPower() { return $this->isPower; }
	public function isIntroScreen() { return $this->isIntroScreen; }
	public function isLedIndicator() { return $this->isLedIndicator; }
	public function isPasswordAndLock() { return $this->isPasswordAndLock; }
	public function isDisplayMode() { return $this->isDisplayMode; }
	public function isToneOrAlert() { return $this->isToneOrAlert; }
	public function isBacklight() { return $this->isBacklight; }
	public function isKeyboardLock() { return $this->isKeyboardLock; }
	public function isSquelch() { return $this->isSquelch; }
	public function isVox() { return $this->isVox; }
	public function isProgramRadio() { return $this->isProgramRadio; }
	public function isScan() { return $this->isScan; }
	public function isEditList() { return $this->isEditList; }
	public function getMenuHangTime() { return $this->menuHangTime; }
}
?>