<?php

if(!defined ('TYPO3_MODE')){
    die('Access denied.');
}

/**
 * Configure Content Elements Renderer
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Bk2k.'.$_EXTKEY,
    'ContentElements',
    array(
        'ContentElement' => 'render',
    ),
    array()
);


/**
 * Configure Custom Content Element
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Bk2k.'.$_EXTKEY,
    'CustomContentElement',
    array(
        'CustomElement' => 'render',
    ),
    array(
    ),
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);


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