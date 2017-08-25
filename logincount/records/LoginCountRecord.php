<?php
/**
 *  Login Count plugin for Craft CMS
 *
 * @author		Jason Mayo
 * @copyright 	Copyright (c) 2017 Jason Mayo
 * @twitter 		@madebymayo
 * @package   	LoginCount
 */

namespace Craft;

class LoginCountRecord extends BaseRecord
{

    public function getTableName()
    {
        return 'logincount';
    }

   protected function defineAttributes()
    {
        return array(
            'userId'      => array(AttributeType::Number),
            'loginCount'  => array(AttributeType::Number),
            'loginCountAbsolute'  => array(AttributeType::Number)
        );
    }

    public function defineRelations()
    {
        return array(
        );
    }
}