<?php

/**
 * TechDivision\Import\Category\Ee\Utils\SqlStatements
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

namespace TechDivision\Import\Category\Ee\Utils;

/**
 * Utility class with the SQL statements to use.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class SqlStatements extends \TechDivision\Import\Category\Utils\SqlStatements
{

    /**
     * The SQL statement to load all available categories.
     *
     * @var string
     */
    const CATEGORIES = 'SELECT t0.*,
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
                          FROM catalog_category_entity AS t0';

    /**
     * The SQL statement to load the category varchars for a list of entity IDs.
     *
     * @var string
     */
    const CATEGORY_VARCHARS_BY_ENTITY_IDS = 'SELECT t1.*
                                               FROM catalog_category_entity AS t0
                                         INNER JOIN catalog_category_entity_varchar AS t1
                                                 ON t1.row_id = t0.row_id
                                         INNER JOIN eav_attribute AS t2
                                                 ON t2.entity_type_id = 3
                                                AND t2.attribute_code = \'name\'
                                                AND t1.attribute_id = t2.attribute_id
                                                AND t1.store_id = 0
                                                AND t0.entity_id IN (?)';

    /**
     * The SQL statement to load the actual category with the passed row ID.
     *
     * @var string
     */
    const CATEGORY = 'SELECT * FROM catalog_category_entity WHERE row_id = :row_id';

    /**
     * The SQL statement to load the category datetime attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_DATETIME = 'SELECT *
                                 FROM catalog_category_entity_datetime
                                WHERE row_id = :row_id
                                  AND attribute_id = :attribute_id
                                  AND store_id = :store_id';

    /**
     * The SQL statement to load the category decimal attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_DECIMAL = 'SELECT *
                                FROM catalog_category_entity_decimal
                               WHERE row_id = :row_id
                                 AND attribute_id = :attribute_id
                                 AND store_id = :store_id';

    /**
     * The SQL statement to load the category integer attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_INT = 'SELECT *
                            FROM catalog_category_entity_int
                           WHERE row_id = :row_id
                             AND attribute_id = :attribute_id
                             AND store_id = :store_id';

    /**
     * The SQL statement to load the category text attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_TEXT = 'SELECT *
                             FROM catalog_category_entity_text
                            WHERE row_id = :row_id
                              AND attribute_id = :attribute_id
                              AND store_id = :store_id';

    /**
     * The SQL statement to load the category varchar attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_VARCHAR = 'SELECT *
                                FROM catalog_category_entity_varchar
                               WHERE row_id = :row_id
                                 AND attribute_id = :attribute_id
                                 AND store_id = :store_id';

    /**
     * The SQL statement to create a new sequence category value.
     *
     * @var string
     */
    const CREATE_SEQUENCE_CATEGORY = 'INSERT INTO sequence_catalog_category VALUES ()';

    /**
     * The SQL statement to create new categories.
     *
     * @var string
     */
    const CREATE_CATEGORY = 'INSERT
                               INTO catalog_category_entity (attribute_set_id,
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
                                     :children_count)';

    /**
     * The SQL statement to update an existing category.
     *
     * @var string
     */
    const UPDATE_CATEGORY = 'UPDATE catalog_category_entity
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
                              WHERE entity_id = :entity_id';

    /**
     * The SQL statement to create a new category datetime value.
     *
     * @var string
     */
    const CREATE_CATEGORY_DATETIME = 'INSERT
                                        INTO catalog_category_entity_datetime (
                                                 row_id,
                                                 attribute_id,
                                                 store_id,
                                                 value
                                             )
                                     VALUES (:row_id,
                                             :attribute_id,
                                             :store_id,
                                             :value)';

    /**
     * The SQL statement to update an existing category datetime value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_DATETIME = 'UPDATE catalog_category_entity_datetime
                                         SET row_id = :row_id,
                                             attribute_id = :attribute_id,
                                             store_id = :store_id,
                                             value = :value
                                       WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new category decimal value.
     *
     * @var string
     */
    const CREATE_CATEGORY_DECIMAL = 'INSERT
                                       INTO catalog_category_entity_decimal (
                                                row_id,
                                                attribute_id,
                                                store_id,
                                                value
                                            )
                                    VALUES (:row_id,
                                            :attribute_id,
                                            :store_id,
                                            :value)';

    /**
     * The SQL statement to update an existing category decimal value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_DECIMAL = 'UPDATE catalog_category_entity_decimal
                                        SET row_id = :row_id,
                                            attribute_id = :attribute_id,
                                            store_id = :store_id,
                                            value = :value
                                      WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new category integer value.
     *
     * @var string
     */
    const CREATE_CATEGORY_INT = 'INSERT
                                   INTO catalog_category_entity_int (
                                            row_id,
                                            attribute_id,
                                            store_id,
                                            value
                                        )
                                 VALUES (:row_id,
                                         :attribute_id,
                                         :store_id,
                                         :value)';

    /**
     * The SQL statement to update an existing category integer value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_INT = 'UPDATE catalog_category_entity_int
                                    SET row_id = :row_id,
                                        attribute_id = :attribute_id,
                                        store_id = :store_id,
                                        value = :value
                                  WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new category varchar value.
     *
     * @var string
     */
    const CREATE_CATEGORY_VARCHAR = 'INSERT
                                       INTO catalog_category_entity_varchar (
                                                row_id,
                                                attribute_id,
                                                store_id,
                                                value
                                            )
                                     VALUES (:row_id,
                                             :attribute_id,
                                             :store_id,
                                             :value)';

    /**
     * The SQL statement to update an existing category varchar value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_VARCHAR = 'UPDATE catalog_category_entity_varchar
                                        SET row_id = :row_id,
                                            attribute_id = :attribute_id,
                                            store_id = :store_id,
                                            value = :value
                                      WHERE value_id = :value_id';

    /**
     * The SQL statement to create a new category text value.
     *
     * @var string
     */
    const CREATE_CATEGORY_TEXT = 'INSERT
                                    INTO catalog_category_entity_text (
                                             row_id,
                                             attribute_id,
                                             store_id,
                                             value
                                         )
                                  VALUES (:row_id,
                                          :attribute_id,
                                          :store_id,
                                          :value)';

    /**
     * The SQL statement to update an existing category text value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_TEXT = 'UPDATE catalog_category_entity_text
                                     SET row_id = :row_id,
                                         attribute_id = :attribute_id,
                                         store_id = :store_id,
                                         value = :value
                                   WHERE value_id = :value_id';
}
