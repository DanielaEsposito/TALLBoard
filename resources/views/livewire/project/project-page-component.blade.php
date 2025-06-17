<div>
    @if ($view === 'list')
        <livewire:project.project-list-component />
    @elseif ($view === 'show')
        <livewire:project.project-show-component :projectId="$selectedProjectId" />
    @elseif ($view === 'form')
        <livewire:project.project-form-component :projectId="$selectedProjectId" />
    @endif
</div>
