<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Spatie\Snapshots\MatchesSnapshots;

class ExampleTest extends TestCase
{
	use MatchesSnapshots;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

	/**
	 * get hello world
	 *
	 * @return void
	 */
	public function testGetHello()
	{
		$this->get('/hello');
		$this->assertMatchesJsonSnapshot($this->response->getContent());
    }

	/**
	 * get user id
	 *
	 * @return void
	 */
	public function testGetUser()
	{
		$this->get('/user/1');
		$this->assertMatchesSnapshot($this->response->getContent());
    }

	public function testPostComment()
	{
		$this->get('/posts/1/comments/1');
		$this->assertEquals(
			'Post Id: 1, Comment Id: 1', $this->response->getContent()
		);
    }
}
