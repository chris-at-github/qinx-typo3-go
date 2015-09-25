<?php

namespace Qinx\Qxgo\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Christian Pschorr <pschorr.christian@gmail.com>, Qinx
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
 * Test case for class \Qinx\Qxgo\Domain\Model\Content.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christian Pschorr <pschorr.christian@gmail.com>
 */
class ContentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Qinx\Qxgo\Domain\Model\Content
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Qinx\Qxgo\Domain\Model\Content();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getHeaderAsClassReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getHeaderAsClass()
		);
	}

	/**
	 * @test
	 */
	public function setHeaderAsClassForBooleanSetsHeaderAsClass() {
		$this->subject->setHeaderAsClass(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'headerAsClass',
			$this->subject
		);
	}
}
