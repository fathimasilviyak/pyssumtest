<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Branch::create([
            'name' => 'Pyssum',
            'location' => 'Puraniya',
            'address' => '537/8, Puraniya, Sitapur Road, Lucknow - 226020 (UP)  India'
        ]);

    }
}
