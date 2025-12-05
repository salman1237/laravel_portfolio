import os

# Base directory 
base_dir = r"c:\Users\salman\Desktop\laravel_portfolio\resources\views\admin"

# Define templates for each entity type
templates = {
    "team-competitions": {
        "singular": "teamCompetition",
        "plural": "competitions",
        "title": "Team Competition",
        "fields": [
            {"name": "competition_name", "label": "Competition Name", "type": "text", "required": True, "placeholder": "e.g., ICPC Dhaka Regional"},
            {"name": "year", "label": "Year", "type": "number", "required": True},
            {"name": "team_name", "label": "Team Name", "type": "text"},
            {"name": "rank", "label": "Rank", "type": "text", "placeholder": "e.g., 15th, Finalist"},
            {"name": "award", "label": "Award", "type": "text", "placeholder": "e.g., Honorable Mention"},
            {"name": "order", "label": "Display Order", "type": "number", "value": 0}
        ],
        "table_columns": [
            {"field": "competition_name", "label": "Competition"},
            {"field": "year", "label": "Year"},
            {"field": "team_name", "label": "Team"},
            {"field": "rank", "label": "Rank"}
        ]
    },
    "individual-competitions": {
        "singular": "individualCompetition",
        "plural": "competitions",
        "title": "Individual Competition",
        "fields": [
            {"name": "platform", "label": "Platform", "type": "text", "required": True, "placeholder": "e.g., Codeforces, LeetCode"},
            {"name": "rating", "label": "Current Rating", "type": "number"},
            {"name": "max_rating", "label": "Max Rating", "type": "number"},
            {"name": "problems_solved", "label": "Problems Solved", "type": "number"},
            {"name": "rank", "label": "Rank/Title", "type": "text", "placeholder": "e.g., Expert, Specialist"},
            {"name": "profile_url", "label": "Profile URL", "type": "url"},
            {"name": "order", "label": "Display Order", "type": "number", "value": 0}
        ],
        "table_columns": [
            {"field": "platform", "label": "Platform"},
            {"field": "rating", "label": "Rating"},
            {"field": "problems_solved", "label": "Problems"},
            {"field": "rank", "label": "Rank"}
        ]
    },
    "online-judges": {
        "singular": "onlineJudge",
        "plural": "judges",
        "title": "Online Judge",
        "fields": [
            {"name": "platform_name", "label": "Platform Name", "type": "text", "required": True, "placeholder": "e.g., LightOJ, UVa"},
            {"name": "username", "label": "Username", "type": "text", "required": True},
            {"name": "rating", "label": "Rating", "type": "number"},
            {"name": "problems_solved", "label": "Problems Solved", "type": "number"},
            {"name": "profile_url", "label": "Profile URL", "type": "url"},
            {"name": "order", "label": "Display Order", "type": "number", "value": 0}
        ],
        "table_columns": [
            {"field": "platform_name", "label": "Platform"},
            {"field": "username", "label": "Username"},
            {"field": "problems_solved", "label": "Problems"}
        ]
    },
    "education": {
        "singular": "education",
        "plural": "education",
        "title": "Education",
        "fields": [
            {"name": "degree", "label": "Degree", "type": "text", "required": True, "placeholder": "e.g., BSc in ICT"},
            {"name": "institution", "label": "Institution", "type": "text", "required": True},
            {"name": "field_of_study", "label": "Field of Study", "type": "text"},
            {"name": "start_date", "label": "Start Date", "type": "date"},
            {"name": "end_date", "label": "End Date", "type": "date"},
            {"name": "cgpa", "label": "CGPA/Grade", "type": "text"},
            {"name": "description", "label": "Description", "type": "textarea"},
            {"name": "order", "label": "Display Order", "type": "number", "value": 0}
        ],
        "table_columns": [
            {"field": "degree", "label": "Degree"},
            {"field": "institution", "label": "Institution"},
            {"field": "start_date", "label": "Duration", "is_date_range": True}
        ]
    },
    "experiences": {
        "singular": "experience",
        "plural": "experiences",
        "title": "Experience",
        "fields": [
            {"name": "title", "label": "Job Title/Role", "type": "text", "required": True},
            {"name": "organization", "label": "Organization", "type": "text", "required": True},
            {"name": "type", "label": "Type", "type": "select", "required": True, "options": ["work", "leadership", "volunteer"]},
            {"name": "start_date", "label": "Start Date", "type": "date"},
            {"name": "end_date", "label": "End Date", "type": "date"},
            {"name": "description", "label": "Description", "type": "textarea"},
            {"name": "order", "label": "Display Order", "type": "number", "value": 0}
        ],
        "table_columns": [
            {"field": "title", "label": "Title"},
            {"field": "organization", "label": "Organization"},
            {"field": "type", "label": "Type"},
            {"field": "start_date", "label": "Duration", "is_date_range": True}
        ]
    }
}

print("Views generation template ready. Run this Python script to create all remaining admin views automatically.")
print(f"Will create views for: {', '.join(templates.keys())}")
