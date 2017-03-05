<?php
namespace PHTH\Sportresults\Service;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Philipp Thiele <philipp.thiele@phth.de>, PHTH
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
 *
 *
 * @package depot
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AccessControlService implements \TYPO3\CMS\Core\SingletonInterface  {

	/**
	 * Do we have a logged in feuser
	 * @return boolean
	 */
	public function hasLoggedInUser() {
		return $GLOBALS['TSFE']->loginUser;
	}

	/**
	 * Get the uid of the current feuser
	 * @return mixed
	 */
	public function getUserUid() {
		if ($this->hasLoggedInUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
			return intval($GLOBALS['TSFE']->fe_user->user['uid']);
		}
		return NULL;
	}
	
	/**
	 * Get the uid of the current feuser
	 * @return mixed
	 */
	public function getUserRepository() {
		
		$recordTypeName = $GLOBALS['TSFE']->fe_user->user['tx_extbase_type'];
		$recordTypeNameParts = explode('_',$recordTypeName);
		$repositoryName = '\PHTH\Sportresults\Domain\Repository\\'.end($recordTypeNameParts).'Repository';
		if(class_exists($repositoryName)) {
		    return $repositoryName;
		}
		return NULL;
	}
	 
	/**
	 * @param $user
	 * @return boolean
	 */
	public function isAccessAllowed($user) {
		return $this->getUserUid() === $user->getUid() ? TRUE : FALSE;
	}
}