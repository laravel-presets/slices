<?php

test('debug globals should not be used')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();
