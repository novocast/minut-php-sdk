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

class HomesDisturbance extends Entity
{
    public $entity = 'homes/{home_id}/disturbance';
    protected $apiMethods = ['update'];

    public function getEntityUrl($action, $homeId = null)
    {
        return str_replace('{home_id}', $homeId, $this->entity);
    }
}
