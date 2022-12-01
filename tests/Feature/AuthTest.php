<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public const API_BASE_URL = 'http://laraprj.loc/api/v1';
    public const API_URL_LOGIN = self::API_BASE_URL . '/login';

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetApiBaseUrlReturnsError(): void
    {
        $response = $this->get(AuthTest::API_BASE_URL);
        $response->assertStatus(404);
    }

    public function testLoginGetMethodReturnError()
    {
        $response = $this->get(AuthTest::API_URL_LOGIN);
        $response->assertStatus(405);
    }

    public function testLoginWithoutData()
    {
        $response = $this->post(AuthTest::API_URL_LOGIN);
        $response
            ->assertStatus(422)
            ->assertJsonStructure(
                [
                    'status',
                    'message',
                    'data',
                ])
            ->assertJson(['status' => false])
            ->assertJsonStructure(['data' => ['email']])
            ->assertJsonStructure(['data' => ['password']]);

//        $content = json_decode($response->getContent(), true);
////        dd($content);
//        $this->assertIsArray($content);
//        dd($content);
//        $this->assertArrayHasKey('status', $content);
//        $this->assertArrayHasKey('data.email');
    }

    public function testLoginWithBadEmail()
    {
        $response = $this->post(AuthTest::API_URL_LOGIN, ['email' => 'email', 'password' => 'password'])
            ->assertStatus(422)
            ->assertJson(['status' => false])
            ->assertJsonStructure(['data' => ['email']]);
    }

    public function testLoginWithBadPassword()
    {
        $response = $this->post(AuthTest::API_URL_LOGIN, ['email' => '123@123.123', 'password' => 'password'])
            ->assertStatus(401)
            ->assertJson(['status' => false])
            ->assertJsonStructure(['data']);
    }

    public function testLoginWithRightCredentials()
    {
        $response = $this->post(AuthTest::API_URL_LOGIN, ['email' => '123@123.123', 'password' => '123'])
            ->assertStatus(200)
            ->assertJson(['status' => true])
            ->assertJsonStructure(['data' => ['token']])
            ->assertJsonStructure(['data' => ['user']]);;
    }


}
