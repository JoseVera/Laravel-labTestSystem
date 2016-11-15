<?php

use Illuminate\Database\Seeder;

use App\Test;
use App\Report;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('TestTableSeeder');
        $this->call('ReportTableSeeder');

    }


}


class TestTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('tests')->delete();

		Test::create([
			'name'=>'blood test',
			'result'=>'look great',
			'create_date'=>date('Y-m-d'),	
			'reports_id'=>'1'
			]);

		Test::create([
			'name'=>'Presure test',
			'result'=>'look great',
			'create_date'=>date('Y-m-d'),	
			'reports_id'=>'1'
			]);

		Test::create([
			'name'=>'X Rays ',
			'result'=>'look great',
			'create_date'=>date('Y-m-d'),	
			'reports_id'=>'1'
			]);

		Test::create([
			'name'=>'blood test',
			'result'=>'look no so good',
			'create_date'=>date('Y-m-d'),	
			'reports_id'=>'1'
			]);
	}

}


class ReportTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('reports')->delete();

		Report::create([
			'name'=>'intervention december 2016',
			'create_date'=>date('Y-m-d'),	
			'users_id'=>'1'
			]);

		Report::create([
			'name'=>'intervention jan 2017',
			'create_date'=>date('Y-m-d'),	
			'users_id'=>'2'
			]);

		
	}

}
