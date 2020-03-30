<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(QuestionSetSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(GrammarQuestionSeeder::class);
        $this->call(WritingPartSeeder::class);


        $exam = \App\Exam::find(1);
        $questionSets = \App\QuestionSet::all();
        $exam->sets()->attach($questionSets);
    }
}
