<?php
/**
 * Login Count plugin for Craft CMS
 *
 * LoginCount Service
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      bymayo.co.uk
 * @package   LoginCount
 * @since     1.0.0
 */

namespace Craft;

class LoginCountService extends BaseApplicationComponent
{
	
	public function getSetting($name)
	{
		return craft()->plugins->getPlugin('loginCount')->getSettings()->$name;
	}
	
	public function validateUser($username)
	{
		
		$criteria = craft()->elements->getCriteria(ElementType::User);
		$criteria->username = $username;
		$criteria->limit = 1;
		
		$user = $criteria->find()[0];
		
		if ($user) {
			$this->saveCount($user);
		}
		
		/*
			if ($user->accessCp) {
				
			}
		*/

		return true;
		
	}
	
	public function saveCount($user)
	{
		
		$loginRecord = LoginCountRecord::model()->findByAttributes(
			array(
				'userId' => $user->id
			)
		);
		
		if ($loginRecord) {
			if (date("U") >= $user->lastLoginDate->format("U") + $this->getSetting('loginDelay')) {
				$loginRecord->setAttribute('loginCount', $loginRecord->getAttribute('loginCount') + 1);
			}
			$loginRecord->setAttribute('loginCountAbsolute', $loginRecord->getAttribute('loginCountAbsolute') + 1);
		}
		else {
			$loginRecord = new LoginCountRecord;
			$loginRecord->setAttribute('userId', $user->id);
			$loginRecord->setAttribute('loginCount', 1);
			$loginRecord->setAttribute('loginCountAbsolute', 1);
		}
		
		$loginRecord->save();
		
		return true;
		
	}
	
	public function removeCountsByUser($user)
	{
		
	    $loginRecord = LoginCountRecord::model()->deleteAllByAttributes(
	    	array(
	    		'userId' => $user->id
	    	)
	    );
	    
	    return true;
		
	}
	
	public function totalByUser($user, $type)
	{
		
		if ($user) {
			
		    $loginModel = new LoginCountModel();
	        $loginRecord = LoginCountRecord::model()->findByAttributes(array('userId' => $user->id));
	        
	        if ($loginRecord) {
		         $loginModel = LoginCountModel::populateModel($loginRecord);
		         return $loginModel->$type;
	        }
	        
	        return false;
			
		}
		
	}

}