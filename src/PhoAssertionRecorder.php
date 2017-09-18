<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho;

use Eloquent\Phony\Assertion\AssertionRecorder;
use Eloquent\Phony\Call\CallVerifierFactory;
use Eloquent\Phony\Event\EventCollection;
use Eloquent\Phony\Event\EventSequence;
use Exception;

/**
 * An assertion recorder for Pho.
 */
class PhoAssertionRecorder implements AssertionRecorder
{
    /**
     * Set the call verifier factory.
     *
     * @param CallVerifierFactory $callVerifierFactory The call verifier factory to use.
     */
    public function setCallVerifierFactory(
        CallVerifierFactory $callVerifierFactory
    ) {
        $this->callVerifierFactory = $callVerifierFactory;
    }

    /**
     * Record that a successful assertion occurred.
     *
     * @param array<Event> $events The events.
     *
     * @return EventCollection The result.
     */
    public function createSuccess(array $events = []): EventCollection
    {
        return new EventSequence($events, $this->callVerifierFactory);
    }

    /**
     * Record that a successful assertion occurred.
     *
     * @param EventCollection $events The events.
     *
     * @return EventCollection The result.
     */
    public function createSuccessFromEventCollection(
        EventCollection $events
    ): EventCollection {
        return $events;
    }

    /**
     * Create a new assertion failure exception.
     *
     * @param string $description The failure description.
     *
     * @throws Exception If this recorder throws exceptions.
     */
    public function createFailure(string $description)
    {
        throw new PhoAssertionException($description);
    }

    private static $instance;
    private $callVerifierFactory;
}
