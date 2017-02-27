<?php

/**
 * TechDivision\Import\Category\Ee\Plugins\EeChildrenCountPlugin
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

namespace TechDivision\Import\Category\Ee\Plugins;

use TechDivision\Import\Category\Ee\Utils\MemberNames;
use TechDivision\Import\Category\Plugins\ChildrenCountPlugin;

/**
 * Plugin that updates the categories children count attribute after a successfull
 * category import for the Magento 2 EE.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeChildrenCountPlugin extends ChildrenCountPlugin
{

    /**
     * Return's the primary key of the passed category.
     *
     * @param array $category The category to return the primary key for
     *
     * @return integer The primary key of the category
     */
    protected function getPrimaryKey($category)
    {
        return $category[MemberNames::ROW_ID];
    }
}
