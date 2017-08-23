<?php
/**
 * Login Count plugin for Craft CMS
 *
 * Tracks how many times a user has logged in
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2017 Jason Mayo
 * @link      bymayo.co.uk
 * @package   LoginCount
 * @since     1.0.0
 */

namespace Craft;

class LoginCountPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
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

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Login Count');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Tracks how many times a user has logged in');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/bymayo/logincount/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/bymayo/logincount/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Jason Mayo';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'bymayo.co.uk';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'loginDelay' => array(AttributeType::String,  'default' => '180'),
            'trackAccessCp' => array(AttributeType::Bool, 'default' => false)
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
       return craft()->templates->render('logincount/LoginCount_Settings', array(
           'settings' => $this->getSettings()
       ));
    }

    /**
     * @param mixed $settings  The plugin's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {
        // Modify $settings here...

        return $settings;
    }

}