<?php

/**
 * TechDivision\Import\Category\Ee\Actions\SequenceCategoryActionInterface
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Actions;

use TechDivision\Import\Dbal\Actions\ActionInterface;

/**
 * Interface for action implementations that provides CRUD functionality for EE category sequence block.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
interface SequenceCategoryActionInterface extends ActionInterface
{

    /**
     * Return's the next available sequence product value.
     *
     * @return integer The next available sequence product value
     */
    public function nextIdentifier();
}
