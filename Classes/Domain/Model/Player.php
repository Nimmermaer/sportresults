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
 * Player
 */
class Player extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{

    /**
     * shirtNumber
     * 
     * @var string
     */
    protected $shirtNumber = '';
    
    /**
     * position
     * 
     * @var string
     */
    protected $position = '';
    
    /**
     * Returns the shirtNumber
     * 
     * @return string $shirtNumber
     */
    public function getShirtNumber()
    {
        return $this->shirtNumber;
    }
    
    /**
     * Sets the shirtNumber
     * 
     * @param string $shirtNumber
     * @return void
     */
    public function setShirtNumber($shirtNumber)
    {
        $this->shirtNumber = $shirtNumber;
    }
    
    /**
     * Returns the position
     * 
     * @return string $position
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    /**
     * Sets the position
     * 
     * @param string $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

}