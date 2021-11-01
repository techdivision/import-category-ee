<?php

/**
 * TechDivision\Import\Category\Ee\Repositories\SqlStatementRepository
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

use TechDivision\Import\Category\Ee\Utils\SqlStatementKeys;

/**
 * Repository class with the SQL statements to use.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class SqlStatementRepository extends \TechDivision\Import\Category\Repositories\SqlStatementRepository
{

    /**
     * The SQL statements.
     *
     * @var array
     */
    private $statements = array(
        SqlStatementKeys::CATEGORIES =>
            'SELECT t0.*,
                    (SELECT `value`
                       FROM ${table:eav_attribute} t1, ${table:catalog_category_entity_varchar} t2
                      WHERE t1.attribute_code = \'name\'
                        AND t1.entity_type_id = 3
                        AND t2.attribute_id = t1.attribute_id
                        AND t2.store_id = 0
                        AND t2.row_id = t0.row_id) AS name,
                    (SELECT `value`
                       FROM ${table:eav_attribute t1}, ${table:catalog_category_entity_varchar} t2
                      WHERE t1.attribute_code = \'url_path\'
                        AND t1.entity_type_id = 3
                        AND t2.attribute_id = t1.attribute_id
                        AND t2.store_id = 0
                        AND t2.row_id = t0.row_id) AS url_path
               FROM ${table:catalog_category_entity} AS t0',
        SqlStatementKeys::CATEGORY_VARCHARS_BY_ENTITY_IDS =>
            'SELECT t1.*
               FROM ${table:catalog_category_entity} AS t0
         INNER JOIN ${table:catalog_category_entity_varchar} AS t1
                 ON t1.row_id = t0.row_id
         INNER JOIN ${table:eav_attribute} AS t2
                 ON t2.entity_type_id = 3
                AND t2.attribute_code = \'name\'
                AND t1.attribute_id = t2.attribute_id
                AND t1.store_id = 0
                AND t0.entity_id IN (?)',
        SqlStatementKeys::CATEGORY_VARCHARS_BY_ROW_IDS =>
            'SELECT t1.*
               FROM ${table:catalog_category_entity} AS t0
         INNER JOIN ${table:catalog_category_entity_varchar} AS t1
                 ON t1.row_id = t0.row_id
         INNER JOIN ${table:eav_attribute} AS t2
                 ON t2.entity_type_id = 3
                AND t2.attribute_code = \'name\'
                AND t1.attribute_id = t2.attribute_id
                AND t1.store_id = 0
                AND t0.row_id IN (?)',
        SqlStatementKeys::CATEGORY =>
            'SELECT * FROM ${table:catalog_category_entity} WHERE row_id = :row_id',
        SqlStatementKeys::CATEGORY_DATETIMES =>
            'SELECT *
               FROM ${table:catalog_category_entity_datetime}
              WHERE row_id = :pk
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_DECIMALS =>
            'SELECT *
               FROM ${table:catalog_category_entity_decimal}
              WHERE row_id = :pk
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_INTS =>
            'SELECT *
               FROM ${table:catalog_category_entity_int}
              WHERE row_id = :pk
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_TEXTS =>
            'SELECT *
               FROM ${table:catalog_category_entity_text}
              WHERE row_id = :pk
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_VARCHARS =>
            'SELECT *
               FROM ${table:catalog_category_entity_varchar}
              WHERE row_id = :pk
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_DATETIMES_BY_PK_AND_STORE_ID =>
            'SELECT t0.*,
                    t1.attribute_code
               FROM ${table:catalog_category_entity_datetime} t0
         INNER JOIN ${table:eav_attribute} t1
                 ON t1.attribute_id = t0.attribute_id
              WHERE t0.row_id = :pk
                AND t0.store_id = :store_id',
        SqlStatementKeys::CATEGORY_DECIMALS_BY_PK_AND_STORE_ID =>
            'SELECT t0.*,
                    t1.attribute_code
               FROM ${table:catalog_category_entity_decimal} t0
         INNER JOIN ${table:eav_attribute} t1
                 ON t1.attribute_id = t0.attribute_id
              WHERE t0.row_id = :pk
                AND t0.store_id = :store_id',
        SqlStatementKeys::CATEGORY_INTS_BY_PK_AND_STORE_ID =>
            'SELECT t0.*,
                    t1.attribute_code
               FROM ${table:catalog_category_entity_int} t0
         INNER JOIN ${table:eav_attribute} t1
                 ON t1.attribute_id = t0.attribute_id
              WHERE t0.row_id = :pk
                AND t0.store_id = :store_id',
        SqlStatementKeys::CATEGORY_TEXTS_BY_PK_AND_STORE_ID =>
            'SELECT t0.*,
                    t1.attribute_code
               FROM ${table:catalog_category_entity_text} t0
         INNER JOIN ${table:eav_attribute} t1
                 ON t1.attribute_id = t0.attribute_id
              WHERE t0.row_id = :pk
                AND t0.store_id = :store_id',
        SqlStatementKeys::CATEGORY_VARCHARS_BY_PK_AND_STORE_ID =>
            'SELECT t0.*,
                    t1.attribute_code
               FROM ${table:catalog_category_entity_varchar} t0
         INNER JOIN ${table:eav_attribute} t1
                 ON t1.attribute_id = t0.attribute_id
              WHERE t0.row_id = :pk
                AND t0.store_id = :store_id',
        SqlStatementKeys::CREATE_SEQUENCE_CATEGORY =>
            'INSERT INTO ${table:sequence_catalog_category} VALUES ()',
        SqlStatementKeys::UPDATE_CATEGORY =>
            'UPDATE ${table:catalog_category_entity}
                SET ${column-values:catalog_category_entity}
              WHERE row_id = :row_id',
        SqlStatementKeys::CREATE_CATEGORY_DATETIME =>
            'INSERT
               INTO ${table:catalog_category_entity_datetime}
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
            VALUES (:row_id,
                    :attribute_id,
                    :store_id,
                    :value)',
        SqlStatementKeys::UPDATE_CATEGORY_DATETIME =>
            'UPDATE ${table:catalog_category_entity_datetime}
               SET row_id = :row_id,
                   attribute_id = :attribute_id,
                   store_id = :store_id,
                   value = :value
             WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_DECIMAL =>
            'INSERT
               INTO ${table:catalog_category_entity_decimal}
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
            VALUES (:row_id,
                    :attribute_id,
                    :store_id,
                    :value)',
        SqlStatementKeys::UPDATE_CATEGORY_DECIMAL =>
            'UPDATE ${table:catalog_category_entity_decimal}
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_INT =>
            'INSERT
               INTO ${table:catalog_category_entity_int}
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
             VALUES (:row_id,
                     :attribute_id,
                     :store_id,
                     :value)',
        SqlStatementKeys::UPDATE_CATEGORY_INT =>
            'UPDATE ${table:catalog_category_entity_int}
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_VARCHAR =>
            'INSERT
               INTO ${table:catalog_category_entity_varchar}
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
             VALUES (:row_id,
                     :attribute_id,
                     :store_id,
                     :value)',
        SqlStatementKeys::UPDATE_CATEGORY_VARCHAR =>
            'UPDATE ${table:catalog_category_entity_varchar}
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_TEXT =>
            'INSERT
               INTO ${table:catalog_category_entity_text}
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
             VALUES (:row_id,
                     :attribute_id,
                     :store_id,
                     :value)',
        SqlStatementKeys::UPDATE_CATEGORY_TEXT =>
            'UPDATE ${table:catalog_category_entity_text}
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id',
        SqlStatementKeys::CATEGORY_VARCHAR_BY_ATTRIBUTE_CODE_AND_ENTITY_TYPE_ID_AND_STORE_ID_AND_PK =>
            'SELECT t1.*
               FROM ${table:catalog_category_entity_varchar} t1,
                    ${table:eav_attribute} t2
              WHERE t2.attribute_code = :attribute_code
                AND t2.entity_type_id = :entity_type_id
                AND t1.attribute_id = t2.attribute_id
                AND (t1.store_id = :store_id OR t1.store_id = 0)
                AND t1.row_id = :pk
           ORDER BY t1.store_id DESC'
    );

    /**
     * Initializes the SQL statement repository with the primary key and table prefix utility.
     *
     * @param \IteratorAggregate<\TechDivision\Import\Dbal\Utils\SqlCompilerInterface> $compilers The array with the compiler instances
     */
    public function __construct(\IteratorAggregate $compilers)
    {

        // pass primary key + table prefix utility to parent instance
        parent::__construct($compilers);

        // compile the SQL statements
        $this->compile($this->statements);
    }
}
