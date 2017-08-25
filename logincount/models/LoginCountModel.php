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

class LoginCountModel extends BaseModel
{

    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'userId'      => array(AttributeType::Number),
            'loginCount'  => array(AttributeType::Number),
            'loginCountAbsolute'  => array(AttributeType::Number)
        ));
    }

}