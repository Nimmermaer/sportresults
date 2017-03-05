<?php
namespace PHTH\Sportresults\Domain\Model;

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
 * Result
 */
class Result extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * opponent
     * 
     * @var string
     */
    protected $opponent = '';
    
    /**
     * teamGoals
     * 
     * @var int
     */
    protected $teamGoals = 0;
    
    /**
     * opponentGoals
     * 
     * @var int
     */
    protected $opponentGoals = 0;
    
    /**
     * comment
     * 
     * @var string
     */
    protected $comment = '';
    
    /**
     * one event, one or more results
     * 
     * @var \PHTH\Sportresults\Domain\Model\Event
     */
    protected $event = null;
    
    /**
     * one or more events for one team
     * 
     * @var \PHTH\Sportresults\Domain\Model\Team
     */
    protected $team = null;
    
    /**
     * no or more pictures for one or more events
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Image>
     */
    protected $images = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the opponent
     * 
     * @return string $opponent
     */
    public function getOpponent()
    {
        return $this->opponent;
    }
    
    /**
     * Sets the opponent
     * 
     * @param string $opponent
     * @return void
     */
    public function setOpponent($opponent)
    {
        $this->opponent = $opponent;
    }
    
    /**
     * Returns the teamGoals
     * 
     * @return int $teamGoals
     */
    public function getTeamGoals()
    {
        return $this->teamGoals;
    }
    
    /**
     * Sets the teamGoals
     * 
     * @param int $teamGoals
     * @return void
     */
    public function setTeamGoals($teamGoals)
    {
        $this->teamGoals = $teamGoals;
    }
    
    /**
     * Returns the opponentGoals
     * 
     * @return int $opponentGoals
     */
    public function getOpponentGoals()
    {
        return $this->opponentGoals;
    }
    
    /**
     * Sets the opponentGoals
     * 
     * @param int $opponentGoals
     * @return void
     */
    public function setOpponentGoals($opponentGoals)
    {
        $this->opponentGoals = $opponentGoals;
    }
    
    /**
     * Returns the comment
     * 
     * @return string $comment
     */
    public function getComment()
    {
        return $this->comment;
    }
    
    /**
     * Sets the comment
     * 
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
    /**
     * Returns the event
     * 
     * @return \PHTH\Sportresults\Domain\Model\Event $event
     */
    public function getEvent()
    {
        return $this->event;
    }
    
    /**
     * Sets the event
     * 
     * @param \PHTH\Sportresults\Domain\Model\Event $event
     * @return void
     */
    public function setEvent(\PHTH\Sportresults\Domain\Model\Event $event)
    {
        $this->event = $event;
    }
    
    /**
     * Returns the team
     * 
     * @return \PHTH\Sportresults\Domain\Model\Team $team
     */
    public function getTeam()
    {
        return $this->team;
    }
    
    /**
     * Sets the team
     * 
     * @param \PHTH\Sportresults\Domain\Model\Team $team
     * @return void
     */
    public function setTeam(\PHTH\Sportresults\Domain\Model\Team $team)
    {
        $this->team = $team;
    }
    
    /**
     * Adds a Image
     * 
     * @param \PHTH\Sportresults\Domain\Model\Image $image
     * @return void
     */
    public function addImage(\PHTH\Sportresults\Domain\Model\Image $image)
    {
        $this->images->attach($image);
    }
    
    /**
     * Removes a Image
     * 
     * @param \PHTH\Sportresults\Domain\Model\Image $imageToRemove The Image to be removed
     * @return void
     */
    public function removeImage(\PHTH\Sportresults\Domain\Model\Image $imageToRemove)
    {
        $this->images->detach($imageToRemove);
    }
    
    /**
     * Returns the images
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Image> $images
     */
    public function getImages()
    {
        return $this->images;
    }
    
    /**
     * Sets the images
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Image> $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images)
    {
        $this->images = $images;
    }

}