<?php
/**
 * Handler
 * @package lib-user-last-seen
 * @version 0.0.1
 */

namespace LibUserLastSeen\Library;

use LibUserLastSeen\Model\UserLastSeen as ULSeen;

class Handler
{
    static function getSeenTime(): string{
        $tzone = \Mim::$app->config->libFormatter->formats->{'user-last-seen'}->seen->timezone ?? null;
        if(!$tzone || $tzone != 'UTC')
            return date('Y-m-d H:i:s');
        return gmdate('Y-m-d H:i:s');
    }

    static function identified(object $user): void{
        $seen = self::getSeenTime();
        ULSeen::set(['seen'=>$seen], ['user'=>$user->id]);
    }

    static function authorized(string $user_id): void{
        $seen = self::getSeenTime();
        ULSeen::create(['user'=>$user_id, 'seen'=>$seen], true);
    }
}