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


?>