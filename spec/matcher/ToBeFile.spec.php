<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeFile;

describe('ToBeFile', function () {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeFile();
            $this->tempFile = $this->makeFile();
            $this->tempDirectory = $this->makeDirectory();
        });
        context('when match', function () {
            it('return true', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            it('return false', function () {
                $result = $this->matcher->match($this->tempDirectory->getPath());
                Assertion::false($result);
            });
        });
    });
    describe('#reportFailed', function () {
        beforeEach(function () {
            $this->tempDirectory = $this->makeDirectory();
            $this->matcher = new ToBeFile();
            $this->message = new FailedMessage();
        });
        it('report failed message', function () {
            $this->matcher->match($this->tempDirectory->getPath());
            $this->matcher->reportFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempDirectory->getPath()}' to be file");
        });
    });
    describe('#reportNegativeFailed', function () {
        beforeEach(function () {
            $this->tempFile = $this->makeFile();
            $this->matcher = new ToBeFile();
            $this->message = new FailedMessage();
        });
        it('report failed message', function () {
            $this->matcher->match($this->tempFile->getPath());
            $this->matcher->reportNegativeFailed($this->message);
            Assertion::same((string) $this->message, "Expected '{$this->tempFile->getPath()}' not to be file");
        });
    });
});
