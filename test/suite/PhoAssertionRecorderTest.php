<?php

namespace Eloquent\Phony\Pho;

use Eloquent\Phony\Call\CallVerifierFactory;
use Eloquent\Phony\Event\EventSequence;
use PHPUnit\Framework\TestCase;

class PhoAssertionRecorderTest extends TestCase
{
    protected function setUp()
    {
        $this->subject = new PhoAssertionRecorder();

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

        $this->expectException(PhoAssertionException::class);
        $this->expectExceptionMessage($description);
        $this->subject->createFailure($description);
    }
}
