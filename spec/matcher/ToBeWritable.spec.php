<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeWritable;

describe('ToBeWritable', function() {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeWritable();
        });
        context('when match', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0222);
            });
            it('return true', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0444); //Read only
            });
            it('return false', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::false($result);
            });
        });
    });

    describe('#reportFailed', function () {
        beforeEach(function () {
            $this->tempFile = $this->makeFile(0444);
            $this->matcher = new ToBeWritable();
            $this->message = new FailedMessage();
        });
        it('report failed message', function() {
            $this->matcher->match($this->tempFile->getPath());
            $this->matcher->reportFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempFile->getPath()}' to be writable");
        });
    });
    describe('#reportNegativeFailed', function () {
        beforeEach(function () {
            $this->tempFile = $this->makeFile(0222);
            $this->matcher = new ToBeWritable();
            $this->message = new FailedMessage();
        });
        it('report failed message', function() {
            $this->matcher->match($this->tempFile->getPath());
            $this->matcher->reportNegativeFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempFile->getPath()}' not to be writable");
        });
    });

});
