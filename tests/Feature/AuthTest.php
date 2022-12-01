<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public const API_URL = 'http://laraprj.loc/api/v1';

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_api_url_returns_a_error_response(): void
    {
        $response = $this->get(AuthTest::API_URL);

        $response->assertStatus(404);
    }

    public function test_login_page_return_a_error_response()
    {
        $response = $this->get(AuthTest::API_URL . '/login');

        $response->assertStatus(405);

    }

    public function test_login_without_data()
    {
        $response = $this->post(AuthTest::API_URL . '/login');

        $response->assertStatus(422);
    }

    public function test_login_with_bad_email()
    {
        $response = $this->post(AuthTest::API_URL . '/login',['email'=>'email','password'=>'password']);

        $response->assertStatus(422);
    }

    public function test_login_with_bad_password()
    {
        $response = $this->post(AuthTest::API_URL . '/login',['email'=>'123@123.123','password'=>'password']);

        $response->assertStatus(422);
    }

    public function test_login_with_right_credentials()
    {
        $response = $this->post(AuthTest::API_URL . '/login',['email'=>'123@123.123','password'=>'123']);

        $response->assertStatus(200);
    }


}
