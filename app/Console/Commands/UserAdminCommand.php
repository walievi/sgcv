<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unlock admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::withTrashed()
            ->where('name', 'admin')
            ->firstOrNew();
        $user->name       = 'admin';
        $user->email      = 'admin@admin.com';
        $user->password   = Hash::make('admin');
        $user->deleted_at = null;
        $user->save();

        $this->info('User created successfully!');
        return 0;
    }
}
