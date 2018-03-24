<?php

/**
 * TechDivision\Import\Category\Ee\Subjects\BunchSubjectTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Subjects;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Test class for the product action implementation.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeBunchSubjectTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The subject we want to test.
     *
     * @var \TechDivision\Import\Category\Ee\Subjects\EeBunchSubject
     */
    protected $subject;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     * @see \PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {

        // create a mock registry processor
        $mockRegistryProcessor = $this->getMockBuilder('TechDivision\Import\Services\RegistryProcessorInterface')
                                      ->setMethods(get_class_methods('TechDivision\Import\Services\RegistryProcessorInterface'))
                                      ->getMock();

        // create a generator
        $mockGenerator = $this->getMockBuilder('TechDivision\Import\Utils\Generators\GeneratorInterface')
                              ->setMethods(get_class_methods('TechDivision\Import\Utils\Generators\GeneratorInterface'))
                              ->getMock();

        // create a mock category processor
        $mockCategoryProcessor = $this->getMockBuilder('TechDivision\Import\Category\Ee\Services\EeCategoryBunchProcessorInterface')
                                      ->setMethods(get_class_methods('TechDivision\Import\Category\Ee\Services\EeCategoryBunchProcessorInterface'))
                                      ->getMock();

        // mock the event emitter
        $mockEmitter = $this->getMockBuilder('League\Event\EmitterInterface')
                            ->setMethods(\get_class_methods('League\Event\EmitterInterface'))
                            ->getMock();

        // create the subject to be tested
        $this->subject = new EeBunchSubject(
            $mockRegistryProcessor,
            $mockGenerator,
            new ArrayCollection(),
            $mockEmitter,
            $mockCategoryProcessor
        );
    }

    /**
     * Test's the last row ID setter/getter methods successfull.
     *
     * @return void
     */
    public function testSetGetLastRowId()
    {

        // set the last row ID
        $this->subject->setLastRowId($lastRowId = 100);

        // make sure that the last row ID will be returend
        $this->assertSame($lastRowId, $this->subject->getLastRowId());
    }
}
