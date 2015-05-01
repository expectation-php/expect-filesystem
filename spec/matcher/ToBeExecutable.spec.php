<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeExecutable;

describe(ToBeExecutable::class, function () {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeExecutable();
        });
        context('when match', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0755);
            });
            it('return true', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0444);
            });
            it('return false', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::false($result);
            });
        });
    });
    describe('#reportFailed', function () {
        beforeEach(function () {
            $this->tempFile = $this->makeFile(0644);
            $this->matcher = new ToBeExecutable();
            $this->message = new FailedMessage();
        });
        it('report failed message', function () {
            $this->matcher->match($this->tempFile->getPath());
            $this->matcher->reportFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempFile->getPath()}' to be executable");
        });
    });
    describe('#reportNegativeFailed', function () {
        beforeEach(function () {
            $this->tempFile = $this->makeFile();
            $this->matcher = new ToBeExecutable();
            $this->message = new FailedMessage();
        });
        it('report failed message', function () {
            $this->matcher->match($this->tempFile->getPath());
            $this->matcher->reportNegativeFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempFile->getPath()}' not to be executable");
        });
    });
});
