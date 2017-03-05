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
 * Test case for class \PHTH\Sportresults\Domain\Model\Result.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Blunck <michael.blunck@phth.de>
 */
class ResultTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \PHTH\Sportresults\Domain\Model\Result
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \PHTH\Sportresults\Domain\Model\Result();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getOpponentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getOpponent()
		);
	}

	/**
	 * @test
	 */
	public function setOpponentForStringSetsOpponent()
	{
		$this->subject->setOpponent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'opponent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeamGoalsReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setTeamGoalsForIntSetsTeamGoals()
	{	}

	/**
	 * @test
	 */
	public function getOpponentGoalsReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setOpponentGoalsForIntSetsOpponentGoals()
	{	}

	/**
	 * @test
	 */
	public function getCommentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getComment()
		);
	}

	/**
	 * @test
	 */
	public function setCommentForStringSetsComment()
	{
		$this->subject->setComment('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'comment',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEventReturnsInitialValueForEvent()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getEvent()
		);
	}

	/**
	 * @test
	 */
	public function setEventForEventSetsEvent()
	{
		$eventFixture = new \PHTH\Sportresults\Domain\Model\Event();
		$this->subject->setEvent($eventFixture);

		$this->assertAttributeEquals(
			$eventFixture,
			'event',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeamReturnsInitialValueForTeam()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getTeam()
		);
	}

	/**
	 * @test
	 */
	public function setTeamForTeamSetsTeam()
	{
		$teamFixture = new \PHTH\Sportresults\Domain\Model\Team();
		$this->subject->setTeam($teamFixture);

		$this->assertAttributeEquals(
			$teamFixture,
			'team',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForImage()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForObjectStorageContainingImageSetsImages()
	{
		$image = new \PHTH\Sportresults\Domain\Model\Image();
		$objectStorageHoldingExactlyOneImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneImages->attach($image);
		$this->subject->setImages($objectStorageHoldingExactlyOneImages);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneImages,
			'images',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addImageToObjectStorageHoldingImages()
	{
		$image = new \PHTH\Sportresults\Domain\Model\Image();
		$imagesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$imagesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($image));
		$this->inject($this->subject, 'images', $imagesObjectStorageMock);

		$this->subject->addImage($image);
	}

	/**
	 * @test
	 */
	public function removeImageFromObjectStorageHoldingImages()
	{
		$image = new \PHTH\Sportresults\Domain\Model\Image();
		$imagesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$imagesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($image));
		$this->inject($this->subject, 'images', $imagesObjectStorageMock);

		$this->subject->removeImage($image);

	}
}
