<?php

/**
 * TechDivision\Import\Category\Ee\Subjects\EeSortableBunchSubject
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Category\Ee\Subjects;

/**
 * The subject implementation that supports artefact replacement.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-category-ee
 * @link      http://www.techdivision.com
 */
class EeSortableBunchSubject extends EeBunchSubject
{

    /**
     * Set's/Replace's the artefacts for the given type whith the ones from the passed array.
     *
     * @param string $type      The artefact type to replace
     * @param array  $artefacts The artefacts to replace with
     *
     * @return void
     */
    public function setArtefactsByType($type, array $artefacts)
    {
        $this->artefacts[$type] = $artefacts;
    }
}
