<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV - {{ $personalInfo->name ?? 'Resume' }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            line-height: 1.5;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 5px;
            color: #1a202c;
        }
        h2 {
            font-size: 16px;
            margin-top: 15px;
            margin-bottom: 8px;
            color: #2d3748;
            border-bottom: 2px solid #4a5568;
            padding-bottom: 3px;
        }
        h3 {
            font-size: 13px;
            margin-top: 8px;
            margin-bottom: 4px;
            color: #2d3748;
        }
        .contact-info {
            margin-bottom: 15px;
            font-size: 10px;
            color: #4a5568;
        }
        .contact-info span {
            margin-right: 15px;
        }
        .section {
            margin-bottom: 12px;
        }
        .skill-category {
            margin-bottom: 6px;
        }
        .skill-category strong {
            display: inline-block;
            width: 180px;
        }
        .project, .competition, .education, .experience {
            margin-bottom: 10px;
        }
        .project h3, .competition h3, .education h3, .experience h3 {
            font-size: 12px;
            margin-bottom: 2px;
        }
        .meta {
            font-size: 10px;
            color: #718096;
            margin-bottom: 3px;
        }
        .description {
            font-size: 10px;
            margin-top: 3px;
            line-height: 1.4;
        }
        ul {
            margin-left: 20px;
            margin-top: 3px;
        }
        ul li {
            margin-bottom: 2px;
            font-size: 10px;
        }
        .tech-stack {
            font-size: 9px;
            color: #4a5568;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <h1>{{ $personalInfo->name ?? 'Your Name' }}</h1>
        <div class="contact-info">
            @if($personalInfo->email ?? false)<span>{{ $personalInfo->email }}</span>@endif
            @if($personalInfo->phone ?? false)<span>{{ $personalInfo->phone }}</span>@endif
            @if($personalInfo->address ?? false)<span>{{ $personalInfo->address }}</span>@endif
            @if($personalInfo->linkedin ?? false)<span>LinkedIn: {{ str_replace(['https://', 'http://'], '', $personalInfo->linkedin) }}</span>@endif
            @if($personalInfo->github ?? false)<span>GitHub: {{ str_replace(['https://', 'http://'], '', $personalInfo->github) }}</span>@endif
        </div>

        @if($personalInfo->bio ?? false)
        <div class="section">
            <p class="description">{{ $personalInfo->bio }}</p>
        </div>
        @endif

        <!-- Education -->
        @if($education->count() > 0)
        <div class="section">
            <h2>EDUCATION</h2>
            @foreach($education as $edu)
            <div class="education">
                <h3>{{ $edu->degree }} - {{ $edu->institution }}</h3>
                <div class="meta">
                    @if($edu->field_of_study){{ $edu->field_of_study }} | @endif
                    @if($edu->start_date){{ $edu->start_date->format('M Y') }} - {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}@endif
                    @if($edu->cgpa) | CGPA: {{ $edu->cgpa }}@endif
                </div>
                @if($edu->description)
                <p class="description">{{ $edu->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @endif

        <!-- Skills -->
        @if($skills->count() > 0 || $languages->count() > 0)
        <div class="section">
            <h2>SKILLS</h2>
            @foreach($skills as $category => $categorySkills)
            <div class="skill-category">
                <strong>{{ $category }}:</strong> {{ $categorySkills->pluck('name')->join(', ') }}
            </div>
            @endforeach
            @if($languages->count() > 0)
            <div class="skill-category">
                <strong>Programming Languages:</strong> {{ $languages->pluck('name')->join(', ') }}
            </div>
            @endif
        </div>
        @endif

        <!-- Experience -->
        @if($experiences->count() > 0)
        <div class="section">
            <h2>EXPERIENCE</h2>
            @foreach($experiences as $exp)
            <div class="experience">
                <h3>{{ $exp->title }} - {{ $exp->organization }}</h3>
                <div class="meta">
                    {{ ucfirst($exp->type) }}
                    @if($exp->start_date) | {{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}@endif
                </div>
                @if($exp->description)
                <p class="description">{{ $exp->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @endif

        <!-- Projects -->
        @if($projects->count() > 0)
        <div class="section">
            <h2>PROJECTS</h2>
            @foreach($projects as $project)
            <div class="project">
                <h3>{{ $project->title }}</h3>
                @if($project->technologies)
                <div class="tech-stack">Technologies: {{ is_array($project->technologies) ? implode(', ', $project->technologies) : $project->technologies }}</div>
                @endif
                <p class="description">{{ $project->description }}</p>
                @if($project->github_url || $project->demo_url)
                <div class="meta">
                    @if($project->github_url)GitHub: {{ str_replace(['https://', 'http://'], '', $project->github_url) }}@endif
                    @if($project->demo_url) | Demo: {{ str_replace(['https://', 'http://'], '', $project->demo_url) }}@endif
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif

        <!-- Competitive Programming -->
        @if($teamCompetitions->count() > 0 || $individualCompetitions->count() > 0)
        <div class="section">
            <h2>COMPETITIVE PROGRAMMING</h2>
            
            @if($teamCompetitions->count() > 0)
            <h3>Team Competitions</h3>
            <ul>
                @foreach($teamCompetitions as $comp)
                <li>
                    <strong>{{ $comp->competition_name }} ({{ $comp->year }})</strong>
                    @if($comp->team_name) - Team: {{ $comp->team_name }}@endif
                    @if($comp->rank) - Rank: {{ $comp->rank }}@endif
                    @if($comp->award) - {{ $comp->award }}@endif
                </li>
                @endforeach
            </ul>
            @endif

            @if($individualCompetitions->count() > 0)
            <h3>Individual Achievements</h3>
            <ul>
                @foreach($individualCompetitions as $comp)
                <li>
                    <strong>{{ $comp->platform }}</strong>
                    @if($comp->rank)
                     - {{ $comp->rank }}
                    @endif
                    @if($comp->rating)
                     - Rating: {{ $comp->rating }}
                    @endif
                    @if($comp->max_rating)
                     (Max: {{ $comp->max_rating }})
                    @endif
                    @if($comp->problems_solved)
                     - {{ $comp->problems_solved }} problems solved
                    @endif
                </li>
                @endforeach
            </ul>
            @endif
        </div>
        @endif

        <!-- Online Judges -->
        @if($judges->count() > 0)
        <div class="section">
            <h2>ONLINE JUDGE PROFILES</h2>
            <ul>
                @foreach($judges as $judge)
                <li>
                    <strong>{{ $judge->platform_name }}</strong> ({{ $judge->username }})
                    @if($judge->problems_solved) - {{ $judge->problems_solved }} problems solved@endif
                    @if($judge->rating) - Rating: {{ $judge->rating }}@endif
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</body>
</html>
