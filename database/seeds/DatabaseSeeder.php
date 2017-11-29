<?php

use Illuminate\Database\Seeder;

use \Carbon\Carbon;
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

            DB::table('users')->insert([
            'name' => "Generalinis direktorius",
            'email' => 'aaa@a.a',
            'password' => bcrypt('123456'),
            'depends_on'=> 1,
            'range'=> 1,
            'created_at'=> Carbon::now(),
            ]);

            DB::table('users')->insert([
            'name' => "direktorius",
            'email' => 'bbb@a.a',
            'password' => bcrypt('123456'),
            'depends_on'=> 2,
            'range'=> 2,
            'created_at'=> Carbon::now(),

            ]);
/************** Managers ******************/
            DB::table('users')->insert([
            'name' => "Eksporto vadyb",
            'email' => 'ccc@a.a',
            'password' => bcrypt('123456'),
            'depends_on'=> 3,
            'range'=> 3,
            'created_at'=> Carbon::now(),
            ]);

            DB::table('users')->insert([
            'name' => "Transporto vadyb",
            'email' => 'ddd@a.a',
            'password' => bcrypt('123456'),
            'depends_on'=> 5,
            'range'=> 3,
            'created_at'=> Carbon::now(),
            ]);

            DB::table('users')->insert([
            'name' => "Gamybos vadyb",
            'email' => 'eee@a.a',
            'password' => bcrypt('123456'),
            'depends_on'=> 4,
            'range'=> 3,
            'created_at'=> Carbon::now(),
            ]);

            DB::table('users')->insert([
            'name' => "Gamybos darbininkas",
            'email' => 'fff@a.a',
            'password' => bcrypt('123456'),
            'depends_on'=> 10,
            'range'=> 4,
            'created_at'=> Carbon::now(),
            ]);
/************* workers *************************/
            $abc = 'ABCDEFGHIJKLMNOPRSTUVYZ'; // 23

            $aa= 'AEIOUy';//6
            $bb= 'BCDFGHJKLMNPRSV';//15
           
           for ($i=0; $i<10;$i++) {

                $nums = rand(6,11); //priklausomybe nuo specialybiu
                $name = $bb[rand(0, 14)] . $aa[rand(0, 5)] . $bb[rand(0, 14)]. $aa[rand(0, 5)] .$bb[rand(0, 14)] .$aa[rand(0, 5)];         

                $email = $abc[rand(0,22)] .$abc[rand(0,22)] .$abc[rand(0,22)]. $nums .$abc[rand(0,22)].'@mail.com';

                
                DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt('123456'),
                'depends_on' => $nums,
                'range' =>4,
                'created_at'=> Carbon::now(),
                ]);
           }
//***************************** Specialybiu kurimas******************************************

                DB::table('professions')->insert([
                'position' => 'Generalinis direktorius',
                'depends_on' => 0,
                'pos_level' => 1,
                'created_at'=> Carbon::now(),
                ]);

                DB::table('professions')->insert([
                'position' => 'direktorius',
                'depends_on' => 1,
                'pos_level' => 2,
                'created_at'=> Carbon::now(),
                ]);
//*************************** **************************
                DB::table('professions')->insert([
                'position' => 'Pardavimu vadovas',
                'depends_on' => 2,
                'pos_level' => 3,
                'created_at'=> Carbon::now(),
                ]);

                DB::table('professions')->insert([
                'position' => 'gamybos vadovas',
                'depends_on' => 2,
                'pos_level' => 3,
                'created_at'=> Carbon::now(),
                ]);

                DB::table('professions')->insert([
                'position' => 'Logistikos vadovas',
                'depends_on' => 2,
                'pos_level' => 3,
                'created_at'=> Carbon::now(),
                ]);

//************************** ******************************
                DB::table('professions')->insert([
                'position' => 'Vairuotojas',
                'depends_on' => 5,
                'pos_level' => 4,
                'created_at'=> Carbon::now(),
                ]);

                DB::table('professions')->insert([
                'position' => 'Sandelininkas',
                'depends_on' => 5,
                'pos_level' => 4,
                'created_at'=> Carbon::now(),
                ]);
//*********************
                DB::table('professions')->insert([
                'position' => 'Pardavejas',
                'depends_on' => 3,
                'pos_level' => 4,
                'created_at'=> Carbon::now(),
                ]);

                DB::table('professions')->insert([
                'position' => 'kasininkas',
                'depends_on' => 3,
                'pos_level' => 4,
                'created_at'=> Carbon::now(),
                ]);
//*******************
                
                DB::table('professions')->insert([
                'position' => 'Gamybos darbuotojas',
                'depends_on' => 3,
                'pos_level' => 4,
                'created_at'=> Carbon::now(),
                ]);

                DB::table('professions')->insert([
                'position' => 'Irengimu operatorius',
                'depends_on' => 4,
                'pos_level' => 4,
                'created_at'=> Carbon::now(),
                ]);




    }
}
