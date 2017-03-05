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
 * Team
 */
class Team extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
{

    /**
     * title
     * 
     * @var string
     */
    protected $title = '';
    
    /**
     * crest
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $crest = null;
    
    /**
     * players
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Player>
     * @cascade remove
     */
    protected $players = null;
    
    /**
     * coaches
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Coach>
     */
    protected $coaches = null;
    
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
        $this->players = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->coaches = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the crest
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $crest
     */
    public function getCrest()
    {
        return $this->crest;
    }
    
    /**
     * Sets the crest
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $crest
     * @return void
     */
    public function setCrest(\TYPO3\CMS\Extbase\Domain\Model\FileReference $crest)
    {
        $this->crest = $crest;
    }
    
    /**
     * Adds a Player
     * 
     * @param \PHTH\Sportresults\Domain\Model\Player $player
     * @return void
     */
    public function addPlayer(\PHTH\Sportresults\Domain\Model\Player $player)
    {
        $this->players->attach($player);
    }
    
    /**
     * Removes a Player
     * 
     * @param \PHTH\Sportresults\Domain\Model\Player $playerToRemove The Player to be removed
     * @return void
     */
    public function removePlayer(\PHTH\Sportresults\Domain\Model\Player $playerToRemove)
    {
        $this->players->detach($playerToRemove);
    }
    
    /**
     * Returns the players
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Player> $players
     */
    public function getPlayers()
    {
        return $this->players;
    }
    
    /**
     * Sets the players
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Player> $players
     * @return void
     */
    public function setPlayers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $players)
    {
        $this->players = $players;
    }
    
    /**
     * Adds a Coach
     * 
     * @param \PHTH\Sportresults\Domain\Model\Coach $coach
     * @return void
     */
    public function addCoach(\PHTH\Sportresults\Domain\Model\Coach $coach)
    {
        $this->coaches->attach($coach);
    }
    
    /**
     * Removes a Coach
     * 
     * @param \PHTH\Sportresults\Domain\Model\Coach $coachToRemove The Coach to be removed
     * @return void
     */
    public function removeCoach(\PHTH\Sportresults\Domain\Model\Coach $coachToRemove)
    {
        $this->coaches->detach($coachToRemove);
    }
    
    /**
     * Returns the coaches
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Coach> $coaches
     */
    public function getCoaches()
    {
        return $this->coaches;
    }
    
    /**
     * Sets the coaches
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PHTH\Sportresults\Domain\Model\Coach> $coaches
     * @return void
     */
    public function setCoaches(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $coaches)
    {
        $this->coaches = $coaches;
    }

}