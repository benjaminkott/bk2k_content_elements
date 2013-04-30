<?php

if(!defined ('TYPO3_MODE')){
    die('Access denied.');
}

/***************
 * Default TypoScript
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Default', 'BK2K Content Elements');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Replace', 'BK2K Content Elements Replacement');

/**
 * Register Custom Content Element
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Bk2k.'.$_EXTKEY,
    'CustomContentElement',
    'Custom Content Element'
);

/**
 * Prepare TCA for Custom Content Element
 */
\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('tt_content');
$TCA['tt_content']['types']['bk2kcontentelements_customcontentelement']['showitem'] = $TCA['tt_content']['types']['textpic']['showitem'];

?>