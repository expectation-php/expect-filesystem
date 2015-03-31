<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeReadable;

describe('ToBeReadable', function() {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeReadable();
        });
        context('when match', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0644);
            });
            it('return true', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0222); //Write only
            });
            it('return false', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::false($result);
            });
        });
    });
});
