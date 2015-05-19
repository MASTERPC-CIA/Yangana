<?php

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  $output = '';

  if ($primary = menu_primary_local_tasks()) {
    $output .= "<ul class=\"tabs primary\">\n". $primary ."</ul>\n";
  }

  return $output;
}

/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $type = null) {
  static $node_type;
  if (isset($type)) $node_type = $type;

  if (!$content || $node_type == 'forum') {
    return '<div id="comments">'. $content . '</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}

/*Funciones agregadas
function journalcrunch_menu_navigation_tree($menu_name, $level) {
// Controlamos que exista el menu.
  $level=0;
if (empty($menu_name)) {
return array();
}
 
// Buscamos la herencia del menu.
$tree = menu_tree_page_data($menu_name);
 
// Comprobamos el nivel de profundidad del menú.
while ($level-- &gt; 0 &amp;&amp; $tree) {
// Recorremos el array para comprobar item por item del menu,
while ($item = array_shift($tree)) {
if ($item['link']['in_active_trail']) {
// Si el item del menu esta activo buscamos sus submenus.
$tree = empty($item['below']) ? array() : $item['below'];
break;
}
}
}
return $tree;
}
function journalcrunch_preprocess_page(&amp;$vars, $hook) {
// Insertamos dentro del array vars nuestro item de submenus. Este array contiene todas las variables que se usan en el template.
// Para buscar el nombre del menu, hacemos uso de la función variable_get
// El 1 equivale al nivel 1, pero podriamos pasar x niveles de menu.
$vars['mitheme_submenus'] = journalcrunch_menu_navigation_tree(variable_get('menu_primary_links_source', 'primary-links'), 1);
}
*/




/**
 * Define JournalCrunch variables
 */
variable_set('isFirstNoStickyNode', false);