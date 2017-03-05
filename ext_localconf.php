<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'PHTH.' . $_EXTKEY,
	'Results',
	array(
		'Result' => 'list, show, new, create, edit, update, delete',
		'Event' => 'list, show, new, create, edit, update, delete',
		'Team' => 'list, show, new, create, edit, update, delete',
		'Player' => 'list, show, new, create, edit, update, delete',
		'Coach' => 'list, show, new, create, edit, update, delete',
		'Image' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Result' => 'create, update, delete',
		'Event' => 'create, update, delete',
		'Team' => 'create, update, delete',
		'Player' => 'create, update, delete',
		'Coach' => 'create, update, delete',
		'Image' => 'create, update, delete',
		
	)
);
