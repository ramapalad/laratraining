<?php

namespace App;

enum AssetEnum: string
{
    case Deployed = 'Deployed';
    case In_Storage = 'In Storage';
    case Maintenance = 'Maintenance';
    case Retired = 'Retired';
    case Broken = 'Broken';


    public function label(): string
    {
        return match ($this) {
            self::Deployed => 'Deployed',
            self::In_Storage => 'In Storage',
            self::Maintenance => 'Maintenance',
            self::Retired => 'Retired',
            self::Broken => 'Broken',
        };
    }
}
