<?php
/**
 * Login Count plugin for Craft CMS
 *
 * LoginCount Model
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      bymayo.co.uk
 * @package   LoginCount
 * @since     1.0.0
 */

namespace Craft;

class LoginCountModel extends BaseModel
{
    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'userId'      => array(AttributeType::Number),
            'loginCount'  => array(AttributeType::Number),
            'loginCountAbsolute'  => array(AttributeType::Number)
        ));
    }

}