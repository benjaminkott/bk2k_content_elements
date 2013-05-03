<?php
namespace Bk2k\Bk2kContentElements\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Benjamin Kott <info@bk2k.info>
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
class FalViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * @author Benjamin Kott <info@bk2k.info>
     */
    protected $fileRepository;
    
    /**
     * @param array $data
     * @param string $as
     * @param string $table
     * @param string $field
     * 
     * @return string
     */
    public function render($data,$as = "items", $table = "tt_content", $field = "image") {
        
        if(is_array($data) && $data['uid'] && $data[$field]){
            $this->fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');
            $items = $this->fileRepository->findByRelation($table, $field, $data['uid']);
        }else{
            $items = NULL;
        }
        
        $this->templateVariableContainer->add($as, $items);
        $content = $this->renderChildren();
        $this->templateVariableContainer->remove($as); 
        
        return $content;

    }
    
}
?>
