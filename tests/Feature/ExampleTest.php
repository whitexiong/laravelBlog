<?php

namespace Tests\Feature;

use App\Article;
use App\Tags;
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
        Article::query()->forceDelete();

        $response = $this->json('POST', '/admin/articles', [
            'title' => 'hahaha',
            'body' => '1111',
            'aaaa' => 1111,
        ]);

        dd($response);
//        $response->assertStatus(200);
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest2()
    {
        Tags::query()->forceDelete();

        $response = $this->json('POST', '/admin/tags', [
            'tag_name' => 'hahaha',
        ],[

        ]);


        dd($response);
//        $response->assertStatus(200);
    }



}
