<?php

/**
 * TechDivision\Import\Category\Ee\Repositories\SqlStatementRepository
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

namespace TechDivision\Import\Category\Ee\Repositories;

use TechDivision\Import\Category\Ee\Utils\SqlStatementKeys;

/**
 * Repository class with the SQL statements to use.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
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
                       FROM eav_attribute t1, catalog_category_entity_varchar t2
                      WHERE t1.attribute_code = \'name\'
                        AND t1.entity_type_id = 3
                        AND t2.attribute_id = t1.attribute_id
                        AND t2.store_id = 0
                        AND t2.row_id = t0.row_id) AS name,
                    (SELECT `value`
                       FROM eav_attribute t1, catalog_category_entity_varchar t2
                      WHERE t1.attribute_code = \'url_path\'
                        AND t1.entity_type_id = 3
                        AND t2.attribute_id = t1.attribute_id
                        AND t2.store_id = 0
                        AND t2.row_id = t0.row_id) AS url_path
               FROM catalog_category_entity AS t0',
        SqlStatementKeys::CATEGORY_VARCHARS_BY_ENTITY_IDS =>
            'SELECT t1.*
               FROM catalog_category_entity AS t0
         INNER JOIN catalog_category_entity_varchar AS t1
                 ON t1.row_id = t0.row_id
         INNER JOIN eav_attribute AS t2
                 ON t2.entity_type_id = 3
                AND t2.attribute_code = \'name\'
                AND t1.attribute_id = t2.attribute_id
                AND t1.store_id = 0
                AND t0.entity_id IN (?)',
        SqlStatementKeys::CATEGORY =>
            'SELECT * FROM catalog_category_entity WHERE row_id = :row_id',
        SqlStatementKeys::CATEGORY_DATETIME =>
            'SELECT *
               FROM catalog_category_entity_datetime
              WHERE row_id = :row_id
                AND attribute_id = :attribute_id
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_DECIMAL =>
            'SELECT *
               FROM catalog_category_entity_decimal
              WHERE row_id = :row_id
                AND attribute_id = :attribute_id
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_INT =>
            'SELECT *
               FROM catalog_category_entity_int
              WHERE row_id = :row_id
                AND attribute_id = :attribute_id
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_TEXT =>
            'SELECT *
               FROM catalog_category_entity_text
              WHERE row_id = :row_id
                AND attribute_id = :attribute_id
                AND store_id = :store_id',
        SqlStatementKeys::CATEGORY_VARCHAR =>
            'SELECT *
               FROM catalog_category_entity_varchar
              WHERE row_id = :row_id
                AND attribute_id = :attribute_id
                AND store_id = :store_id',
        SqlStatementKeys::CREATE_SEQUENCE_CATEGORY =>
            'INSERT INTO sequence_catalog_category VALUES ()',
        SqlStatementKeys::CREATE_CATEGORY =>
            'INSERT
               INTO catalog_category_entity
                    (attribute_set_id,
                     entity_id,
                     created_in,
                     updated_in,
                     parent_id,
                     created_at,
                     updated_at,
                     path,
                     position,
                     level,
                     children_count)
             VALUES (:attribute_set_id,
                     :entity_id,
                     :created_in,
                     :updated_in,
                     :parent_id,
                     :created_at,
                     :updated_at,
                     :path,
                     :position,
                     :level,
                     :children_count)',
        SqlStatementKeys::UPDATE_CATEGORY =>
            'UPDATE catalog_category_entity
                SET attribute_set_id = :attribute_set_id,
                    entity_id = :entity_id,
                    created_in = :created_in,
                    updated_in = :updated_in,
                    parent_id = :parent_id,
                    created_at = :created_at,
                    updated_at = :updated_at,
                    path = :path,
                    position = :position,
                    level = :level,
                    children_count = :children_count
              WHERE entity_id = :entity_id',
        SqlStatementKeys::CREATE_CATEGORY_DATETIME =>
            'INSERT
               INTO catalog_category_entity_datetime
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
            VALUES (:row_id,
                    :attribute_id,
                    :store_id,
                    :value)',
        SqlStatementKeys::UPDATE_CATEGORY_DATETIME =>
            'UPDATE catalog_category_entity_datetime
               SET row_id = :row_id,
                   attribute_id = :attribute_id,
                   store_id = :store_id,
                   value = :value
             WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_DECIMAL =>
            'INSERT
               INTO catalog_category_entity_decimal
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
            VALUES (:row_id,
                    :attribute_id,
                    :store_id,
                    :value)',
        SqlStatementKeys::UPDATE_CATEGORY_DECIMAL =>
            'UPDATE catalog_category_entity_decimal
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_INT =>
            'INSERT
               INTO catalog_category_entity_int
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
             VALUES (:row_id,
                     :attribute_id,
                     :store_id,
                     :value)',
        SqlStatementKeys::UPDATE_CATEGORY_INT =>
            'UPDATE catalog_category_entity_int
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_VARCHAR =>
            'INSERT
               INTO catalog_category_entity_varchar
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
             VALUES (:row_id,
                     :attribute_id,
                     :store_id,
                     :value)',
        SqlStatementKeys::UPDATE_CATEGORY_VARCHAR =>
            'UPDATE catalog_category_entity_varchar
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id',
        SqlStatementKeys::CREATE_CATEGORY_TEXT =>
            'INSERT
               INTO catalog_category_entity_text
                    (row_id,
                     attribute_id,
                     store_id,
                     value)
             VALUES (:row_id,
                     :attribute_id,
                     :store_id,
                     :value)',
        SqlStatementKeys::UPDATE_CATEGORY_TEXT =>
            'UPDATE catalog_category_entity_text
                SET row_id = :row_id,
                    attribute_id = :attribute_id,
                    store_id = :store_id,
                    value = :value
              WHERE value_id = :value_id'
    );

    /**
     * Initialize the the SQL statements.
     */
    public function __construct()
    {

        // call the parent constructor
        parent::__construct();

        // merge the class statements
        foreach ($this->statements as $key => $statement) {
            $this->preparedStatements[$key] = $statement;
        }
    }
}
