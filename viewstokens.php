<?php

require_once 'viewstokens.civix.php';
// phpcs:disable
use CRM_Viewstokens_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function viewstokens_civicrm_config(&$config) {
  _viewstokens_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function viewstokens_civicrm_xmlMenu(&$files) {
  _viewstokens_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function viewstokens_civicrm_install() {
  _viewstokens_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function viewstokens_civicrm_postInstall() {
  _viewstokens_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function viewstokens_civicrm_uninstall() {
  _viewstokens_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function viewstokens_civicrm_enable() {
  _viewstokens_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function viewstokens_civicrm_disable() {
  _viewstokens_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function viewstokens_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _viewstokens_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function viewstokens_civicrm_managed(&$entities) {
  _viewstokens_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function viewstokens_civicrm_caseTypes(&$caseTypes) {
  _viewstokens_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function viewstokens_civicrm_angularModules(&$angularModules) {
  _viewstokens_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function viewstokens_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _viewstokens_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function viewstokens_civicrm_entityTypes(&$entityTypes) {
  _viewstokens_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function viewstokens_civicrm_themes(&$themes) {
  _viewstokens_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function viewstokens_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function viewstokens_civicrm_navigationMenu(&$menu) {
//  _viewstokens_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _viewstokens_civix_navigationMenu($menu);
//}
//

function viewstokens_civicrm_tokens(&$tokens) {
  // watchdog('tokens','<pre>'.print_r($tokens,TRUE).'</pre>');
  $token_name = 'views';
  $views_tokens = [];
  $views_list = [];
  if(method_exists('\Drupal\views\Views','getEnabledViews')) {
    $views_list = \Drupal\views\Views::getEnabledViews();
    // CRM_Core_Error::debug('views_list',$views_list);
  }
  foreach($views_list as $name => $view) {
    foreach($view->get('display') as $display_name => $display) {
      $views_tokens[$token_name.'.'.$name.'__'.$display_name] = $view->get('label') . ', ' . $display['display_title'];
    }
  }
  $tokens[$token_name] = $views_tokens;
}

function viewstokens_civicrm_tokenValues(&$values, $cids, $job_id = null, $tokens = array(), $context = null) {
  if (!empty($tokens['views'])) {
    // Civi::log()->error('<pre>'.print_r($tokens['views'], TRUE).'</pre>');
    if (class_exists('\Drupal') && \Drupal::hasContainer()) {
      \Drupal::moduleHandler()->loadAll();
      \Drupal::configFactory()->getEditable('system.theme')->set('default', 'vwm_base')->save();
      foreach(array_keys($tokens['views']) as $key) {
        list($view_name,$display) = explode('__', $key, 2);
	/* 
	 * this section commented out - I'd like to allow the inclusion
	 * of a parameter to pass to the view, but I can't
	$argument = NULL;
        if (strpos($display,'__')) {
          list($display_name, $argument) = explode('__', $display, 2);
          $view_renderable = views_embed_view($view_name, $display_name, $argument);
        }
        else {
          $view_renderable = views_embed_view($view_name, $display);
	} 
	 */
        $view_renderable = views_embed_view($view_name, $display);
	// CRM_Core_Error::debug('view',$view_name, 1, 1);
	// TODO: render using my view templates - using theme suggestions?
        $output = \Drupal::service('renderer')->renderPlain($view_renderable);
        $output = trim($output);
        // strip out div, yuck!
        $removals = ['<div class="views-element-container contextual-region form-group">','<div class="views-element-container form-group">'];
        foreach($removals as $removal) {
          if (substr($output, 0, strlen($removal)) === $removal && substr($output, -6) === '</div>') {
            $output = substr($output, strlen($removal));
            $output = substr($output, 0, -6);
          }
	}
	/* failed attempts to use reg ex to accomlish the removals */
        //  $output = preg_replace('|<div class=".*?">(.*)</div>|', '$1', $output);
        // $output = preg_replace('/\<[\/]{0,1}div[^\>]*\>/i', '', $output);
        // $output = render($view_renderable);
        // $xml = simplexml_load_string($output);
	// now convert src links to absolute links
	// kinda ad-hoc, something about the context in which the theming is taking place I believe
        $base_url = rtrim(CIVICRM_UF_BASEURL,"/");
        $output = str_replace('=":/usr/local/bin/','="'.$base_url.'/', $output);
        $output = str_replace(' src="/',' src="'.$base_url.'/', $output);
        $output = str_replace(' href="/',' href="'.$base_url.'/', $output);
        $matched = preg_match_all('/ href="([^#].+?)"/', $output, $matches);
        // CRM_Core_Error::debug('matched',$matched, 1, 1);
        $trackable_urls = array();
        // convert links to trackable links
        if (!empty($job_id) && !empty($output) && $matched) {
          // job details to get mailing_id 
          $job = civicrm_api3('MailingJob', 'getsingle', array('id' => $job_id));
          // $result = $xml->xpath("//@href");
          $list = array();
          // while(list( , $url) = each($result)) {
          foreach($matches[1] as $url) {
            $list[$url] = 1;
          }
          $trackable_urls = array_keys($list);
        }
        else {
          // watchdog('view values', "$view_name  $display_name $job_id ".$output);
        }
        // watchdog('view values', "$view_name  $display_name ".$output);
        foreach ($cids as $cid) {
          if (count($trackable_urls)) {
            // get event_queue_id
            $queue = civicrm_api3('MailingEventQueue', 'getsingle', array('job_id' => $job_id, 'contact_id' => $cid));
            $replace = array();
            $search = array();
            foreach($trackable_urls as $url) {
              $search[] = '"'.$url.'"';
              $replace[] = '"'.CRM_Mailing_BAO_TrackableURL::getTrackerURL($url, $job['mailing_id'], $queue['id']).'"';
            }
            $values[$cid]['views.'.$key] = str_replace($search,$replace,$output);
          }
          else {
            $values[$cid]['views.'.$key] = $output; 
          }
        }
      } 
      // watchdog('values','<pre>'.print_r($values,TRUE).'</pre>');
    }
  }
}

function viewstokens_civicrm_mosaicoBaseTemplates(&$templates) {
  $templates['viewstokens'] = [
    'name' => 'viewstokens',
    'title' => 'Views Tokens Base',
    'path' => E::url('viewstokens/template-viewstokens.html'),
    'thumbnail' => E::url('viewstokens/edres/_full.png'),
  ];
} 
