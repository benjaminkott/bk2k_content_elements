<?php
namespace Bk2k\Bk2kContentElements\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Benjamin Kott <info@bk2k.info>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * @author Benjamin Kott <info@bk2k.info>
 */
class CustomElementController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
    
    /**
     * @var \TYPO3\CMS\Core\Resource\FileRepository
     */
    protected $fileRepository;    
    
    /**
     * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
     */
    protected $contentObj;
    
    /**
     * @var mixed
     */
    protected $data; 

    /**
     * @return void
     */
    public function initializeAction(){
        $this->contentObj = $this->configurationManager->getContentObject();
        $this->data = $this->contentObj->data;
    }
        
    /**
     * @return void
     */
    public function renderAction(){
        $this->fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');
        $images = $this->fileRepository->findByRelation('tt_content', 'image', $this->data['uid']);
        $this->view->assign('data',$this->data);
        $this->view->assign('images',$images);
    }
}
?>