Upload Rights
=============

MediaWiki extension that expands upload rights. Specifically, this allows ordinary users to have one set of upload rights, whereas privileged users could upload more file types and larger sizes.

Install and setup
-----------------

After downloading the extension into the extensions directory, add the following to

```php
wfLoadExtension( 'UploadRights' );

// this allows people with "superupload" right to upload .mov and .mp4 files
$wgSuperUploaderFileExtensions = [ 'mov', 'mp4' ];

// this allows people with "superupload" right to upload 10 times larger files
// than everyone else
$wgSuperUploaderMaxUploadSize = $wgMaxUploadSize * 10;

// grant another group the "superupload" right. This assumes "someothergroup"
// already exists
$wgGroupPermissions['someothergroup']['superupload'] = true;

// remove "superupload" from sysop, which has this right by default
$wgGroupPermissions['sysop']['superupload'] = false;
```

PHP config
----------

In order for larger file uploads to work, your PHP configuration will need to allow for larger files, as well.

```
# Set 200 MB max file size
post_max_size = 200M
upload_max_filesize = 200M
```
