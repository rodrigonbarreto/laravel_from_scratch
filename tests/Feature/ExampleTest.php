<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Post;

class ExampleTest extends TestCase
{

    // this restore database
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/')->assertSee('The Bulma Blog');

        $response->assertStatus(200);
    }

    /**
     *
     * @dataProvider  listActionDataProvider
     * @param array   $expectArchives
     */
    public function testArchives($expectArchives)
    {
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create(['created_at' =>  Carbon::now()->subMonth()]);
        $posts = Post::archives();
        $this->assertCount(2, $posts);
        $this->assertEquals($expectArchives, $posts);
    }

    /**
     * @return array
     */
    public function listActionDataProvider()
    {
        return [
            'list of archives' => [
                'data' => [
                    [
                        "year" => '2017',
                        "month" => Carbon::now()->subMonth()->format('F'),
                        "published" => 1,
                    ],
                    [
                        "year" => '2017',
                        "month" => Carbon::now()->format('F'),
                        "published" => 1,
                    ]
                ],
            ],
        ];
    }
}
