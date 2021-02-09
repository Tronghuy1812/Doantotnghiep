<?php

namespace App\Console\Commands;

use App\Models\Education\Teacher;
use Illuminate\Console\Command;

class AuthTeacherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teacher:account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $teachers = Teacher::all();
        foreach ($teachers as $teacher) {
            $this->info("-- : ". $teacher->t_slug);
            \DB::table('teachers')
                ->where('id', $teacher->id)
                ->update([
                    'email'    => $teacher->t_email,
                    'password' => bcrypt('123456789')
                ]);
        }
    }
}
