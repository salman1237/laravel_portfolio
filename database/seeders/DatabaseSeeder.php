<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\IndividualCompetition;
use App\Models\OnlineJudge;
use App\Models\PersonalInfo;
use App\Models\ProgrammingLanguage;
use App\Models\Project;
use App\Models\Skill;
use App\Models\TeamCompetition;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default user for admin panel
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('password'),
        ]);

        // Create personal info
        PersonalInfo::create([
            'name' => 'Your Name',
            'email' => 'your.email@example.com',
            'phone' => '+880 1234567890',
            'address' => 'Dhaka, Bangladesh',
            'linkedin' => 'https://linkedin.com/in/yourprofile',
            'github' => 'https://github.com/yourusername',
            'codeforces' => 'https://codeforces.com/profile/yourusername',
            'bio' => 'Passionate software developer and competitive programmer with expertise in algorithms, data structures, and full-stack development.',
        ]);

        // Create skills
        $skills = [
            ['category' => 'Algorithms & Data Structures', 'name' => 'Algorithms', 'proficiency_level' => 'Advanced', 'order' => 1],
            ['category' => 'Algorithms & Data Structures', 'name' => 'Data Structures', 'proficiency_level' => 'Advanced', 'order' => 2],
            ['category' => 'Programming Concepts', 'name' => 'Object-Oriented Programming', 'proficiency_level' => 'Advanced', 'order' => 3],
            ['category' => 'Tools & Technologies', 'name' => 'Git', 'proficiency_level' => 'Intermediate', 'order' => 4],
            ['category' => 'Tools & Technologies', 'name' => 'MySQL', 'proficiency_level' => 'Intermediate', 'order' => 5],
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Create programming languages
        $languages = [
            ['name' => 'C', 'proficiency_level' => 'Advanced', 'order' => 1],
            ['name' => 'C++', 'proficiency_level' => 'Advanced', 'order' => 2],
            ['name' => 'PHP', 'proficiency_level' => 'Intermediate', 'order' => 3],
            ['name' => 'JavaScript', 'proficiency_level' => 'Intermediate', 'order' => 4],
            ['name' => 'Java', 'proficiency_level' => 'Intermediate', 'order' => 5],
        ];
        foreach ($languages as $language) {
            ProgrammingLanguage::create($language);
        }

        // Create projects
        $projects = [
            [
                'title' => 'Examination Application Processing System',
                'description' => 'A comprehensive system for managing examination applications, processing student data, and generating reports.',
                'technologies' => ['PHP', 'Laravel', 'MySQL', 'Bootstrap'],
                'github_url' => 'https://github.com/yourusername/exam-processing',
                'order' => 1,
            ],
            [
                'title' => 'CPU Scheduling Simulator',
                'description' => 'Java GUI application simulating various CPU scheduling algorithms including FCFS, SJF, Round Robin, and Priority Scheduling.',
                'technologies' => ['Java', 'Swing', 'GUI'],
                'github_url' => 'https://github.com/yourusername/cpu-scheduler',
                'order' => 2,
            ],
            [
                'title' => 'Pig Dice Game',
                'description' => 'Interactive dice game implementation with strategic gameplay and scoring system.',
                'technologies' => ['JavaScript', 'HTML', 'CSS'],
                'github_url' => 'https://github.com/yourusername/pig-dice',
                'demo_url' => 'https://pig-dice-game.netlify.app',
                'order' => 3,
            ],
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }

        // Create team competitions
        $teamCompetitions = [
            [
                'competition_name' => 'ICPC Dhaka Regional',
                'year' => 2024,
                'team_name' => 'Team Alpha',
                'rank' => '15th',
                'award' => 'Participated',
                'order' => 1,
            ],
            [
                'competition_name' => 'NCPC (National Collegiate Programming Contest)',
                'year' => 2023,
                'team_name' => 'Code Warriors',
                'rank' => '10th',
                'award' => 'Honorable Mention',
                'order' => 2,
            ],
            [
                'competition_name' => 'IEEEXtreme Programming Competition',
                'year' => 2023,
                'team_name' => 'Byte Busters',
                'rank' => 'Top 100 Globally',
                'order' => 3,
            ],
        ];
        foreach ($teamCompetitions as $competition) {
            TeamCompetition::create($competition);
        }

        // Create individual competitions
        $individualCompetitions = [
            [
                'platform' => 'Codeforces',
                'rating' => 1542,
                'max_rating' => 1650,
                'problems_solved' => 350,
                'rank' => 'Specialist',
                'profile_url' => 'https://codeforces.com/profile/yourusername',
                'order' => 1,
            ],
            [
                'platform' => 'LeetCode',
                'rating' => 1850,
                'problems_solved' => 420,
                'rank' => 'Knight',
                'profile_url' => 'https://leetcode.com/yourusername',
                'order' => 2,
            ],
            [
                'platform' => 'CodeChef',
                'rating' => 1680,
                'problems_solved' => 280,
                'rank' => '3 Star',
                'profile_url' => 'https://codechef.com/users/yourusername',
                'order' => 3,
            ],
            [
                'platform' => 'AtCoder',
                'rating' => 920,
                'problems_solved' => 150,
                'rank' => 'Gray',
                'profile_url' => 'https://atcoder.jp/users/yourusername',
                'order' => 4,
            ],
        ];
        foreach ($individualCompetitions as $competition) {
            IndividualCompetition::create($competition);
        }

        // Create online judge profiles
        $onlineJudges = [
            [
                'platform_name' => 'LightOJ',
                'username' => 'yourusername',
                'problems_solved' => 180,
                'profile_url' => 'https://lightoj.com/user/yourusername',
                'order' => 1,
            ],
            [
                'platform_name' => 'Virtual Judge',
                'username' => 'yourusername',
                'problems_solved' => 520,
                'profile_url' => 'https://vjudge.net/user/yourusername',
                'order' => 2,
            ],
            [
                'platform_name' => 'UVa Online Judge',
                'username' => 'yourusername',
                'problems_solved' => 210,
                'profile_url' => 'https://uhunt.onlinejudge.org/id/youruserid',
                'order' => 3,
            ],
        ];
        foreach ($onlineJudges as $judge) {
            OnlineJudge::create($judge);
        }

        // Create education
        Education::create([
            'degree' => 'BSc in Information and Communication Technology',
            'institution' => 'Jahangirnagar University',
            'field_of_study' => 'Information and Communication Technology',
            'start_date' => '2020-01-01',
            'end_date' => '2024-05-31',
            'cgpa' => '3.75',
            'description' => 'Focused on algorithms, data structures, software engineering, and web development.',
            'order' => 1,
        ]);

        // Create experience
        Experience::create([
            'title' => 'Competitive Programming Trainer',
            'organization' => 'Institute of Information Technology, Jahangirnagar University',
            'type' => 'leadership',
            'start_date' => '2023-06-01',
            'end_date' => null,
            'description' => 'Training junior students in competitive programming, algorithm design, and problem-solving techniques. Organizing practice contests and mentoring teams for ICPC and other competitions.',
            'order' => 1,
        ]);
    }
}
