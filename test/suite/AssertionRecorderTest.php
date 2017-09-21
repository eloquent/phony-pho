<?php

declare(strict_types=1);

namespace Eloquent\Phony\Pho;

use Eloquent\Phony\Call\CallVerifierFactory;
use Eloquent\Phony\Event\EventSequence;
use PHPUnit\Framework\TestCase;

class AssertionRecorderTest extends TestCase
{
    protected function setUp()
    {
        $this->subject = new AssertionRecorder();

        $this->callVerifierFactory = CallVerifierFactory::instance();
        $this->subject->setCallVerifierFactory($this->callVerifierFactory);
    }

    public function testCreateSuccessFromEventCollection()
    {
        $events = new EventSequence([], $this->callVerifierFactory);

        $this->assertEquals($events, $this->subject->createSuccessFromEventCollection($events));
    }

    public function testCreateFailure()
    {
        $description = 'description';

        $this->expectException(AssertionException::class);
        $this->expectExceptionMessage($description);
        $this->subject->createFailure($description);
    }
}
