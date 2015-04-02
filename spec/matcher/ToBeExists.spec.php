<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeExists;

describe('ToBeExists', function() {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeExists();
        });
        context('when match', function () {
            it('return true', function () {
                $result = $this->matcher->match(__DIR__ . '/../../composer.json');
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            it('return false', function () {
                $result = $this->matcher->match('not_found_composer.json');
                Assertion::false($result);
            });
        });
    });
    describe('#reportFailed', function () {
        beforeEach(function () {
            $this->tempFile = $this->makeFile();
            $this->matcher = new ToBeExists();
            $this->message = new FailedMessage();
        });
        it('report failed message', function() {
            $this->matcher->match($this->tempFile->getPath());
            $this->matcher->reportFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempFile->getPath()}' to be exists");
        });
    });
    describe('#reportNegativeFailed', function () {
        beforeEach(function () {
            $this->tempFile = $this->makeFile();
            $this->matcher = new ToBeExists();
            $this->message = new FailedMessage();
        });
        it('report failed message', function() {
            $this->matcher->match($this->tempFile->getPath());
            $this->matcher->reportNegativeFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempFile->getPath()}' not to be exists");
        });
    });
});
