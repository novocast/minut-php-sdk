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

class Guests extends Entity
{

    public $entity = 'homes/{home_id}/guests';

    protected $apiMethods = ['read', 'list', 'update', 'delete', 'create', 'change'];

    public function getEntityUrl($action, $homeId = null)
    {
        if ($action === 'list') {
            return $this->entity;
        }

        return $this->entity . '/' . $homeId;
    }


    public function getActionVerb($action)
    {
        if ($action === 'change') {
            return 'patch';
        }

        return parent::getActionVerb($action);
    }
}
