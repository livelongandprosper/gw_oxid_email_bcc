# Module email bcc and redirect, send order email again.
This module enables you to
* receive all emails send by OXID eShop as bcc,
* redirect all messages send by OXID eShop,
* send order emails again.
This is a tool for mainly supposed for debugging.

## Install
- This module has to be put to the folder
\[shop root\]**/modules/gw/gw_oxid_email_bcc/**

- You also have to create a file
\[shop root\]/modules/gw/**vendormetadata.php**

- add content in composer_add_to_root.json to your global composer.json file and call composer dump-autoload
