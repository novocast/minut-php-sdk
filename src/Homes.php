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

class Homes extends Entity
{

    public $entity = 'homes';

    protected $apiMethods = ['read', 'list', 'update', 'delete', 'create'];


    public function getEntityUrl($action, $deviceId = null)
    {
        if ($action === 'list') {
            return $this->entity;
        }

        return $this->entity . '/' . $deviceId;
    }


    public function getActionVerb($action)
    {
        if ($action === 'update') {
            return 'patch';
        }

        return parent::getActionVerb($action);
    }
}
