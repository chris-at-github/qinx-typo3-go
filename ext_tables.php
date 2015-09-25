<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Go');

$qxgoContentColumns = array(
	'header_as_class' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:qxgo/Resources/Private/Language/locallang_db.xlf:tx_qxgo_domain_model_content.header_as_class',
		'config' => array(
			'type' => 'check',
			'items' => array(
				array('LLL:EXT:lang/locallang_core.xlf:labels.enabled', '1')
			),
			'default' => 0
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $qxgoContentColumns);

// Add fields to backend for all record types.
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'tt_content',
	'header',
	'header_as_class;LLL:EXT:qxgo/Resources/Private/Language/locallang_db.xlf:tx_qxgo_domain_model_content.header_as_class',
	'after:header_layout'
);
