<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class EjerciciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ejercicios')->insert(['nombre' => 'Hang Snatch', 'n_reps' => 10, 'n_rondas' => 1, 'video' => 'https://www.youtube.com/watch?v=IucshEToDyM&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Box Jump', 'n_reps' => 10, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=52r_Ul5k03g&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Muscle Up', 'n_reps' => 3, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=OCg3UXgzftc&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Rope Climb', 'n_reps' => 3, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=Pa4QUC9AvuA&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Deadlift', 'n_reps' => 12, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=1ZXobu7JvvE&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Power Clean', 'n_reps' => 10, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=KwYJTpQ_x5A&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Clean and Jerk', 'n_reps' => 10, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=PjY1rH4_MOA&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Toes to Bar', 'n_reps' => 10, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=6dHvTlsMvNY&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Kipping', 'n_reps' => 10, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=Q8xCpvQdmUk&ab_channel=CrossFitEspa%C3%B1a']);
        DB::table('ejercicios')->insert(['nombre' => 'Pull up', 'n_reps' => 8, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=lzRo-4pq_AY&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Squat Clean', 'n_reps' => 15, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=Ty14ogq_Vok&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Split Jerk', 'n_reps' => 8, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=GUDkOtraHHY&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Hand Stand Push Up', 'n_reps' => 10, 'n_rondas' => 1, 'video' => 'https://www.youtube.com/watch?v=9wIkPCS4Mbo&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Burpees', 'n_reps' => 14, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=9wIkPCS4Mbo&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Double Unders', 'n_reps' => 20, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=82jNjDS19lg&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Single Unders', 'n_reps' => 60, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=hCuXYrTOMxI&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Thrusters', 'n_reps' => 8, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=L219ltL15zk&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Push Press', 'n_reps' => 10, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=iaBVSJm78ko&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Wall Ball', 'n_reps' => 16, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=EqjGKsiIMCE&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Wall Climb', 'n_reps' => 3, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=NK_OcHEm8yM&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Squat to target', 'n_reps' => 10, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=rMvwVtlqjTE&ab_channel=CrossFit']);
        DB::table('ejercicios')->insert(['nombre' => 'Sit up', 'n_reps' => 20, 'n_rondas' => 1, 'video' =>'https://www.youtube.com/watch?v=_HDZODOx7Zw&ab_channel=CrossFit']);
    }
}
