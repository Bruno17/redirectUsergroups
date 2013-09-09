<?php
/**
 * snippets transport file for redirectUsergroups extra
 *
 * Copyright 2013 by Bruno Perner b.perner@gmx.de
 * Created on 09-09-2013
 *
 * @package redirectusergroups
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<' . '?' . 'php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
/* @var xPDOObject[] $snippets */


$snippets = array();

$snippets[1] = $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => '1',
    'property_preprocess' => '',
    'name' => 'redirectUsergroups',
    'description' => '',
    'properties' => array(),
), '', true, true);
$snippets[1]->setContent(file_get_contents($sources['source_core'] . '/elements/snippets/redirectusergroups.snippet.php'));

return $snippets;
