<?php
namespace PHTH\Sportresults\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Michael Blunck <michael.blunck@phth.de>, PHTH
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
 * ImageController
 */
class ImageController extends ActionController
{

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $images = $this->imageRepository->findAll();
        $this->view->assign('images', $images);
    }
    
    /**
     * action show
     * 
     * @param \PHTH\Sportresults\Domain\Model\Image $image
     * @return void
     */
    public function showAction(\PHTH\Sportresults\Domain\Model\Image $image)
    {
        $this->view->assign('image', $image);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \PHTH\Sportresults\Domain\Model\Image $newImage
     * @return void
     */
    public function createAction(\PHTH\Sportresults\Domain\Model\Image $newImage)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->imageRepository->add($newImage);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \PHTH\Sportresults\Domain\Model\Image $image
     * @ignorevalidation $image
     * @return void
     */
    public function editAction(\PHTH\Sportresults\Domain\Model\Image $image)
    {
        $this->view->assign('image', $image);
    }
    
    /**
     * action update
     * 
     * @param \PHTH\Sportresults\Domain\Model\Image $image
     * @return void
     */
    public function updateAction(\PHTH\Sportresults\Domain\Model\Image $image)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->imageRepository->update($image);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \PHTH\Sportresults\Domain\Model\Image $image
     * @return void
     */
    public function deleteAction(\PHTH\Sportresults\Domain\Model\Image $image)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->imageRepository->remove($image);
        $this->redirect('list');
    }

}