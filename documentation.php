<?php
define('CURRENT_PAGE', 'docs');
require('fragments/header.php');
?>
		<div class="row">
			<div class="col-sm-12 h2">DMR</div>
		</div>
		<div class="row">
			<div class="col-sm-12 h3">Using a personal configuration spreadsheet</div>
			<div class="col-sm-12">
				<p>One of the key features of this tool is the ability to layer
				personal customizations on top of a group's standard DMR radio
				configuration. This makes it possible to have a ready to use
				code plug file straight from the tool without having to use your
				radio's programming software to set your radio ID, add extra
				channels that you want, customize the radio settings, etc. every
				time the group updates the base code plug.</p>
				<p>To accomplish this, you will need to create a personal
				configuration spreadsheet.
				</p>
				<p><b>Requirements:</b> You must have a Google account. If you
				do not have one, you must create one to use the personalization
				feature of this tool.</p>
				<p><b>Steps:</b></p>
				<ol class="docs">
					<li>Sign in to <a target="_blank" href="http://drive.google.com/">http://drive.google.com/</a></li>
					<li>Open the <a target="_blank" href="<?php echo PERSONAL_CONFIG_TEMPLATE; ?>">personal template</a></li>
					<li>Make a copy of the template into your own personal Google Drive space <img src="docs/driveMakeCopy.png" class="img-responsive" alt="Screenshot"/></li>
					<li>In your new personal copy, click the "Share" button in the upper right corner of the screen <img src="docs/driveShareButton.png" class="img-responsive" alt="Screenshot"/></li>
					<li>Click "Get sharable link" <img src="docs/driveShareableLink.png" class="img-responsive" alt="Screenshot"/></li>
					<li>At this point, you should see a screen saying that link sharing is on.
					Make sure that it is set so that anyone with the link <b>can view</b>
					the document. Copy the link URL to your clipboard and then paste it into
					the personal configuration field of the frequency plan tool form.
					<img src="docs/driveLinkSharingOn.png" class="img-responsive" alt="Screenshot"/></li>
					<li>Edit the contents of the spreadsheet whenever you wish
					and provide the shareable link to the frequency plan tool
					each time you generate a new code plug. Your personal
					settings will be applied on top of the base settings in the
					generated code plug file.</li>
				</ol>
			</div>
		</div>
<?php 
require('fragments/footer.php');
?>