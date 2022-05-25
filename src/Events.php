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

class Events extends Entity
{

    public $entity = 'events';

    protected $apiMethods = ['list'];


    public function getEntityUrl($action, $deviceId = null)
    {
        return $this->entity;
    }


    public function lookupDescription($type)
    {

        $descriptions = [
            'alarm_heard' => 'An alarm sound was recognised',
            'glassbreak' => 'The sound of glass break was detected',
            'short_button_press' => 'The button on Minut was pressed',
            'temperature_high' => 'Temperature is higher than the configured threshold',
            'temperature_low' => 'Temperature is lower than the configured threshold',
            'temperature_dropped_normal' => 'Temperature is back down to normal',
            'temperature_risen_normal' => 'Temperature is back up to normal',
            'humidity_high' => 'Humidity is higher than the configured threshold',
            'humidity_low' => 'Humidity is lower than the configured threshold',
            'humidity_dropped_normal' => 'Humidity is back down to normal',
            'humidity_risen_normal' => 'Humidity is back up to normal',
            'avg_sound_high' => 'Average sound levels are higher than the configured threshold',
            'sound_level_dropped_normal' => 'Sound levels are back down to normal',
            'device_offline' => 'Device went offline',
            'device_online' => 'Device went online',
            'tamper' => 'Minut was removed from or put back on its mounting plate (fallback for older devices)',
            'tamper_mounted' => 'Minut was mounted on the mounting plate (newer devices only)',
            'tamper_removed' => 'Minute was removed from the mounting plate (newer devices only)',
            'battery_low' => 'The batteries are soon empty, approximately 2 weeks left',
            'battery_empty' => 'The batteries are empty',
            'pir_motion' => 'Motion events',
            'disturbance_first_notice' => 'The first alert of the noise monitoring',
            'disturbance_second_notice' => 'The second alert of the noise monitoring',
            'disturbance_third_notice' => 'The third alert of the noise monitoring',
            'disturbance_ended' => 'Created when the noise levels have gone back to normal'
        ];

        if (isset($descriptions[$type])) {
            return $descriptions[$type];
        }

        // throw invalid event type
    }
}
