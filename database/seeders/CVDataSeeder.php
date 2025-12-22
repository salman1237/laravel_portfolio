<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalInfo;
use App\Models\Language;
use App\Models\Certification;
use App\Models\Achievement;
use App\Models\Research;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\ProgrammingLanguage;
use App\Models\Project;

class CVDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        PersonalInfo::truncate();
        Language::truncate();
        Certification::truncate();
        Achievement::truncate();
        Research::truncate();
        Education::truncate();
        Experience::truncate();
        Skill::truncate();
        ProgrammingLanguage::truncate();
        Project::truncate();

        // Personal Info
        PersonalInfo::create([
            'name' => 'K. M. ABIR MAHMUD',
            'tagline' => 'Entrepreneur',
            'email' => 'abir.skoder@gmail.com',
            'phone' => '01750726094',
            'address' => '246/3A, Apan Angina Monihar, Bonolota Housing Society, Agargaon, Dhaka-1207',
            'bio' => 'Leading Campus365 and Skoder, our mission is to transform education through technology, harnessing my background in ICT and a passion for innovation. Our team has successfully empowered universities and startups, fostering a digital space that personalizes education and amplifies process intelligence. At Skoder, the focus is on nurturing tech innovations that drive social impact in Bangladesh, leveraging engineering design and process skills for business development.',
            'date_of_birth' => '1996-09-08',
            'website' => 'ceo.skoder.co',
            'linkedin' => 'sk-abir-271846b5',
            'github' => 'skabirgithub',
        ]);

        // Languages (Spoken)
        Language::create(['name' => 'Bengali/Bangla', 'proficiency' => 'native', 'order' => 1]);
        Language::create(['name' => 'English', 'proficiency' => 'advanced', 'order' => 2]);
        Language::create(['name' => 'Hindi', 'proficiency' => 'intermediate', 'order' => 3]);
        Language::create(['name' => 'Japanese', 'proficiency' => 'basic', 'order' => 4]);

        // Certifications & Training
        Certification::create([
            'title' => "Founder's Sprint",
            'institution' => 'INSEAD AI Venture Lab',
            'location' => 'Singapore',
            'start_date' => '2025-09-01',
            'end_date' => '2025-12-31',
            'description' => 'One of the Selected 200 top Global AI Startup Founders to join the program to build AI Startup and grow globally. It\'s a 8 week program hosted by INSEAD and Harvard Business School and supported by global top Mentors and Venture Capitalists from all over the world.',
            'order' => 1
        ]);

        Certification::create([
            'title' => 'Entrepreneurship Development Program',
            'institution' => 'SICIP, Bangladesh Bank',
            'location' => 'Dhaka, Bangladesh',
            'start_date' => '2025-11-01',
            'end_date' => '2025-12-31',
            'description' => 'One of the selected top 25 business founder in National level for each Batch on Entrepreneurship Development Program (EDP) under the Skills for Industry Competitiveness and Innovation Program (SICIP)-a project funded by the Asian Development Bank (ADB) and implemented by the Bangladesh Bank, Finance Division, Ministry of Finance',
            'order' => 2
        ]);

        Certification::create([
            'title' => 'Entrepreneurship Value System',
            'institution' => 'Innovation Design & Entrepreneur Academy (iDEA)',
            'location' => 'Dhaka, Bangladesh',
            'start_date' => '2024-01-01',
            'end_date' => '2024-04-30',
            'description' => 'One of the selected top 20 aspirant startup founder to get training on Entrepreneurship Value System by Innovation Design and Entrepreneurship Academy (iDEA) of ICT Division, Government Republic of Bangladesh.',
            'order' => 3
        ]);

        // Achievements - Entrepreneurship
        Achievement::create([
            'title' => 'National Youth Summit 2025',
            'category' => 'entrepreneurship',
            'position' => 'Winner',
            'organization' => 'National Youth Summit',
            'year' => 2025,
            'order' => 1
        ]);

        Achievement::create([
            'title' => 'Startup World Cup 2025',
            'category' => 'entrepreneurship',
            'position' => 'Regional Finalist',
            'organization' => 'Startup World Cup',
            'year' => 2025,
            'order' => 2
        ]);

        Achievement::create([
            'title' => 'JU Innovation Award 2024',
            'category' => 'entrepreneurship',
            'position' => 'Runners Up',
            'organization' => 'Jahangirnagar University',
            'year' => 2024,
            'order' => 3
        ]);

        Achievement::create([
            'title' => 'Student to Startup II',
            'category' => 'entrepreneurship',
            'position' => 'Finalist',
            'organization' => 'Student to Startup',
            'year' => 2018,
            'order' => 4
        ]);

        Achievement::create([
            'title' => 'Samsung App Contest 2018',
            'category' => 'entrepreneurship',
            'position' => 'Finalist',
            'organization' => 'Samsung',
            'year' => 2018,
            'order' => 5
        ]);

        // Achievements - Programming
        Achievement::create([
            'title' => 'ACM ICPC Dhaka Regional 2016',
            'category' => 'programming',
            'position' => 'Onsite Participant',
            'organization' => 'ACM ICPC',
            'year' => 2016,
            'order' => 6
        ]);

        Achievement::create([
            'title' => 'NCPC CUET 2017',
            'category' => 'programming',
            'position' => 'Finalist',
            'organization' => 'NCPC',
            'year' => 2017,
            'order' => 7
        ]);

        Achievement::create([
            'title' => 'DIU APP Contest 2017',
            'category' => 'programming',
            'position' => 'Runners Up',
            'organization' => 'Daffodil International University',
            'year' => 2017,
            'order' => 8
        ]);

        // Achievements - Hackathons
        Achievement::create([
            'title' => 'National Hackathon on Frontier Technologies 2020',
            'category' => 'hackathon',
            'position' => 'Runners Up',
            'organization' => 'National Hackathon',
            'year' => 2020,
            'order' => 9
        ]);

        Achievement::create([
            'title' => 'NDUB Hackathon 2017',
            'category' => 'hackathon',
            'position' => 'Champion',
            'organization' => 'Notre Dame University Bangladesh',
            'year' => 2017,
            'order' => 10
        ]);

        Achievement::create([
            'title' => 'IUT ICT FEST Hackathon 2018',
            'category' => 'hackathon',
            'position' => 'Finalist',
            'organization' => 'Islamic University of Technology',
            'year' => 2018,
            'order' => 11
        ]);

        Achievement::create([
            'title' => 'Bracathon III',
            'category' => 'hackathon',
            'position' => 'Runners Up',
            'organization' => 'BRAC',
            'year' => 2018,
            'order' => 12
        ]);

        Achievement::create([
            'title' => 'Bracathon II',
            'category' => 'hackathon',
            'position' => 'Finalist',
            'organization' => 'BRAC',
            'year' => 2017,
            'order' => 13
        ]);

        // Research & Publications
        Research::create([
            'title' => 'LEMate: An Early Prototype of an Artificial Intelligence-Powered Learner Engagement Detection System',
            'type' => 'book_chapter',
            'authors' => 'K. M. Abir Mahmud, et al.',
            'publication' => 'Springer Book Chapter',
            'description' => 'Eye Tracking, Facial Expression, Heart Rate (rppg), Mouse and Keyboard Activities and with several multimodal interaction data we have prepared a system with DiversAsia (Erusmas+ project), Jahangirnagar University,BD and Nottingham Trent University,UK',
            'order' => 1
        ]);

        Research::create([
            'title' => 'CampusMate - First Bangladeshi AI Tutor for personalized Education',
            'type' => 'other',
            'authors' => 'K. M. Abir Mahmud, et al.',
            'description' => 'AI assistant for Students to guide students towards a better career and personalized education. We have developed our own LLM with foundation model Llama3, Streamlit and Langchain',
            'order' => 2
        ]);

        Research::create([
            'title' => 'iWorksafe: Towards Healthy Workplaces During COVID-19 With an Intelligent Phealth App for Industrial Settings',
            'type' => 'journal',
            'authors' => 'K. M. Abir Mahmud, et al.',
            'publication' => 'IEEE Access',
            'description' => 'Computer Vision, AI-ML',
            'order' => 3
        ]);

        Research::create([
            'title' => 'Visual Speech Recognition: A Deep Learning and coordinate driven approach to recognize speech using lip movement through Artificial Intelligence over Image Processing',
            'type' => 'other',
            'authors' => 'K. M. Abir Mahmud, et al.',
            'description' => 'Computer Vision, AI-ML',
            'order' => 4
        ]);

        // Education
        Education::create([
            'institution' => 'Bangladesh University of Professionals',
            'degree' => 'BSc',
            'field_of_study' => 'Information and Communication Engineering',
            'start_date' => '2015-01-01',
            'end_date' => '2018-12-31',
            'description' => 'Dhaka, Bangladesh',
            'order' => 1
        ]);

        // Work Experience
        Experience::create([
            'title' => 'Chief Executive Officer',
            'organization' => 'Skoder Technologies',
            'type' => 'work',
            'start_date' => '2019-02-01',
            'end_date' => null,
            'description' => 'Dhaka, Bangladesh. Founded from the day zero and growing together. Skoder is the Tech partner for business and startup. At Skoder, we have been working with more than 50 global, local and Inhouse Enterprise Software projects.',
            'order' => 1
        ]);

        Experience::create([
            'title' => 'Machine Learning Trainer',
            'organization' => 'EDGE by ICT Division, Bangladesh',
            'type' => 'work',
            'start_date' => '2024-09-01',
            'end_date' => '2024-12-31',
            'description' => 'Jahangirnagar University. Machine Learning, Data Analytics, ML Algorithms, Python',
            'order' => 2
        ]);

        Experience::create([
            'title' => 'Visiting Lecturer',
            'organization' => 'Ahsanullah University of Science and Technology',
            'type' => 'work',
            'start_date' => '2023-08-01',
            'end_date' => '2024-02-28',
            'description' => 'Dhaka, Bangladesh. Conducted App Development with Flutter Course',
            'order' => 3
        ]);

        Experience::create([
            'title' => 'Trainer - Oracle DBMS',
            'organization' => 'OCEI - Office of the Chief Electricity Inspector',
            'type' => 'work',
            'start_date' => '2022-07-01',
            'end_date' => '2022-12-31',
            'description' => 'Bangladesh Government',
            'order' => 4
        ]);

        // Skills
        Skill::create(['category' => 'Languages and Framework', 'name' => 'Python', 'order' => 1]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'Flutter', 'order' => 2]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'Dart', 'order' => 3]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'Laravel', 'order' => 4]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'PHP', 'order' => 5]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'Java', 'order' => 6]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'MySQL', 'order' => 7]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'C++', 'order' => 8]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'C#', 'order' => 9]);
        Skill::create(['category' => 'Languages and Framework', 'name' => 'JavaScript', 'order' => 10]);

        Skill::create(['category' => 'Software Development', 'name' => 'Flutter Development', 'order' => 11]);
        Skill::create(['category' => 'Software Development', 'name' => 'Android Development', 'order' => 12]);
        Skill::create(['category' => 'Software Development', 'name' => 'Web Development', 'order' => 13]);
        Skill::create(['category' => 'Software Development', 'name' => 'Embedded System', 'order' => 14]);
        Skill::create(['category' => 'Software Development', 'name' => 'Machine Learning', 'order' => 15]);
        Skill::create(['category' => 'Software Development', 'name' => 'AI Systems', 'order' => 16]);
        Skill::create(['category' => 'Software Development', 'name' => 'Software Design', 'order' => 17]);
        Skill::create(['category' => 'Software Development', 'name' => 'Database Design', 'order' => 18]);

        Skill::create(['category' => 'Project Management', 'name' => 'Leadership', 'order' => 19]);
        Skill::create(['category' => 'Project Management', 'name' => 'Communication', 'order' => 20]);
        Skill::create(['category' => 'Project Management', 'name' => 'Collaboration', 'order' => 21]);
        Skill::create(['category' => 'Project Management', 'name' => 'System Architecture', 'order' => 22]);
        Skill::create(['category' => 'Project Management', 'name' => 'SDLC', 'order' => 23]);

        Skill::create(['category' => 'AI & ML', 'name' => 'LLM', 'order' => 24]);
        Skill::create(['category' => 'AI & ML', 'name' => 'NLP', 'order' => 25]);
        Skill::create(['category' => 'AI & ML', 'name' => 'ML Algorithms', 'order' => 26]);
        Skill::create(['category' => 'AI & ML', 'name' => 'Model Designing', 'order' => 27]);
        Skill::create(['category' => 'AI & ML', 'name' => 'AI Product Design', 'order' => 28]);

        // Projects
        Project::create([
            'title' => 'Campus365',
            'description' => 'Campus365 empowers Universities with Process Intelligence, intelligent assistant for students and API sales channel for Businesses',
            'technologies' => 'AI, Process Intelligence, API Integration',
            'order' => 1
        ]);

        Project::create([
            'title' => 'Care+',
            'description' => 'A complete healthcare solution for doctors, patients and hospitals. Care+ provides Telemedicine, ePrescriptions, Appointments Management, Bills and Payments and so on.',
            'technologies' => 'Healthcare, Telemedicine, Mobile App',
            'order' => 2
        ]);

        Project::create([
            'title' => 'Kotha',
            'description' => 'First Bengali AI powered Voice Assistant smartphone app which consists of features to control smartphone with Bengali voice Command.',
            'technologies' => 'AI, Voice Recognition, NLP, Bengali Language Processing',
            'order' => 3
        ]);

        Project::create([
            'title' => 'ConFest',
            'description' => 'A Bangladeshi Online Competition Platform where students can join and participate in various ongoing cocurricular contests to earn prizes.',
            'technologies' => 'Web Platform, Competition Management',
            'order' => 4
        ]);

        $this->command->info('CV data seeded successfully!');
    }
}
