<?php

/**
 * This File is part of the Yam\Entities package
 *
 * (c) Thomas Appel <mail@thomas-appel.com>
 *
 * For full copyright and license information, please refer to the LICENSE file
 * that was distributed with this package.
 */

namespace Yam\Entities;

/**
 * @class Section extends BaseEntity
 * @see BaseEntity
 *
 * @package Yam\Entities
 * @version $Id$
 * @author Thomas Appel <mail@thomas-appel.com>
 * @license MIT
 */
class Section extends BaseEntity
{
    /**
     * getKeyName
     *
     * @access public
     * @return mixed
     */
    public function getKeyName()
    {
        return 'uuid';
    }

    /**
     * getVersionableAttributeValue
     *
     * @param mixed $value
     *
     * @access public
     * @return mixed
     */
    public function getVersionableAttributeValue($value)
    {
        return (bool)$value;
    }

    /**
     * countFields
     *
     * @access public
     * @return integer
     */
    public function countFields()
    {
        return count($this->fields);
    }

    public function getOwnAttributes()
    {
        $raw = [];

        foreach ($this->data as $attr => $value) {
            if ('fields' === $attr || 'entries' === $attr) {
                continue;
            }
            $raw[$attr] = $value;
        }

        return $raw;
    }

    public function getData()
    {
        return $this->getOwnAttributes();
    }

    /**
     * getAssignableAttributes
     *
     * @access protected
     * @return array
     */
    protected function getAssignableAttributeKeys()
    {
        return [
            'id',
            'uuid',
            'name',
            'handle',
            'versionable',
            'fields',
            'updated_at',
            'created_at'
        ];
    }

    /**
     * getImmutableKeys
     *
     *
     * @access protected
     * @return array
     */
    protected function getImmutableAttributeKeys()
    {
        return [
            'id',
            'uuid',
            'created_at'
        ];
    }
}
