<?php

/**
 * TechDivision\Import\Category\Ee\Repositories\CategoryRepository
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Repositories;

use TechDivision\Import\Category\Ee\Utils\MemberNames;
use TechDivision\Import\Category\Ee\Utils\SqlStatementKeys;

/**
 * Repository implementation to load category data for Magento 2 EE.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class CategoryRepository extends \TechDivision\Import\Category\Repositories\CategoryRepository
{

    /**
     * The prepared statement to load the existing categories.
     *
     * @var \PDOStatement
     */
    protected $categoryStmt;

    /**
     * Initializes the repository's prepared statements.
     *
     * @return void
     */
    public function init()
    {

        // initialize the parend class
        parent::init();

        // initialize the prepared statements
        $this->categoryStmt =
            $this->getConnection()->prepare($this->loadStatement(SqlStatementKeys::CATEGORY));
    }

    /**
     * Return's the category with the passed ID.
     *
     * @param string $id The ID of the category to return
     *
     * @return array The category
     */
    public function load($id)
    {
        // load and return the category with the passed ID
        $this->categoryStmt->execute(array(MemberNames::ROW_ID => $id));
        return $this->categoryStmt->fetch(\PDO::FETCH_ASSOC);
    }
}
