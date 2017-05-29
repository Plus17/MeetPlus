<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Jobs\SendRegistrationEmail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegisterTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_registration_email_job()
    {
        Queue::fake();

        $user = factory(User::class)->create();
        $job = (new SendRegistrationEmail($user));

        dispatch($job);

        Queue::assertPushed(SendRegistrationEmail::class, function ($job) use ($user) {
            return $job->user->id === $user->id;
        });

    }
}
