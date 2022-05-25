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

class Users extends Entity
{

    public $entity = 'users';

    protected $apiMethods = ['read', 'update'];


    public function getEntityUrl($action, $userId = null)
    {
        return $this->entity . '/' . $userId;
    }
}
