<?php
/**
 * Login Count plugin for Craft CMS
 *
 * LoginCount Record
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      bymayo.co.uk
 * @package   LoginCount
 * @since     1.0.0
 */

namespace Craft;

class LoginCountRecord extends BaseRecord
{
    /**
     * @return string
     */
    public function getTableName()
    {
        return 'logincount';
    }

    /**
     * @access protected
     * @return array
     */
   protected function defineAttributes()
    {
        return array(
            'userId'      => array(AttributeType::Number),
            'loginCount'  => array(AttributeType::Number),
            'loginCountAbsolute'  => array(AttributeType::Number)
        );
    }

    /**
     * @return array
     */
    public function defineRelations()
    {
        return array(
        );
    }
}