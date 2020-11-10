<?php

namespace App\Console\Commands\Data;

use App\Models\Category;
use App\Models\Education\Course;
use App\Models\Education\SeoEdutcation;
use App\Models\Education\Teacher;
use App\Service\Seo\RenderUrlSeoCourseService;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SeederCourseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:course';
    protected $teachers;
    protected $categories;
    protected $path;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeder course command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setCategory();
        $this->setTeacher();
        $this->setPath();
    }

    protected function setCategory()
    {
        $this->categories = Category::pluck('id')->toArray();
    }

    protected function setTeacher()
    {
        $this->teachers = Teacher::pluck('id')->toArray();
    }

    protected function setPath()
    {
        $this->path = $path = public_path() . '/uploads/' . date('Y/m/d');
        if (!\File::exists($this->path)) mkdir($this->path, 0777, true);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Factory::create();
        $this->warn("[init: course ]");
//        DELETE FROM `courses` WHERE id > 61

        for ($i = 1; $i <= 10000; $i++) {
            try {
                $avatar = $faker->image($this->path, 265, 160, null, false);
                rename($this->path . '/' . $avatar, $this->path . '/' . date('Y-m-d') . "__" . $avatar);
                $newAvatar = date('Y-m-d') . "__" . $avatar;

                $name = $faker->name;
                $this->info("-- [Name] " . $name . " I = " . $i);
                $data = [
                    'c_name'            => $name,
                    'c_slug'            => Str::slug($name),
                    'c_total_time'      => rand(3, 30),
                    'c_avatar'          => $newAvatar,
                    'c_price'           => $faker->randomNumber(6),
                    'c_title_seo'       => $name,
                    'c_description_seo' => $faker->name,
                    'c_teacher_id'      => array_rand($this->teachers, 1),
                    'c_category_id'     => array_rand($this->categories, 1),
                    'created_at'        => Carbon::now()
                ];

                $courseID = Course::insertGetId($data);
                if ($courseID) {
                    RenderUrlSeoCourseService::init(Str::slug($name), SeoEdutcation::TYPE_COURSE, $courseID);
                }

                $this->warn("-- [Success] ID = " . $courseID);
            } catch (\Exception $exception) {
//                Log::error("[Error] : " . $name);
//                $this->warn("-- [Error] Name = " . $name);
            }
        }

        $this->info("-- [Done] -- ");
    }
}
