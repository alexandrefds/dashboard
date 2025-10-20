<?php

namespace Tests\Feature\Commands;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Tests\TestCase;

class CreateUserAdminCommandTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_it_creates_admin_user_successfully()
    {
        $userRepository = Mockery::mock(UserRepositoryInterface::class);
        $this->app->instance(UserRepositoryInterface::class, $userRepository);

        Validator::shouldReceive('make')
            ->once()
            ->andReturn(new class {
                public function fails() {
                    return false;
                }
                public function errors() {
                    return collect();
                }
            });

        $userRepository->shouldReceive('store')
            ->once()
            ->with(Mockery::on(function ($data) {
                return $data['name'] === 'Alex'
                    && $data['email'] === 'alex@example.com'
                    && $data['password'] === 'supersecret';
            }));

        $this->artisan('admin:create-user')
            ->expectsOutput('Creating a new admin user...')
            ->expectsQuestion('Insert admin name:', 'Alex')
            ->expectsQuestion('Insert admin admin', 'alex@example.com')
            ->expectsQuestion('Insert admin password', 'supersecret')
            ->expectsOutput('Admin created if success!')
            ->assertExitCode(0);
    }

    public function test_it_fails_when_validation_fails()
    {
        $userRepository = Mockery::mock(UserRepositoryInterface::class);
        $this->app->instance(UserRepositoryInterface::class, $userRepository);

        Validator::shouldReceive('make')
            ->once()
            ->andReturn(new class {
                public function fails() {
                    return true;
                }
                public function errors() {
                    return new class {
                        public function all() {
                            return ['Invalid email address'];
                        }
                    };
                }
            });

        $userRepository->shouldNotReceive('store');

        $this->artisan('admin:create-user')
            ->expectsOutput('Creating a new admin user...')
            ->expectsQuestion('Insert admin name:', '')
            ->expectsQuestion('Insert admin admin', 'invalid-email')
            ->expectsQuestion('Insert admin password', 'short')
            ->expectsOutput('Validators errors:')
            ->expectsOutput('- Invalid email address')
            ->assertExitCode(1);
    }
}
