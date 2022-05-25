<?php

/*
 * This file is part of the Musicbrainz package.
 *
 * © Anthony Totton <novocast7@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Novocast\Minut;

use Novocast\Minut\Entity;

class DeviceBattery extends Entity
{

    public $entity = 'devices/{device_id}/battery';

    public function getEntityUrl($action, $deviceId = null)
    {
        return str_replace('{device_id}', $deviceId, $this->entity);
    }
}
