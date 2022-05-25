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

class HomesOccupancyDetection extends Entity
{
    public $entity = 'homes/{home_id}/occupancy_detection';
    protected $apiMethods = ['read', 'update'];

    public function getEntityUrl($action, $home_id = null)
    {
        return str_replace('{home_id}', $home_id, $this->entity);
    }
    
    public function getActionVerb($action)
    {
        if ($action === 'update') {
            return 'patch';
        }

        return parent::getActionVerb($action);
    }
}
}
