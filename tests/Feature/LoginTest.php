<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    use WithoutMiddleware;
    public function a_user_can_log_in()
    {
        $response = $this->get('/post/postData');
        $response->assertStatus(200);
    }
    public function testDelete()
    {
        $arr = factory(\App\post::class)->create();
        $id=$arr->id;
        die;
        $response = $this->get('post/delete/'.$id);
        $response->assertStatus(302);
        $check =\App\post::select('*')->where('post_id','=',$id);
        $this->assertNull($check);
    }
}
