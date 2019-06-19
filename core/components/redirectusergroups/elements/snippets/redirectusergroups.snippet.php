<?php
/**
 * redirectUsergroups
 *
 * Copyright 2009-2013 by Bruno Perner <b.perner@gmx.de>
 *
 * redirectUsergroups is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * redirectUsergroups is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * redirectUsergroups; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package redirectusergroups
 * @subpackage snippet
 */
// Check parameters and set them to default values
$redirs = $modx->getOption('redirs', $scriptProperties, '');
$defaultredir = $modx->getOption('defaultredir', $scriptProperties, FALSE);
$notloggedredir = $modx->getOption('notloggedredir', $scriptProperties, FALSE);

$url = '';
$found = FALSE;

if (!empty($redirs)) {
	$redirs = explode(',', $redirs);
	foreach ($redirs as $redir) {
		// Get the current specified usergroup and resource id combination
		$redir = explode(':', $redir);
		if (count($redir) == 2) {
			// Check if user is member of the current specified usergroup
			if ($modx->user->isMember($redir[0])) {
				$url = $modx->makeUrl($redir[1]);
				$found = TRUE;
				break;
			}
		}
	}
}

if (!$found && $defaultredir !== FALSE && $modx->user->get('id') !== 0) {
	// The logged user is not in any specified usergroup
	if (is_numeric($defaultredir)) {
		// defaultredir is a resource id
		$url = $modx->makeUrl($defaultredir);
	} else {
		// otherwise treat it as url
		$url = $defaultredir;
	}
} elseif ($notloggedredir !== FALSE && $modx->user->get('id') === 0) {
	// The user is not logged in
	if (is_numeric($notloggedredir)) {
		// defaultredir is a resource id
		$url = $modx->makeUrl($notloggedredir);
	} else {
		// otherwise treat it as url
		$url = $notloggedredir;
	}
}

if (!empty($url)) {
	$modx->sendRedirect($url);
}
return '';
?>
