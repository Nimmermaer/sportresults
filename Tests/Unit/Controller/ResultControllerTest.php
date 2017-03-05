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
 * Test case for class PHTH\Sportresults\Controller\ResultController.
 *
 * @author Michael Blunck <michael.blunck@phth.de>
 */
class ResultControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \PHTH\Sportresults\Controller\ResultController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('PHTH\\Sportresults\\Controller\\ResultController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllResultsFromRepositoryAndAssignsThemToView()
	{

		$allResults = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$resultRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\ResultRepository', array('findAll'), array(), '', FALSE);
		$resultRepository->expects($this->once())->method('findAll')->will($this->returnValue($allResults));
		$this->inject($this->subject, 'resultRepository', $resultRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('results', $allResults);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenResultToView()
	{
		$result = new \PHTH\Sportresults\Domain\Model\Result();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('result', $result);

		$this->subject->showAction($result);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenResultToResultRepository()
	{
		$result = new \PHTH\Sportresults\Domain\Model\Result();

		$resultRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\ResultRepository', array('add'), array(), '', FALSE);
		$resultRepository->expects($this->once())->method('add')->with($result);
		$this->inject($this->subject, 'resultRepository', $resultRepository);

		$this->subject->createAction($result);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenResultToView()
	{
		$result = new \PHTH\Sportresults\Domain\Model\Result();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('result', $result);

		$this->subject->editAction($result);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenResultInResultRepository()
	{
		$result = new \PHTH\Sportresults\Domain\Model\Result();

		$resultRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\ResultRepository', array('update'), array(), '', FALSE);
		$resultRepository->expects($this->once())->method('update')->with($result);
		$this->inject($this->subject, 'resultRepository', $resultRepository);

		$this->subject->updateAction($result);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenResultFromResultRepository()
	{
		$result = new \PHTH\Sportresults\Domain\Model\Result();

		$resultRepository = $this->getMock('PHTH\\Sportresults\\Domain\\Repository\\ResultRepository', array('remove'), array(), '', FALSE);
		$resultRepository->expects($this->once())->method('remove')->with($result);
		$this->inject($this->subject, 'resultRepository', $resultRepository);

		$this->subject->deleteAction($result);
	}
}
