<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NodeWar()
 * @method static static Quest()
 * @method static static GearScore()
 */
final class GuildRequirement extends Enum
{
    const NodeWar = 0;
    const Quest = 1;
    const GearScore = 2;
}
