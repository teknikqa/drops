<?php
// $Id$

/**
 * @file
 * template.php!
 */

/**
 * Override or insert variables into the html template.
 */
function bliss_preprocess_html(&$vars) {

  $vars['hcard'] = "<link href=\"http://www.google.com/profiles/113934594391355796472\" type=\"text/html\" rel=\"me\">";
}

function bliss_links($links, $attributes = array()) {
  if (isset($links['blog_usernames_blog'])) {
    unset($links['blog_usernames_blog']);
  }

  return theme_links($links, $attributes);
}
