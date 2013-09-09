/**
 * redirectUsergroups
 *
 * Copyright 2009-2011 by Bruno Perner <b.perner@gmx.de>
 *
 * redirectUsergroups is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * redirectUsergroups is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * redirectUsergroups; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package redirectUsergroups
 */
/**
 * redirectUsergroups
 *
 * Redirect Users of specified groups to specified Resources
 *
 * Example:
 *
 * [[!redirectUsergroups? &redirs=`Frontenduser:3,Testuser:8`]]
 *
 */

if (isset($redirs)){
    $redirs=explode(',',$redirs);
    if (count($redirs)>0){
        foreach ($redirs as $redir){
      
          $redir=explode(':',$redir);
              
            if (count($redir)==2){
   
                if ($modx->user->isMember($redir[0])){
                    $url=$modx->makeUrl($redir[1]);
                }            
            }
        }
    }
}

return  $modx->sendRedirect($url);