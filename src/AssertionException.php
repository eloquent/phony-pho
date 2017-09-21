<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho;

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
        parent::__construct($description);

        foreach ($this->getTrace() as $call) {
            if (!isset($call['class'])) {
                continue;
            }

            if (0 !== strpos($call['class'], 'Eloquent\Phony\\')) {
                break;
            }

            if (isset($call['file']) && isset($call['line'])) {
                $this->file = $call['file'];
                $this->line = $call['line'];
            }
        }
    }
}
