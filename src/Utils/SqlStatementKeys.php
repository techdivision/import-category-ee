<?php

/**
 * TechDivision\Import\Category\Ee\Utils\SqlStatementKeys
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Utils;

/**
 * Utility class with the SQL statements to use.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class SqlStatementKeys extends \TechDivision\Import\Category\Utils\SqlStatementKeys
{

    /**
     * The SQL statement to load all available categories.
     *
     * @var string
     */
    const CATEGORIES = 'categories';

    /**
     * The SQL statement to load the category varchars for a list of entity IDs.
     *
     * @var string
     */
    const CATEGORY_VARCHARS_BY_ENTITY_IDS = 'category_varchars.by.entity_ids';

    /**
     * The SQL statement to load the category varchars for a list of row IDs.
     *
     * @var string
     */
    const CATEGORY_VARCHARS_BY_ROW_IDS = 'category_varchars.by.row_ids';

    /**
     * The SQL statement to load the actual category with the passed row ID.
     *
     * @var string
     */
    const CATEGORY = 'category';

    /**
     * The SQL statement to load the category datetime attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_DATETIME = 'category_datetime';

    /**
     * The SQL statement to load the category decimal attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_DECIMAL = 'category_decimal';

    /**
     * The SQL statement to load the category integer attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_INT = 'category_int';

    /**
     * The SQL statement to load the category text attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_TEXT = 'category_text';

    /**
     * The SQL statement to load the category varchar attribute with the passed row/attribute/store ID.
     *
     * @var string
     */
    const CATEGORY_VARCHAR = 'category_varchar';

    /**
     * The SQL statement to create a new sequence category value.
     *
     * @var string
     */
    const CREATE_SEQUENCE_CATEGORY = 'create.sequence_category';

    /**
     * The SQL statement to create new categories.
     *
     * @var string
     */
    const CREATE_CATEGORY = 'create.category';

    /**
     * The SQL statement to update an existing category.
     *
     * @var string
     */
    const UPDATE_CATEGORY = 'update.category';

    /**
     * The SQL statement to create a new category datetime value.
     *
     * @var string
     */
    const CREATE_CATEGORY_DATETIME = 'create.category_datetime';

    /**
     * The SQL statement to update an existing category datetime value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_DATETIME = 'update.category_datetime';

    /**
     * The SQL statement to create a new category decimal value.
     *
     * @var string
     */
    const CREATE_CATEGORY_DECIMAL = 'create.category_decimal';

    /**
     * The SQL statement to update an existing category decimal value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_DECIMAL = 'update.category_decimal';

    /**
     * The SQL statement to create a new category integer value.
     *
     * @var string
     */
    const CREATE_CATEGORY_INT = 'create.category_int';

    /**
     * The SQL statement to update an existing category integer value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_INT = 'update.category_int';

    /**
     * The SQL statement to create a new category varchar value.
     *
     * @var string
     */
    const CREATE_CATEGORY_VARCHAR = 'create.category_varchar';

    /**
     * The SQL statement to update an existing category varchar value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_VARCHAR = 'update.category_varchar';

    /**
     * The SQL statement to create a new category text value.
     *
     * @var string
     */
    const CREATE_CATEGORY_TEXT = 'create.category_text';

    /**
     * The SQL statement to update an existing category text value.
     *
     * @var string
     */
    const UPDATE_CATEGORY_TEXT = 'update.category_text';
}
