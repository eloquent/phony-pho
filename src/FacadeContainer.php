<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho;

use Eloquent\Phony\Facade\FacadeContainerTrait;

/**
 * A service container for Phony for Pho facades.
 */
class FacadeContainer
{
    use FacadeContainerTrait;

    public function __construct()
    {
        $this->initializeContainer(new AssertionRecorder());
    }
}
