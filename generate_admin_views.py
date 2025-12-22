"""
Admin Views Generator for Laravel Portfolio
Generates index, create, and edit views for all new modules
"""

import os

# Base directory
base_dir = r"c:\Users\salman\Desktop\laravel_portfolio\resources\views\admin"

# Module configurations
modules = {
    'languages': {
        'singular': 'Language',
        'plural': 'Languages',
        'fields': [
            {'name': 'name', 'label': 'Language Name', 'type': 'text', 'required': True},
            {'name': 'proficiency', 'label': 'Proficiency Level', 'type': 'select', 'required': True,
             'options': ['basic', 'intermediate', 'advanced', 'native']},
            {'name': 'order', 'label': 'Display Order', 'type': 'number', 'required': False},
        ],
        'table_columns': ['Language', 'Proficiency', 'Order']
    },
    'certifications': {
        'singular': 'Certification',
        'plural': 'Certifications',
        'fields': [
            {'name': 'title', 'label': 'Title', 'type': 'text', 'required': True},
            {'name': 'institution', 'label': 'Institution', 'type': 'text', 'required': True},
            {'name': 'location', 'label': 'Location', 'type': 'text', 'required': False},
            {'name': 'start_date', 'label': 'Start Date', 'type': 'date', 'required': True},
            {'name': 'end_date', 'label': 'End Date', 'type': 'date', 'required': False},
            {'name': 'description', 'label': 'Description', 'type': 'textarea', 'required': False},
            {'name': 'credential_url', 'label': 'Credential URL', 'type': 'url', 'required': False},
            {'name': 'order', 'label': 'Display Order', 'type': 'number', 'required': False},
        ],
        'table_columns': ['Title', 'Institution', 'Date Range', 'Order']
    },
    'achievements': {
        'singular': 'Achievement',
        'plural': 'Achievements',
        'fields': [
            {'name': 'title', 'label': 'Title', 'type': 'text', 'required': True},
            {'name': 'category', 'label': 'Category', 'type': 'select', 'required': True,
             'options': ['entrepreneurship', 'programming', 'hackathon', 'other']},
            {'name': 'position', 'label': 'Position/Rank', 'type': 'text', 'required': False},
            {'name': 'organization', 'label': 'Organization', 'type': 'text', 'required': True},
            {'name': 'year', 'label': 'Year', 'type': 'number', 'required': True},
            {'name': 'description', 'label': 'Description', 'type': 'textarea', 'required': False},
            {'name': 'order', 'label': 'Display Order', 'type': 'number', 'required': False},
        ],
        'table_columns': ['Title', 'Category', 'Position', 'Year', 'Order']
    },
    'research': {
        'singular': 'Research',
        'plural': 'Research',
        'fields': [
            {'name': 'title', 'label': 'Title', 'type': 'textarea', 'required': True},
            {'name': 'type', 'label': 'Publication Type', 'type': 'select', 'required': True,
             'options': ['journal', 'conference', 'book_chapter', 'patent', 'other']},
            {'name': 'authors', 'label': 'Authors', 'type': 'textarea', 'required': True},
            {'name': 'publication', 'label': 'Publication/Venue', 'type': 'text', 'required': False},
            {'name': 'published_date', 'label': 'Published Date', 'type': 'date', 'required': False},
            {'name': 'url', 'label': 'URL', 'type': 'url', 'required': False},
            {'name': 'description', 'label': 'Abstract/Description', 'type': 'textarea', 'required': False},
            {'name': 'order', 'label': 'Display Order', 'type': 'number', 'required': False},
        ],
        'table_columns': ['Title', 'Type', 'Publication', 'Order']
    }
}

