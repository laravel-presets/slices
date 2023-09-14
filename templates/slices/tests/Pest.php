<?php

use @@Namespace\Feature\Authentication\User;
use @@Namespace\Feature\Authentication\UserFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Http;

use function Pest\Laravel\actingAs;

uses(LazilyRefreshDatabase::class, Tests\TestCase::class)->in(
    '../src/Feature/*/Tests/*Test.php',
    '../src/Feature/*/Tests/*/*Test.php',
);

/**
 * Creates a user and logs in.
 */
function login(): User
{
    return tap(UserFactory::new()->create(), function (User $user) {
        actingAs($user);
        request()->setUserResolver(fn () => $user);
    });
}
