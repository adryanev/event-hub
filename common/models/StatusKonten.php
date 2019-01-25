<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/11/2019
 * Time: 11:21 PM
 */

namespace common\models;


class StatusKonten
{

    const STATUS_DELETED = 1;
    const STATUS_NOT_VERIFIED = 0;
    const STATUS_VERIFIED = 1;
    const STATUS_ACTIVE = 0;
    const ORGANIZER_NOT_VERIFIED = 'not_verified';
    const ORGANIZER_PENDING = 'pending';
    const ORGANIZER_VERIFIED = 'verified';
    const NOTIFICATION_READ = 1;
    const NOTIFICATION_NOT_READ = 0;

}