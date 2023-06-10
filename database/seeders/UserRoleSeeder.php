<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $roles = [
        [
            'name' => 'admin',
            'label' => 'Admin'
        ],
        [
            'name' => 'user',
            'label' => 'User'
        ],
    ];

    public function run()
    {
        foreach ($this->roles as $value) {
            if (!Role::where('name', $value['name'])->exists()) {
                Role::create($value);
            }
        }
    }
}
