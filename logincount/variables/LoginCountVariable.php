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