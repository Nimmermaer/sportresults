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
 * Test case for class PHTH\Sportresults\Controller\TeamController.
 *
 * @author Michael Blunck <michael.blunck@phth.de>
 */
class TeamControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \PHTH\Sportresults\Controller\TeamController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('PHTH\\Sportresults\\Controller\\TeamController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTeamsFromRepositoryAndAssignsThemToView()
	{

		$allTeams = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$teamRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\TeamRepository', array('findAll'), array(), '', FALSE);
		$teamRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTeams));
		$this->inject($this->subject, 'teamRepository', $teamRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('teams', $allTeams);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTeamToView()
	{
		$team = new \PHTH\Sportresults\Domain\Model\Team();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('team', $team);

		$this->subject->showAction($team);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTeamToTeamRepository()
	{
		$team = new \PHTH\Sportresults\Domain\Model\Team();

		$teamRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\TeamRepository', array('add'), array(), '', FALSE);
		$teamRepository->expects($this->once())->method('add')->with($team);
		$this->inject($this->subject, 'teamRepository', $teamRepository);

		$this->subject->createAction($team);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTeamToView()
	{
		$team = new \PHTH\Sportresults\Domain\Model\Team();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('team', $team);

		$this->subject->editAction($team);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTeamInTeamRepository()
	{
		$team = new \PHTH\Sportresults\Domain\Model\Team();

		$teamRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\TeamRepository', array('update'), array(), '', FALSE);
		$teamRepository->expects($this->once())->method('update')->with($team);
		$this->inject($this->subject, 'teamRepository', $teamRepository);

		$this->subject->updateAction($team);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTeamFromTeamRepository()
	{
		$team = new \PHTH\Sportresults\Domain\Model\Team();

		$teamRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\TeamRepository', array('remove'), array(), '', FALSE);
		$teamRepository->expects($this->once())->method('remove')->with($team);
		$this->inject($this->subject, 'teamRepository', $teamRepository);

		$this->subject->deleteAction($team);
	}
}
