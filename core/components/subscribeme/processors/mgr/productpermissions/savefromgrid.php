<?php
/**
 * SubscribeMe
 *
 * Copyright 2011 by Mark Hamstra <business@markhamstra.nl>
 *
 * This file is part of SubscribeMe, a subscriptions management extra for MODX Revolution
 *
 * SubscribeMe is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * SubscribeMe is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * SubscribeMe; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
*/

$data = $modx->fromJSON($scriptProperties['data']);
$id = $modx->getOption('id',$data,null);

if (!$id)
    $st = $modx->newObject('smProductPermissions');
else
    $st = $modx->getObject('smProductPermissions',$id);

if (!($st instanceof smProductPermissions))
    return $modx->error->failure($modx->lexicon('sm.error.invalidobject'));

$st->fromArray($data);

if ($st->save())
    return $modx->error->success();

return $modx->error->failure($modx->lexicon('sm.error.savefail'));

?>