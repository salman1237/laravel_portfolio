-- ========================================
-- SALMAN AHMED - PORTFOLIO DATABASE INSERT STATEMENTS
-- ========================================
-- Run this after creating the database tables
-- Use these to populate your portfolio with your actual data

-- ========================================
-- 1. PERSONAL INFORMATION
-- ========================================

INSERT INTO `personal_infos` (`id`, `name`, `email`, `phone`, `address`, `linkedin`, `github`, `codeforces`, `photo`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'Salman Ahmed', 'salmanahmed382.jubair@gmail.com', '+880 1879246551', 'Savar, Dhaka, Bangladesh', 
'https://linkedin.com/in/salman-ahmed', 
'https://github.com/salman1237', 
'https://codeforces.com/profile/noob_guy_2033', 
NULL, 
'Competitive Programmer | Problem Solver | Software Developer. Passionate about algorithms, data structures, and building efficient solutions. Solved 1800+ programming problems across various online judges.', 
NOW(), NOW());

-- ========================================
-- 2. SKILLS
-- ========================================

INSERT INTO `skills` (`category`, `name`, `proficiency_level`, `order`, `created_at`, `updated_at`) VALUES
('Algorithms & Data Structures', 'Algorithms', 'Advanced', 1, NOW(), NOW()),
('Algorithms & Data Structures', 'Data Structures', 'Advanced', 2, NOW(), NOW()),
('Algorithms & Data Structures', 'Dynamic Programming', 'Advanced', 3, NOW(), NOW()),
('Algorithms & Data Structures', 'Graph Algorithms', 'Advanced', 4, NOW(), NOW()),
('Programming Paradigms', 'Object Oriented Programming', 'Advanced', 5, NOW(), NOW()),
('Tools & Technologies', 'Version Control System (Git)', 'Intermediate', 6, NOW(), NOW()),
('Database', 'MySQL', 'Intermediate', 7, NOW(), NOW()),
('Web Development', 'HTML, CSS, JavaScript', 'Intermediate', 8, NOW(), NOW()),
('Web Development', 'PHP', 'Intermediate', 9, NOW(), NOW());

-- ========================================
-- 3. PROGRAMMING LANGUAGES
-- ========================================

INSERT INTO `programming_languages` (`name`, `proficiency_level`, `order`, `created_at`, `updated_at`) VALUES
('C', 'Advanced', 1, NOW(), NOW()),
('C++', 'Advanced', 2, NOW(), NOW()),
('Java', 'Intermediate', 3, NOW(), NOW()),
('PHP', 'Intermediate', 4, NOW(), NOW()),
('JavaScript', 'Intermediate', 5, NOW(), NOW()),
('SQL', 'Intermediate', 6, NOW(), NOW());

-- ========================================
-- 4. PROJECTS
-- ========================================

INSERT INTO `projects` (`title`, `description`, `technologies`, `github_url`, `demo_url`, `image`, `order`, `created_at`, `updated_at`) VALUES
('Examination Application Processing System', 
'Designed and developed a web-based platform to streamline the university examination application process, including online fee payment and automated admit card generation.', 
'["HTML", "CSS", "JavaScript", "PHP", "MySQL"]', 
NULL, 
NULL, 
NULL, 
1, 
NOW(), 
NOW()),

('CPU Scheduling Algorithms Simulator', 
'Designed and developed a Java-based application to simulate CPU scheduling algorithms, including FCFS, SJF, SRTF, Round Robin, and Priority Scheduling with interactive GUI.', 
'["Java", "Java Swing", "GUI"]', 
NULL, 
NULL, 
NULL, 
2, 
NOW(), 
NOW()),

('Pig Dice Game', 
'Developed a browser-based implementation of the classic "Pig Dice Game," featuring two-player turn-based gameplay. Integrated responsive UI elements, game logic for dice rolling, score tracking, and win conditions. Emphasized clean UI/UX design and modular JavaScript code structure for maintainability and scalability.', 
'["HTML", "CSS", "JavaScript"]', 
NULL, 
NULL, 
NULL, 
3, 
NOW(), 
NOW());

-- ========================================
-- 5. TEAM COMPETITIONS
-- ========================================

INSERT INTO `team_competitions` (`competition_name`, `year`, `team_name`, `rank`, `award`, `order`, `created_at`, `updated_at`) VALUES
('ICPC Dhaka Regional Preliminary', 2024, 'JU_ErrorMakers', '267th', 'Top 10.7% (267 out of 2489 participants)', 1, NOW(), NOW()),
('ICPC Dhaka Regional Preliminary', 2023, 'JU_OneMoreZer0', '210th', 'Top 8.4% (210 out of 2479 participants)', 2, NOW(), NOW()),
('JU NCPC Preliminary', 2023, 'JU_S3', '134th', 'Top 12.1% (134 out of 1099 participants)', 3, NOW(), NOW()),
('JU NCPC Onsite', 2023, 'JU_S3', '167th', NULL, 4, NOW(), NOW()),
('Breaking Code\'23: Programming Contest by CSE, MBSTU', 2023, 'JU_Jabian_1.0', '5th', '5th Place', 5, NOW(), NOW()),
('IEEEXtreme 18.0', 2024, 'JUErrorMakers', '19th', '19th in Bangladesh Section', 6, NOW(), NOW()),
('IEEEXtreme 17.0', 2023, 'JUOneMoreZer0', '11th', '11th in Bangladesh Section', 7, NOW(), NOW());

