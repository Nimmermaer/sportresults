<?php

if (!isset($GLOBALS['TCA']['fe_groups']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['fe_groups']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['fe_groups']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['fe_groups']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_sportresults_fe_groups = array();
	$tempColumnstx_sportresults_fe_groups[$GLOBALS['TCA']['fe_groups']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('Team','Tx_Sportresults_Team')
			),
			'default' => 'Tx_Sportresults_Team',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups', $tempColumnstx_sportresults_fe_groups, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'fe_groups',
	$GLOBALS['TCA']['fe_groups']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['fe_groups']['ctrl']['label']
);

$tmp_sportresults_columns = array(

	'title' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_team.title',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'crest' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_team.crest',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			'crest',
			array(
				'appearance' => array(
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
				),
				'foreign_types' => array(
					'0' => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					),
					\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
						'showitem' => '
						--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
						--palette--;;filePalette'
					)
				),
				'maxitems' => 1
			),
			$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
		),
	),
	'players' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_team.players',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'fe_users',
			'foreign_field' => 'team',
			'foreign_sortby' => 'sorting',
			'maxitems' => 9999,
			'appearance' => array(
				'collapseAll' => 0,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'useSortable' => 1,
				'showAllLocalizationLink' => 1
			),
		),

	),
	'coaches' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_team.coaches',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectMultipleSideBySide',
			'foreign_table' => 'fe_users',
			'MM' => 'tx_sportresults_team_coach_mm',
			'size' => 10,
			'autoSizeMax' => 30,
			'maxitems' => 9999,
			'multiple' => 0,
			'wizards' => array(
				'_PADDING' => 1,
				'_VERTICAL' => 1,
				'edit' => array(
					'module' => array(
						'name' => 'wizard_edit',
					),
					'type' => 'popup',
					'title' => 'Edit',
					'icon' => 'edit2.gif',
					'popup_onlyOpenIfSelected' => 1,
					'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				'add' => Array(
					'module' => array(
						'name' => 'wizard_add',
					),
					'type' => 'script',
					'title' => 'Create new',
					'icon' => 'add.gif',
					'params' => array(
						'table' => 'fe_users',
						'pid' => '###CURRENT_PID###',
						'setValue' => 'prepend'
					),
				),
			),
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_groups',$tmp_sportresults_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_groups']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_groups']['types']['Tx_Sportresults_Team']['showitem'] = $GLOBALS['TCA']['fe_groups']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_groups']['types'])) {
	// use first entry in types array
	$fe_groups_type_definition = reset($GLOBALS['TCA']['fe_groups']['types']);
	$GLOBALS['TCA']['fe_groups']['types']['Tx_Sportresults_Team']['showitem'] = $fe_groups_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_groups']['types']['Tx_Sportresults_Team']['showitem'] = '';
}
$GLOBALS['TCA']['fe_groups']['types']['Tx_Sportresults_Team']['showitem'] .= ',--div--;LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:tx_sportresults_domain_model_team,';
$GLOBALS['TCA']['fe_groups']['types']['Tx_Sportresults_Team']['showitem'] .= 'title, crest, players, coaches';

$GLOBALS['TCA']['fe_groups']['columns'][$GLOBALS['TCA']['fe_groups']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:sportresults/Resources/Private/Language/locallang_db.xlf:fe_groups.tx_extbase_type.Tx_Sportresults_Team','Tx_Sportresults_Team');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);