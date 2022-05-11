<?php

declare(strict_types=1);

namespace App\Services\ElasticSearch\Constants;

final class SortPoll
{

    public const ASC = 'asc';
    public const DESC = 'desc';

    public static function getMap(): array
    {
        return [
            self::ASC => self::ASC,
            self::DESC => self::DESC,
        ];
    }

}
