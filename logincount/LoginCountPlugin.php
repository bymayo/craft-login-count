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

class LoginCountPlugin extends BasePlugin
{

    public function init()
    {

		craft()->on(
			'userSession.onLogin', 
			function(Event $event){
				craft()->loginCount->validateUser($event->params['username']);
			}
		);
		
		craft()->on(
			'users.onDeleteUser', 
			function(Event $event){
				craft()->loginCount->removeCountsByUser($event->params['user']);
			}
		);
	    
	    parent::init();
    }

    public function getName()
    {
         return Craft::t('Login Count');
    }

    public function getDescription()
    {
        return Craft::t('Tracks how many times a user has logged in');
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/bymayo/logincount/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/bymayo/logincount/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Jason Mayo';
    }

    public function getDeveloperUrl()
    {
        return 'bymayo.co.uk';
    }

    public function hasCpSection()
    {
        return false;
    }

    protected function defineSettings()
    {
        return array(
            'loginDelay' => array(AttributeType::String,  'default' => '180'),
            'accessCp' => array(AttributeType::Bool, 'default' => false)
        );
    }

    public function getSettingsHtml()
    {
		return craft()->templates->render(
			'logincount/LoginCount_Settings', 
			array(
				'settings' => $this->getSettings()
			)
		);
    }

    public function prepSettings($settings)
    {
        return $settings;
    }

}