def generate_create_view(module_name, config):
    """Generate create.blade.php"""
    singular = config['singular']
    fields = config['fields']
    
    form_fields = []
    for field in fields:
        req = 'required' if field['required'] else ''
        
        if field['type'] == 'select':
            options_html = '\n'.join([
                f"                            <option value=\"{opt}\" {{{{ old('{field['name']}') == '{opt}' ? 'selected' : '' }}}}>{opt.replace('_', ' ').title()}</option>"
                for opt in field['options']
            ])
            form_fields.append(f"""
        <div>
            <label for="{field['name']}" class="block text-sm font-medium text-gray-700">{field['label']}</label>
            <select id="{field['name']}" name="{field['name']}" {req} class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Select {field['label']}</option>
{options_html}
            </select>
        </div>""")
        elif field['type'] == 'textarea':
            form_fields.append(f"""
        <div>
            <label for="{field['name']}" class="block text-sm font-medium text-gray-700">{field['label']}</label>
            <textarea id="{field['name']}" name="{field['name']}" rows="4" {req} class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{{{ old('{field['name']}') }}}}</textarea>
        </div>""")
        else:
            input_type = field['type']
            form_fields.append(f"""
        <div>
            <label for="{field['name']}" class="block text-sm font-medium text-gray-700">{field['label']}</label>
            <input type="{input_type}" id="{field['name']}" name="{field['name']}" value="{{{{ old('{field['name']}') }}}}" {req} class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>""")
    
    return f"""@extends('admin.layouts.app')

@section('page-title', 'Add {singular}')

@section('content')
<div class="px-4 sm:px-0">
    <form action="{{{{ route('admin.{module_name}.store') }}}}" method="POST" class="space-y-6 bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
{''.join(form_fields)}
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <a href="{{{{ route('admin.{module_name}.index') }}}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@endsection
"""

def generate_edit_view(module_name, config):
    """Generate edit.blade.php"""
    singular = config['singular']
    singular_lower = singular.lower()
    fields = config['fields']
    
    form_fields = []
    for field in fields:
        req = 'required' if field['required'] else ''
        
        if field['type'] == 'select':
            options_html = '\n'.join([
                f"                            <option value=\"{opt}\" {{{{ old('{field['name']}', ${singular_lower}->{field['name']}) == '{opt}' ? 'selected' : '' }}}}>{opt.replace('_', ' ').title()}</option>"
                for opt in field['options']
            ])
            form_fields.append(f"""
        <div>
            <label for="{field['name']}" class="block text-sm font-medium text-gray-700">{field['label']}</label>
            <select id="{field['name']}" name="{field['name']}" {req} class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Select {field['label']}</option>
{options_html}
            </select>
        </div>""")
        elif field['type'] == 'textarea':
            form_fields.append(f"""
        <div>
            <label for="{field['name']}" class="block text-sm font-medium text-gray-700">{field['label']}</label>
            <textarea id="{field['name']}" name="{field['name']}" rows="4" {req} class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{{{ old('{field['name']}', ${singular_lower}->{field['name']}) }}}}</textarea>
        </div>""")
        else:
            input_type = field['type']
            form_fields.append(f"""
        <div>
            <label for="{field['name']}" class="block text-sm font-medium text-gray-700">{field['label']}</label>
            <input type="{input_type}" id="{field['name']}" name="{field['name']}" value="{{{{ old('{field['name']}', ${singular_lower}->{field['name']}) }}}}" {req} class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>""")
    
    return f"""@extends('admin.layouts.app')

@section('page-title', 'Edit {singular}')

@section('content')
<div class="px-4 sm:px-0">
    <form action="{{{{ route('admin.{module_name}.update', ${singular_lower}) }}}}" method="POST" class="space-y-6 bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        @method('PUT')
        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
{''.join(form_fields)}
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <a href="{{{{ route('admin.{module_name}.index') }}}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>
</div>
@endsection
"""

# Generate all views
for module_name, config in modules.items():
    module_dir = os.path.join(base_dir, module_name)
    os.makedirs(module_dir, exist_ok=True)
    
    # Generate create view
    create_path = os.path.join(module_dir, 'create.blade.php')
    with open(create_path, 'w', encoding='utf-8') as f:
        f.write(generate_create_view(module_name, config))
    print(f"Created {create_path}")
    
    # Generate edit view
    edit_path = os.path.join(module_dir, 'edit.blade.php')
    with open(edit_path, 'w', encoding='utf-8') as f:
        f.write(generate_edit_view(module_name, config))
    print(f"Created {edit_path}")

print("\n✅ All admin views generated successfully!")
