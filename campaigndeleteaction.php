<?php

require_once 'campaigndeleteaction.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function campaigndeleteaction_civicrm_config(&$config) {
  _campaigndeleteaction_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function campaigndeleteaction_civicrm_xmlMenu(&$files) {
  _campaigndeleteaction_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function campaigndeleteaction_civicrm_install() {
  _campaigndeleteaction_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function campaigndeleteaction_civicrm_uninstall() {
  _campaigndeleteaction_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function campaigndeleteaction_civicrm_enable() {
  _campaigndeleteaction_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function campaigndeleteaction_civicrm_disable() {
  _campaigndeleteaction_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function campaigndeleteaction_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _campaigndeleteaction_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function campaigndeleteaction_civicrm_managed(&$entities) {
  _campaigndeleteaction_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function campaigndeleteaction_civicrm_caseTypes(&$caseTypes) {
  _campaigndeleteaction_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function campaigndeleteaction_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _campaigndeleteaction_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

function campaigndeleteaction_civicrm_buildForm($formName, &$form) {
  
  if ($formName == 'CRM_Contribute_Form_Search' && isset($_GET['contribution_campaign_id'])){
    
    $searcharray = array('contribution_campaign_id' => $_GET['contribution_campaign_id']);
    $searchparam = CRM_Contact_BAO_Query::convertFormValues($searcharray);
    $selector = new CRM_Contribute_Selector_Search($searchparam);
    $selector->setKey($form->controller->_key);
    
    $controller = new CRM_Core_Selector_Controller($selector,
    NULL,
    NULL,
    CRM_Core_Action::VIEW,
    $form,
    NULL,
    NULL,
    NULL
    );    
    $controller->setEmbedded(TRUE);
    $controller->run();

  }  
}