<div class="row col-me-12 justify-content-end">
    <form id="projectForm" name="projectForm" action="{{ route($url) }}" method="GET" target="table">
        <select name="proj_id">
          @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
          @endforeach
        </select>
        <x-adminlte-button type="submit" label="{{ __('tables.select') }}" theme="primary" />
    </form>
</div>
