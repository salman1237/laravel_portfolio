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
            font-family: 'DejaVu Serif', 'Times New Roman', serif;
            font-size: 10.5pt;
            line-height: 1.2;
            color: #000;
            padding: 36pt 50pt 36pt 50pt;
        }
        .header {
            text-align: center;
            margin-bottom: 15pt;
        }
        .header h1 {
            font-size: 20pt;
            font-weight: bold;
            margin-bottom: 8pt;
        }
        .contact-info {
            font-size: 9.5pt;
            line-height: 1.5;
        }
        .contact-info a {
            color: #0066cc;
            text-decoration: none;
        }
        .section-title {
            font-size: 11pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 14pt;
            margin-bottom: 5pt;
            border-bottom: 1pt solid #000;
            padding-bottom: 2pt;
        }
        .entry {
            margin-bottom: 10pt;
        }
        .entry-header {
            display: table;
            width: 100%;
            margin-bottom: 2pt;
        }
        .entry-left {
            display: table-cell;
            font-weight: bold;
            width: 68%;
        }
        .entry-right {
            display: table-cell;
            text-align: right;
            width: 32%;
            font-size: 9.5pt;
            padding-right: 0;
        }
        .entry-subtitle {
            display: table;
            width: 100%;
            font-style: italic;
            font-size: 10pt;
            margin-bottom: 4pt;
        }
        .subtitle-left {
            display: table-cell;
            width: 68%;
        }
        .subtitle-right {
            display: table-cell;
            text-align: right;
            width: 32%;
            padding-right: 0;
        }
        ul {
            margin-top: 3pt;
            margin-left: 18pt;
            margin-bottom: 0;
        }
        ul li {
            margin-bottom: 3pt;
            line-height: 1.3;
            font-size: 10pt;
        }
        .tech-line {
            font-size: 9.5pt;
            margin-top: 3pt;
        }
        .tech-line strong {
            font-weight: bold;
        }
        .skill-category {
            margin-bottom: 4pt;
            font-size: 10pt;
            line-height: 1.25;
        }
        .skill-category strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>{{ $personalInfo->name ?? 'YOUR NAME' }}</h1>
        <div class="contact-info">
            @if($personalInfo->address ?? false){{ $personalInfo->address }} |@endif
            @if($personalInfo->phone ?? false) {{ $personalInfo->phone }} |@endif
            @if($personalInfo->email ?? false) <a href="mailto:{{ $personalInfo->email }}">{{ $personalInfo->email }}</a>@endif<br>
            @if($personalInfo->linkedin ?? false)<a href="{{ $personalInfo->linkedin }}">LinkedIn</a> |@endif
            @if($personalInfo->github ?? false) <a href="{{ $personalInfo->github }}">GitHub</a>@endif
            @if($personalInfo->website ?? false) | <a href="{{ $personalInfo->website }}">Portfolio</a>@endif
        </div>
    </div>

    <!-- Education -->
    @if($education->count() > 0)
    <div class="section-title">EDUCATION</div>
    @foreach($education as $edu)
    <div class="entry">
        <div class="entry-header">
            <div class="entry-left">{{ $edu->institution }}</div>
            <div class="entry-right">
                @if($edu->start_date){{ $edu->start_date->format('M Y') }} – {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}@endif
            </div>
        </div>
        <div class="entry-subtitle">
            <div class="subtitle-left">{{ $edu->degree }}@if($edu->field_of_study), {{ $edu->field_of_study }}@endif</div>
            <div class="subtitle-right">@if($edu->cgpa)GPA: {{ $edu->cgpa }}@endif</div>
        </div>
        @if($edu->description)
        <div style="font-size: 9.5pt; margin-top: 2pt;">{{ $edu->description }}</div>
        @endif
    </div>
    @endforeach
    @endif

    <!-- Experience -->
    @if($experiences->count() > 0)
    <div class="section-title">EXPERIENCE</div>
    @foreach($experiences as $exp)
    <div class="entry">
        <div class="entry-header">
            <div class="entry-left">{{ $exp->organization }}</div>
            <div class="entry-right">
                @if($exp->start_date){{ $exp->start_date->format('M Y') }} – {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}@endif
            </div>
        </div>
        <div class="entry-subtitle">
            <div class="subtitle-left">{{ $exp->title }}</div>
            <div class="subtitle-right"></div>
        </div>
        @if($exp->description)
        <ul>
            @foreach(explode("\n", $exp->description) as $point)
                @if(trim($point))
                <li>{{ trim($point) }}</li>
                @endif
            @endforeach
        </ul>
        @endif
    </div>
    @endforeach
    @endif

    <!-- Projects -->
    @if($projects->count() > 0)
    <div class="section-title">PROJECTS</div>
    @foreach($projects as $project)
    <div class="entry">
        <div class="entry-header">
            <div class="entry-left">
                {{ $project->title }}
                @if($project->github_url) | <a href="{{ $project->github_url }}" style="font-weight: normal; font-size: 9pt;">GitHub</a>@endif
                @if($project->demo_url) <a href="{{ $project->demo_url }}" style="font-weight: normal; font-size: 9pt;">Demo</a>@endif
            </div>
            <div class="entry-right"></div>
        </div>
        @if($project->description)
        <ul>
            @foreach(explode("\n", $project->description) as $point)
                @if(trim($point))
                <li>{{ trim($point) }}</li>
                @endif
            @endforeach
        </ul>
        @endif
        @if($project->technologies)
        <div class="tech-line">
            <strong>Technologies:</strong> {{ is_array($project->technologies) ? implode(', ', $project->technologies) : $project->technologies }}
        </div>
        @endif
    </div>
    @endforeach
    @endif

    <!-- Achievements -->
    @if($achievements->count() > 0)
    <div class="section-title">ACHIEVEMENTS & AWARDS</div>
    @foreach($achievements as $achievement)
    <div class="entry">
        <div class="entry-header">
            <div class="entry-left">{{ $achievement->title }}@if($achievement->position) – {{ $achievement->position }}@endif</div>
            <div class="entry-right">{{ $achievement->year }}</div>
        </div>
        <div style="font-size: 9.5pt; font-style: italic; margin-bottom: 2pt;">{{ $achievement->organization }}</div>
        @if($achievement->description)
        <div style="font-size: 9.5pt;">{{ $achievement->description }}</div>
        @endif
    </div>
    @endforeach
    @endif

    <!-- Research & Publications -->
    @if($research->count() > 0)
    <div class="section-title">RESEARCH & PUBLICATIONS</div>
    @foreach($research as $paper)
    <div class="entry">
        <div class="entry-header">
            <div class="entry-left">
                {{ $paper->title }}
                @if($paper->url) | <a href="{{ $paper->url }}" style="font-weight: normal; font-size: 9pt;">Link</a>@endif
            </div>
            <div class="entry-right">
                @if($paper->published_date){{ $paper->published_date->format('M Y') }}@endif
            </div>
        </div>
        <div style="font-size: 9.5pt; margin-bottom: 2pt;">{{ $paper->authors }}</div>
        @if($paper->publication)
        <div style="font-size: 9.5pt; font-style: italic; margin-bottom: 2pt;">{{ $paper->publication }}</div>
        @endif
        @if($paper->description)
        <div style="font-size: 9.5pt;">{{ $paper->description }}</div>
        @endif
    </div>
    @endforeach
    @endif

    <!-- Skills -->
    @if($skills->count() > 0 || $languages->count() > 0)
    <div class="section-title">TECHNICAL SKILLS</div>
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
    @endif

    <!-- Certifications -->
    @if($certifications->count() > 0)
    <div class="section-title">CERTIFICATIONS</div>
    @foreach($certifications as $cert)
    <div class="entry">
        <div class="entry-header">
            <div class="entry-left">{{ $cert->title }}</div>
            <div class="entry-right">
                @if($cert->start_date)
                    {{ $cert->start_date->format('M Y') }}
                    @if($cert->end_date) – {{ $cert->end_date->format('M Y') }}@endif
                @endif
            </div>
        </div>
        <div style="font-size: 9.5pt; font-style: italic;">{{ $cert->institution }}</div>
    </div>
    @endforeach
    @endif

    <!-- Languages -->
    @if($spokenLanguages->count() > 0)
    <div class="section-title">LANGUAGES</div>
    <div class="skill-category">
        @foreach($spokenLanguages as $lang)
            <strong>{{ $lang->name }}:</strong> {{ ucfirst($lang->proficiency) }}@if(!$loop->last), @endif
        @endforeach
    </div>
    @endif
</body>
</html>
