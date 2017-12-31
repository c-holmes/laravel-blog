<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	// Given I have two records in the db that are posts
    	// and each one is posted a month apart (Sets up the World for our test)
    	$first = factory(App\Post::class)->create();
    	$second = factory(App\Post::class)->create([
    		'created_at' => \Carbon\Carbon::now()->subMonth();
    	]);

    	// When I fetch the archives. (Performs the action)
    	Post::archives();

    	// Then the response should be in the proper format. (Creates the assurtion)
    }
}
