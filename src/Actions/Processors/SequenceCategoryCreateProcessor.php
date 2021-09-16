<?php

/**
 * TechDivision\Import\Category\Ee\Actions\Processors\SequenceCategoryCreateProcessor
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Actions\Processors;

use TechDivision\Import\Category\Ee\Utils\SqlStatementKeys;
use TechDivision\Import\Dbal\Collection\Actions\Processors\AbstractBaseProcessor;

/**
 * The sequence category create processor implementation.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class SequenceCategoryCreateProcessor extends AbstractBaseProcessor
{

    /**
     * Return's the array with the SQL statements that has to be prepared.
     *
     * @return array The SQL statements to be prepared
     */
    protected function getStatements()
    {

        // return the array with the SQL statements that has to be prepared
        return array(
            SqlStatementKeys::CREATE_SEQUENCE_CATEGORY => $this->loadStatement(SqlStatementKeys::CREATE_SEQUENCE_CATEGORY)
        );
    }

    /**
     * Persist's the passed row.
     *
     * @param array       $row                  The row to persist
     * @param string|null $name                 The name of the prepared statement that has to be executed
     * @param string|null $primaryKeyMemberName The primary key member name of the entity to use
     *
     * @return string The last inserted ID
     */
    public function execute($row, $name = null, $primaryKeyMemberName = null)
    {
        parent::execute($row, $name);
        return $this->getConnection()->lastInsertId();
    }
}
