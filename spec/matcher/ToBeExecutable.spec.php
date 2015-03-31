<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeExecutable;

describe('ToBeExecutable', function() {
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
});
