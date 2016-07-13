<?php

/**
 * @file
 * The Missing Module Message Fixer Admin Settings file.
 */

/**
 * Missing Module Message Fixer Form.
 */
function module_missing_message_fixer_form() {
  $rows = $form = array();

  // Set the header.
  $header = array(
    'name' => 'Name',
    'type' => 'Type',
    'filename' => 'Filename',
  );
  // Grab all the modules in the system table.
  $query = db_query("SELECT filename, type, name FROM {system} WHERE type = :type", array(':type' => 'module'));

  // Go through the query and check to see if the module exists in the directory.
  foreach ($query->fetchAll() as $record) {
    // Grab the checker.
    $check = drupal_get_filename($record->type, $record->name, $record->filename, FALSE);

    // If drupal_get_filename returns null = we got problems.
    if (is_null($check) && $record->name != 'default') {
      $rows[$record->name] = array(
        'name' => $record->name,
        'type' => $record->type,
        'filename' => $record->filename,
      );
    }
  }

  // Fancy title string.
  $title = t('This list comes from the system table and is checked against the drupal_get_filename() function. See <a href="@link" target="_blank">this issue</a> for more information.', array(
    '@link' => 'https://www.drupal.org/node/2487215',
  ));

  // Title.
  $form['title'] = array(
    '#type' => 'item',
    '#markup' => '<h2><center>' . $title . '</h2></center>',
  );

  // Fancy submit buttons to win this.
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Remove These Errors!'),
    '#submit' => array('module_missing_message_fixer_form_submit'),
    '#prefix' => '<center>',
    '#suffix' => '</center>',
  );

  // Set the tables select to make this more granular.
  $form['table'] = array(
    '#type' => 'tableselect',
    '#header' => $header,
    '#options' => $rows,
    '#empty' => t('No Missing Modules Found!!!'),
  );

  return $form;
}

/**
 * Submit handler for Missing Module Message Fixer Form.
 */
function module_missing_message_fixer_form_submit($form, &$form_state) {

  // Go through each record and add it to the array to win.
  foreach ($form_state['values']['table'] as $module) {
    $modules[] = $module;
  }

  // Delete if there is no modules.
  if (count($modules) > 0) {
    db_delete('system')
      ->condition('name', $modules, 'IN')
      ->execute();
  }
}
