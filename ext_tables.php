<?php

if(!defined ('TYPO3_MODE')){
    die('Access denied.');
}

/**
 * Default TypoScript
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Extbase/Default', 'BK2K Extbase CE Default');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Extbase/Replacement', 'BK2K Extbase CEs Replacement');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Fluidtemplate/Replacement', 'BK2K Fluidtemplate CEs Replacement');

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



/**
 * Register Custom Fluid Content Element
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'Custom Content Element Fluid',
        'bk2kcontentelements_customfluidelement'
    ), 
    'CType'
);

/**
 * Prepare TCA for Custom Fluid Content Element
 */
$TCA['tt_content']['types']['bk2kcontentelements_customfluidelement']['showitem'] = $TCA['tt_content']['types']['textpic']['showitem'];

/**
 * Include TypoScript for tt_content before static
 */
$customFluidContentElementTypoScriptConstants = trim('
plugin.tx_bk2kcontentelements {
    view {
        templateRootPath = EXT:bk2k_content_elements/Resources/Private/Templates/
        partialRootPath = EXT:bk2k_content_elements/Resources/Private/Partials/
        layoutRootPath = EXT:bk2k_content_elements/Resources/Private/Layouts/
    }
}
');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    $_EXTKEY,
    'constants',
    $customFluidContentElementTypoScriptConstants
);

/**
 * Include TypoScript for tt_content after static
 */
$customFluidContentElementTypoScriptSetup = trim('
tt_content.bk2kcontentelements_customfluidelement = COA
tt_content.bk2kcontentelements_customfluidelement {
    10 = < lib.stdheader
    20 = FLUIDTEMPLATE
    20 {
        file = {$plugin.tx_bk2kcontentelements.view.templateRootPath}CustomElement/Render.html
        partialRootPath = {$plugin.tx_bk2kcontentelements.view.partialRootPath}
        layoutRootPath = {$plugin.tx_bk2kcontentelements.view.layoutRootPath}
    }
}
');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    $_EXTKEY,
    'setup',
    $customFluidContentElementTypoScriptSetup,
    43
);


?>