-- ========================================
-- 6. INDIVIDUAL COMPETITIONS
-- ========================================

INSERT INTO `individual_competitions` (`platform`, `rating`, `max_rating`, `problems_solved`, `rank`, `profile_url`, `order`, `created_at`, `updated_at`) VALUES
('Codeforces', 1430, 1430, NULL, 'Specialist', 'https://codeforces.com/profile/noob_guy_2033', 1, NOW(), NOW()),
('LeetCode', 1622, 1622, NULL, 'Knight', 'https://leetcode.com/Salman_2033', 2, NOW(), NOW()),
('CodeChef', 1507, 1507, NULL, '3 Star', 'https://www.codechef.com/users/salman2033', 3, NOW(), NOW()),
('AtCoder', 349, 349, NULL, 'Gray', 'https://atcoder.jp/users/Salman2033', 4, NOW(), NOW()),
('Overall Achievement', NULL, NULL, 1800, 'Solved 1800+ problems across all platforms', NULL, 5, NOW(), NOW());

-- ========================================
-- 7. ONLINE JUDGES
-- ========================================

INSERT INTO `online_judges` (`platform_name`, `username`, `rating`, `problems_solved`, `profile_url`, `order`, `created_at`, `updated_at`) VALUES
('Codeforces', 'noob_guy_2033', 1430, NULL, 'https://codeforces.com/profile/noob_guy_2033', 1, NOW(), NOW()),
('LeetCode', 'Salman_2033', 1622, NULL, 'https://leetcode.com/Salman_2033', 2, NOW(), NOW()),
('CodeChef', 'salman2033', 1507, NULL, 'https://www.codechef.com/users/salman2033', 3, NOW(), NOW()),
('AtCoder', 'Salman2033', 349, NULL, 'https://atcoder.jp/users/Salman2033', 4, NOW(), NOW()),
('LightOJ', 'salman_2033', NULL, 68, 'https://lightoj.com/user/salman_2033', 5, NOW(), NOW()),
('VJudge', 'salman2033', NULL, 546, 'https://vjudge.net/user/salman2033', 6, NOW(), NOW());

-- ========================================
-- 8. EDUCATION
-- ========================================

INSERT INTO `education` (`degree`, `institution`, `field_of_study`, `start_date`, `end_date`, `cgpa`, `description`, `order`, `created_at`, `updated_at`) VALUES
('Bachelor of Science in Information & Communication Technology', 
'Institute of Information Technology, Jahangirnagar University', 
'Information & Communication Technology', 
'2021-11-01', 
NULL, 
NULL, 
'Currently pursuing Bachelor of Science degree in ICT from IIT, Jahangirnagar University, Savar, Dhaka, Bangladesh.', 
1, 
NOW(), 
NOW());

-- ========================================
-- 9. EXPERIENCES
-- ========================================

INSERT INTO `experiences` (`title`, `organization`, `type`, `start_date`, `end_date`, `description`, `order`, `created_at`, `updated_at`) VALUES
('CP Trainer', 
'Competitive Programming Community, IIT, Jahangirnagar University', 
'leadership', 
'2024-03-01', 
NULL, 
'Coordinate programming contests and teach competitive programming concepts including Graph algorithms, Data structures, Dynamic Programming, and other advanced topics to help students improve their problem-solving skills.', 
1, 
NOW(), 
NOW());

-- ========================================
-- VERIFICATION QUERIES
-- ========================================
-- Run these to verify the data was inserted correctly:

-- SELECT * FROM personal_infos;
-- SELECT * FROM skills ORDER BY `order`;
-- SELECT * FROM programming_languages ORDER BY `order`;
-- SELECT * FROM projects ORDER BY `order`;
-- SELECT * FROM team_competitions ORDER BY `order`;
-- SELECT * FROM individual_competitions ORDER BY `order`;
-- SELECT * FROM online_judges ORDER BY `order`;
-- SELECT * FROM education ORDER BY `order`;
-- SELECT * FROM experiences ORDER BY `order`;

-- ========================================
-- NOTES:
-- ========================================
-- 1. Update the LinkedIn URL with your actual profile
-- 2. Add GitHub URLs to projects when available
-- 3. Upload profile photo and update the 'photo' field in personal_infos
-- 4. Add project images and update the 'image' field in projects table
-- 5. Adjust dates and ratings as they change over time
-- 6. The 'id' for personal_infos is set to 1 - adjust if you have existing data
