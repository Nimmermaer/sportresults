<?php

namespace PHTH\Sportresults\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Michael Blunck <michael.blunck@phth.de>, PHTH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \PHTH\Sportresults\Domain\Model\Team.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Blunck <michael.blunck@phth.de>
 */
class TeamTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \PHTH\Sportresults\Domain\Model\Team
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \PHTH\Sportresults\Domain\Model\Team();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCrestReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCrest()
		);
	}

	/**
	 * @test
	 */
	public function setCrestForFileReferenceSetsCrest()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setCrest($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'crest',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPlayersReturnsInitialValueForPlayer()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPlayers()
		);
	}

	/**
	 * @test
	 */
	public function setPlayersForObjectStorageContainingPlayerSetsPlayers()
	{
		$player = new \PHTH\Sportresults\Domain\Model\Player();
		$objectStorageHoldingExactlyOnePlayers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePlayers->attach($player);
		$this->subject->setPlayers($objectStorageHoldingExactlyOnePlayers);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePlayers,
			'players',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPlayerToObjectStorageHoldingPlayers()
	{
		$player = new \PHTH\Sportresults\Domain\Model\Player();
		$playersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$playersObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($player));
		$this->inject($this->subject, 'players', $playersObjectStorageMock);

		$this->subject->addPlayer($player);
	}

	/**
	 * @test
	 */
	public function removePlayerFromObjectStorageHoldingPlayers()
	{
		$player = new \PHTH\Sportresults\Domain\Model\Player();
		$playersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$playersObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($player));
		$this->inject($this->subject, 'players', $playersObjectStorageMock);

		$this->subject->removePlayer($player);

	}

	/**
	 * @test
	 */
	public function getCoachesReturnsInitialValueForCoach()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCoaches()
		);
	}

	/**
	 * @test
	 */
	public function setCoachesForObjectStorageContainingCoachSetsCoaches()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();
		$objectStorageHoldingExactlyOneCoaches = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCoaches->attach($coach);
		$this->subject->setCoaches($objectStorageHoldingExactlyOneCoaches);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCoaches,
			'coaches',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCoachToObjectStorageHoldingCoaches()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();
		$coachesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$coachesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($coach));
		$this->inject($this->subject, 'coaches', $coachesObjectStorageMock);

		$this->subject->addCoach($coach);
	}

	/**
	 * @test
	 */
	public function removeCoachFromObjectStorageHoldingCoaches()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();
		$coachesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$coachesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($coach));
		$this->inject($this->subject, 'coaches', $coachesObjectStorageMock);

		$this->subject->removeCoach($coach);

	}
}
