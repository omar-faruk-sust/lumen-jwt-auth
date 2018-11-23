<?php
/**
 * Created by PhpStorm.
 * User: omarf
 * Date: 9/19/2018
 * Time: 3:39 PM
 */

use App\User;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;

class AuthTest extends TestCase
{
    use DatabaseTransactions;


    /*public function testApplication()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->get('/user');
    }*/

    /*public function loginWithFakeUser()
    {
        $user = new User([
            'id' => 1,
            'name' => 'yish'
        ]);

        $this->be($user);
    }*/


    protected $user;
    protected $password = 'testpass123';

    public function get_user()
    {
        if ($this->user) return;

        $this->user = factory(App\User::class)->create([
            'email' => 'john@example.com',
            'password' => bcrypt($this->password),
        ]);
    }

    /** @test */
    public function a_user_can_successfully_log_in()
    {
        $this->get_user();
        $this->visit(route('auth/login'));
        $this->type($this->user->email, 'email');
        $this->type($this->password, 'password');
        $this->press('Login');
        $this->seePageIs(route('dashboard'));
    }

    /** @test */
    public function a_user_receives_errors_for_wrong_login_credentials()
    {
        $this->visit(route('login'));
        $this->type($this->user->email, 'email');
        $this->type('invalid-password', 'password');
        $this->press('Login');
        $this->see('These credentials do not match our records.');
    }

    /** @test */
    public function a_user_is_redirected_to_dashboard_if_logged_in_and_tries_to_access_login_page()
    {
        $this->get_user();

        $this->actingAs($this->user);

        $this->visit(route('login'));
        $this->seePageIs(route('dashboard'));
    }

    /** @test */
    public function a_user_is_redirected_to_login_page_if_not_logged_in_and_trying_to_access_dashboard()
    {
        $this->get_user();
        $this->visit(route('dashboard'));
        $this->seePageIs(route('login'));
    }


}