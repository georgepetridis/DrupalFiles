<?php

// Removes the generator tag in the document head.
function THEME_html_head_alter(&$head_elements) {
    unset($head_elements['system_meta_generator']);
}

// Allows the block to be rendered in page.tpl.php.
function THEME_render($module, $block_id) {
 	$block = block_load($module, $block_id);
 	$block_content = _block_render_blocks(array($block));
  	$build = _block_get_renderable_array($block_content);
  	$block_rendered = drupal_render($build);
  	return $block_rendered;
}

// Changes the default behavior of the language display so the acronym is displayed instead of the full language name.
function THEME_links__locale_block(&$vars) {
  foreach($vars['links'] as $language => $langInfo) {
    $abbr = $langInfo['language']->language;
    $name = $langInfo['language']->native;
    $vars['links'][$language]['title'] = '<abbr title="' . $name . '">' . $abbr . '</abbr>';
    $vars['links'][$language]['html'] = TRUE;
  }
  $content = theme_links($vars);
  return $content;
}
?>
