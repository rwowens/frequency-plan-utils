# AC8UJ's Frequency Plan Web Utilities

This project strives to provide a convenient way to support a group of amateur
radio operators who wish to share a frequency plan and DMR code plug files. The
basic approach is to use Google Drive for managing an ICS 217A spreadsheet
containing the group's frequency plan and a separate Google Drive spreadsheet
containing the group's base DMR code plug entries. This software then looks for
named regions within those spreadsheets and produces CSV files from the
ICS 217A and RDT code plug files from the DMR sheet on demand.

But wait... There's more! On the DMR side, generating a code plug from a shared
spreadsheet isn't really that much better than posting a code plug file to a web
site somewhere. So this software goes a bit further. It allows individual
operators to have their own personal version of the spreadsheet to add their
own customizations and then it layers those customizations on top of the group's
base spreadsheet. This allows operators to enter their personal radio ID, menu
setting preferences, extra channels, extra zones, etc. one time rather than
having to re-enter them each time the group updates the base code plug.

Additionally, it is far easier (IMHO) to manage the channels, zones, etc. in a
spreadsheet than through the code plug software that comes with the TYT MD-380
radios.

## Sample Spreadsheets
A blank sample of the ICS 217A that works with this software may be found
[here.](https://docs.google.com/spreadsheets/d/1vAX6axSnteVr4OVrdeQqv0t4S9gp8kQcCTlqI13xnic/edit?usp=sharing)
You should make a copy of this spreadsheet into your own Google Drive account
and populate it as you choose.

A blank sample of the DMR spreadsheet may be found
[here.](https://docs.google.com/spreadsheets/d/1tCUlVulWI9S5J5JLnMpZ8HfnIgRHDBNeMqMwMopcdco/edit?usp=sharing)
Again, you should make a copy of this spreadsheet into your own Google Drive account.

Once you copy these sheets to your own account, make sure you get a shareable
link to each document to enable public viewing via the link. If you don't make
your sheets publicly viewable via the shareable link, this software will not be
able to access the sheets.

## Supported Radios
The ICS 217A can be exported as a CSV file for either Chirp or RT Systems. The
RT Systems flavor was based on the Yaesu FTM-400XDR RT Systems programming
software, so there could be small differences for your version, but they should
be minor.

For DMR, currently only TYT MD-380 radios are supported. I suspect that the
generated code plug files would work for close relatives of the MD-380, but I
have not tested it.

## Installation
To use this software on your own PHP-capable web site, you will need to do the following:
* Download the project source code to a system with PHP and [Composer](https://getcomposer.org/) installed.
* Run composer's install command.
* Run "`./vendor/bin/phing package`" to create a plantools.zip file.
* Unzip the plantools.zip file under a directory on your web site (let's call
this the installation directory).
* In the installation directory, find the sheets-example.json file under the
config directory. Rename sheets-example.json to sheets.json. Update the
contents to refer to your Google Drive sheets and given them appropriate names
and descriptions.
* In the installation directory, place a Google service account credentials file
(see below) named google_creds.json under the config directory.

### Google Credentials
To run this software, you will need to create a Google API service account. You
can create a service account at [https://console.developers.google.com](https://console.developers.google.com).
Make sure you download the service account credentials file in JSON format
(**not** P12).

You also must make sure to enable the Google Sheets API for your account.