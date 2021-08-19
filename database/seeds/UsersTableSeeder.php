<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'nama'      => 'Raihan Pambagyo Fadhila',
            'npm'       => '55418842',
            'password'  => bcrypt('123') 
        ]);
    }
}
