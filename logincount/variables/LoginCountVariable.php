<?php
/**
 * Login Count plugin for Craft CMS
 *
 * Login Count Variable
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      bymayo.co.uk
 * @package   LoginCount
 * @since     1.0.0
 */

namespace Craft;

class LoginCountVariable
{

    public function total($user)
	{
		return craft()->loginCount->totalByUser($user, 'loginCount');
    }
    
    public function totalAbsolute($user)
	{
		return craft()->loginCount->totalByUser($user, 'loginCountAbsolute');
    }
    
}