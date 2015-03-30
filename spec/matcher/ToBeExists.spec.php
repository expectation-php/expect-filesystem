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
});
