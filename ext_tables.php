<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'PHTH.' . $_EXTKEY,
	'Results',
	'Results'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'PHTH.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'admin',	// Submodule key
		'',						// Position
		array(
			'Result' => 'list, show, new, create, edit, update, delete','Event' => 'list, show, new, create, edit, update, delete','Team' => 'list, show, new, create, edit, update, delete','Player' => 'list, show, new, create, edit, update, delete','Coach' => 'list, show, new, create, edit, update, delete','Image' => 'list, show, new, create, edit, update, delete',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_admin.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'SoccerResults');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sportresults_domain_model_result', 'EXT:sportresults/Resources/Private/Language/locallang_csh_tx_sportresults_domain_model_result.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sportresults_domain_model_result');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sportresults_domain_model_event', 'EXT:sportresults/Resources/Private/Language/locallang_csh_tx_sportresults_domain_model_event.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sportresults_domain_model_event');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sportresults_domain_model_image', 'EXT:sportresults/Resources/Private/Language/locallang_csh_tx_sportresults_domain_model_image.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sportresults_domain_model_image');
