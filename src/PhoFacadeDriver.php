<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho;

use Eloquent\Phony\Facade\FacadeDriverTrait;

/**
 * A facade driver for Pho.
 */
class PhoFacadeDriver
{
    use FacadeDriverTrait;

    /**
     * Get the static instance of this driver.
     *
     * @return PhoFacadeDriver The static driver.
     */
    public static function instance(): self
    {
        return self::$instance ?? self::$instance = new self();
    }

    /**
     * Construct a new Pho facade driver.
     */
    private function __construct()
    {
        $this->initializeFacadeDriver(new PhoAssertionRecorder());
    }

    private static $instance;
}
