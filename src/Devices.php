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

class Devices extends Entity
{

    public $entity = 'devices';

    protected $apiMethods = ['read', 'list', 'update', 'delete'];


    public function getEntityUrl($action, $deviceId = null)
    {
        if ($action === 'list') {
            return $this->entity;
        }

        return $this->entity . '/' . $deviceId;
    }

    public function getResponseData($action)
    {
        if ($action === 'list') {
            return $this->entity;
        }

        return null;
    }

    public function __call($name, $arguments)
    {
        $response = parent::__call($name, $arguments);

        $entity = $this->getResponseData($name);

        if ($entity === null) {
            return $response;
        }
        return $response->$entity;
    }
}
