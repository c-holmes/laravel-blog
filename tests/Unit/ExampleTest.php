<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	// Given I have two records in the db that are posts
    	// and each one is posted a month apart (Sets up the World for our test)
    	$first = factory(Post::class)->create();
    	$second = factory(Post::class)->create([
    		'created_at' => \Carbon\Carbon::now()->subMonth()->subDay()
    	]);

    	// When I fetch the archives. (Performs the action)
    	$posts = Post::archives();

    	// Then the response should be in the proper format. (Creates the assurtion)
    	$this->assertEquals([
    		[
    			"year" => $first->created_at->format('Y'),
    			"month" => $first->created_at->format('F'),
    			"published" => 1
    		],
    		[
    			"year" => $second->created_at->format('Y'),
    			"month" => $second->created_at->format('F'),
    			"published" => 1
    		],
    	], $posts);
    }
}
