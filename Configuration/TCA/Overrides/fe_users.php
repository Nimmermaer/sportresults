<?php

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_sportresults_fe_users = array();
	$tempColumnstx_sportresults_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('Coach','Tx_Sportresults_Coach')
			),
			'default' => 'Tx_Sportresults_Coach',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_sportresults_fe_users, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'fe_users',
	$GLOBALS['TCA']['fe_users']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Coach']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
	// use first entry in types array
	$fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
	$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Coach']['showitem'] = $fe_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Coach']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Coach']['showitem'] .= ',--div--;LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_coach,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Coach']['showitem'] .= '';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_Sportresults_Coach','Tx_Sportresults_Coach');

$tmp_sportresults_columns = array(

	'shirt_number' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_player.shirt_number',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'position' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_player.position',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
);

$tmp_sportresults_columns['team'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',$tmp_sportresults_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Player']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
	// use first entry in types array
	$fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
	$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Player']['showitem'] = $fe_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Player']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Player']['showitem'] .= ',--div--;LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_player,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Sportresults_Player']['showitem'] .= 'shirt_number, position';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_Sportresults_Player','Tx_Sportresults_Player');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);