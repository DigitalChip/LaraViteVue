<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Database\Factories\UserFactory;
use Str;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public const API_BASE_URL = 'http://laraprj.loc/api/v1';
    public const API_URL_LOGIN = self::API_BASE_URL . '/login';
    public const API_URL_REGISTER = self::API_BASE_URL . '/register';

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
            ->assertJsonStructure(['data' => ['user']]);
    }

    public function testRegisterWithoutData()
    {
        $response = $this->post(AuthTest::API_URL_REGISTER);
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
    }

    public function testRegisterWithBadName()
    {
        $response = $this->post(AuthTest::API_URL_REGISTER, ['name'=>'','email' => 'email', 'password' => 'password', 'password_confirmation' => 'password'])
            ->assertStatus(422)
            ->assertJson(['status' => false])
            ->assertJsonStructure(['data' => ['name']]);
    }

    public function testRegisterWithBadEmail()
    {
        $response = $this->post(AuthTest::API_URL_REGISTER, ['name'=>'name','email' => 'email', 'password' => 'password', 'password_confirmation' => 'password'])
            ->assertStatus(422)
            ->assertJson(['status' => false])
            ->assertJsonStructure(['data' => ['email']]);
    }

    public function testRegisterWithBadPassword()
    {
        $response = $this->post(AuthTest::API_URL_REGISTER, ['name'=>'name','email' => 'email@email.com', 'password' => 'p', 'password_confirmation' => '1'])
            ->assertStatus(422)
            ->assertJson(['status' => false])
            ->assertJsonStructure(['data' => ['password']]);
    }

    public function testRegisterWithBadPasswordConfirmation()
    {
        $response = $this->post(AuthTest::API_URL_REGISTER, ['name'=>'name','email' => 'email@email.com', 'password' => 'password', 'password_confirmation' => '1'])
            ->assertStatus(422)
            ->assertJson(['status' => false])
            ->assertJsonStructure(['data' => ['password']]);
    }

    public function testRegisterWithRightCredentials()
    {
        $user = [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password_confirmation' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];

        $response = $this->post(AuthTest::API_URL_REGISTER, $user)
            ->assertStatus(200)
            ->assertJson(['status' => true])
            ->assertJsonStructure(['data' => ['token']])
            ->assertJsonStructure(['data' => ['user']]);
    }



}
