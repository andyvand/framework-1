<?php
namespace Cygnite\Database;

use Cygnite\Database\ActiveRecord;

/**
 *  Cygnite Framework
 *
 *  An open source application development framework for PHP 5.3 or newer
 *
 *   License
 *
 *   This source file is subject to the MIT license that is bundled
 *   with this package in the file LICENSE.txt.
 *   http://www.cygniteframework.com/license.txt
 *   If you did not receive a copy of the license and are unable to
 *   obtain it through the world-wide-web, please send an email
 *   to sanjoy@hotmail.com so I can send you a copy immediately.
 *
 * @Package            :  Packages
 * @Sub Packages       :  Database
 * @Filename           :  Migration
 * @Description        :  Seed your table with data using migration.
 * @Copyright          :  Copyright (c) 2013 - 2014,
 * @Link	           :  http://www.cygniteframework.com
 * @Since	           :  Version 1.0
 *
 *
 */
class Migration extends ActiveRecord
{

    /**
     * Migration constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Seed a table using migration
     *
     * @param       $table
     * @param array $attributes
     * @return bool
     */
    public function insert($table, $attributes = array())
    {
        $this->tableName = $table;
        $this->setAttributes($attributes);

        if ($this->save()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete rows using migration
     *
     * @param       $table
     * @param array $attribute
     * @return bool
     */
    public function delete($table, $attribute)
    {
        $this->tableName = $table;

        if (is_array($attribute)) {
            return $this->trash($attribute, true);
        } else if (is_string($attribute) || is_int($attribute)) {
            return $this->trash($attribute);
        }
    }
}