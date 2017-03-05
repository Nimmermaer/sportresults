<?php
namespace PHTH\Sportresults\Tests\Unit\Controller;
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
 * Test case for class PHTH\Sportresults\Controller\CoachController.
 *
 * @author Michael Blunck <michael.blunck@phth.de>
 */
class CoachControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \PHTH\Sportresults\Controller\CoachController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('PHTH\\Sportresults\\Controller\\CoachController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCoachesFromRepositoryAndAssignsThemToView()
	{

		$allCoaches = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$coachRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$coachRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCoaches));
		$this->inject($this->subject, 'coachRepository', $coachRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('coaches', $allCoaches);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCoachToView()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('coach', $coach);

		$this->subject->showAction($coach);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCoachToCoachRepository()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();

		$coachRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$coachRepository->expects($this->once())->method('add')->with($coach);
		$this->inject($this->subject, 'coachRepository', $coachRepository);

		$this->subject->createAction($coach);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenCoachToView()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('coach', $coach);

		$this->subject->editAction($coach);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenCoachInCoachRepository()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();

		$coachRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$coachRepository->expects($this->once())->method('update')->with($coach);
		$this->inject($this->subject, 'coachRepository', $coachRepository);

		$this->subject->updateAction($coach);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenCoachFromCoachRepository()
	{
		$coach = new \PHTH\Sportresults\Domain\Model\Coach();

		$coachRepository = $this->getMock('', array('remove'), array(), '', FALSE);
		$coachRepository->expects($this->once())->method('remove')->with($coach);
		$this->inject($this->subject, 'coachRepository', $coachRepository);

		$this->subject->deleteAction($coach);
	}
}
