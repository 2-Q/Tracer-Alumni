<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Continue_;

class ContinueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Student::insert([
            'continue' => 'wirausaha',
            'years' => '2020'
        ]);
        Student::insert([
            'continue' => 'wirausaha',
            'years' => '2020'
        ]);
        Student::insert([
            'continue' => 'wirausaha',
            'years' => '2020'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2020'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2020'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2020'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2021'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2021'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2021'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2021'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2021'
        ]);
        Student::insert([
            'continue' => 'bekerja',
            'years' => '2021'
        ]);
    }
}
