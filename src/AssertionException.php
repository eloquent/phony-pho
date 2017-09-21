<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho;

use Eloquent\Phony\Assertion\Exception\AssertionException as PhonyAssertionException;
use pho\Exception\ExpectationException;

/**
 * Emulates Pho's expectation exception for improved assertion failure output.
 */
final class AssertionException extends ExpectationException
{
    /**
     * Construct a new Pho assertion exception.
     *
     * @param string $description The failure description.
     */
    public function __construct(string $description)
    {
        PhonyAssertionException::trim($this);

        parent::__construct($description);
    }
}
