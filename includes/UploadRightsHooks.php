<?php

// use MediaWiki\MediaWikiServices;

/**
 * Functions for the UploadRights extension called by hooks in MediaWiki code
 *
 * @file
 * @ingroup Extensions
 *
 * @author James Montalvo
 */
class ApprovedRevsHooks {

	public static function onBeforeInitialize( Title &$title, Article &$article = null, OutputPage &$output, User &$user ) {

		// see PHP docs for version_compare
		if ( version_compare( $GLOBALS['wgVersion'], '1.34c', '>=' ) ) {
			$isSuperUploader = MediaWikiServices::getInstance() ->getPermissionManager()
				->userHasRight( userHasRight( $user, 'superupload' ) );
		} else {
			$isSuperUploader = $user->isAllowed( 'superupload' );
		}

		if ( $isSuperUploader ) {
			global $wgFileExtensions, $wgMaxUploadSize,
				$wgSuperUploaderFileExtensions, $wgSuperUploaderMaxUploadSize;

			$wgFileExtensions = array_merge( $wgFileExtensions, $wgSuperUploaderFileExtensions );
			$wgMaxUploadSize = $wgSuperUploaderMaxUploadSize;
		}

	}
}
