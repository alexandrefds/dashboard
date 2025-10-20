<?php

namespace App\Console\Commands;

use App\Http\Requests\CreateAdminRequest;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateUserAdminCommand extends Command
{
    protected $signature = 'admin:create-user';

    protected $description = 'Command to create an user admin.';

    public function __construct(
        readonly private UserRepositoryInterface $userRepository
    )
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Creating a new admin user...');

        $data = [
            'name' => $this->ask('Insert admin name:'),
            'email' => $this->ask('Insert admin admin'),
            'password' => $this->secret('Insert admin password'),
        ];

        $rules = (new CreateAdminRequest())->rules();
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->error('Validators errors:');
            foreach ($validator->errors()->all() as $error) {
                $this->line("- {$error}");
            }
            return Command::FAILURE;
        }

        $this->userRepository->store($data);

        $this->info('Admin created if success!');

        return Command::SUCCESS;
    }
}
