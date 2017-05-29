<?php

namespace Tests\Unit\Models;

use App\User;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
	use DatabaseTransactions;

	public function setUp()
	{
		parent::setUp();
		$category = factory(Category::class)->create(['id' => 1]);
	}

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_create_event()
    {
        $user = factory(User::class)->create();
        $event = $user->events()->create([
        	'name' => 'Test Event Name',
	        'start' => \Carbon\Carbon::now(),
	        'end' => \Carbon\Carbon::now(+3),
	        'place' => 'México',
	        'description' => 'Some description',
	        'status' => 'active',
	        'category_id' => '1',
        ]);

        $this->assertDatabaseHas('events', ['id' => $event->id, 'name' => $event->name, 'user_id' => $user->id]);
    }
}
