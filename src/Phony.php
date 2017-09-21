<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho;

use Eloquent\Phony\Facade\FacadeTrait;

/**
 * A facade for Phony usage under Pho.
 */
class Phony
{
    use FacadeTrait;

    private static $globals = Globals::class;
}
