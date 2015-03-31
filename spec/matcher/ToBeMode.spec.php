<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeMode;

describe('ToBeMode', function() {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeMode(0644);
            $this->tempFile644 = $this->makeFile(0644);
            $this->tempFile755 = $this->makeFile(0755);
        });
        context('when match', function () {
            it('return true', function () {
                $result = $this->matcher->match($this->tempFile644->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            it('return false', function () {
                $result = $this->matcher->match($this->tempFile755->getPath());
                Assertion::false($result);
            });
        });
    });
});
