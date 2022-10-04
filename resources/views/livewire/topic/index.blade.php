<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Por página:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('borrar_tema')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Eliminar selección') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Topic" format="csv" />
                <livewire:excel-export model="Topic" format="xlsx" />
                <livewire:excel-export model="Topic" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Buscar:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Cargando...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.topic.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.topic.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topics as $topic)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $topic->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $topic->id }}
                            </td>
                            <td>
                                {{ $topic->title }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('ver_tema')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('topics.show', $topic) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('editar_tema')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('topics.edit', $topic) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('borrar_tema')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $topic->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No se encontraron entradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entradas seleccionadas') }}
                </p>
            @endif
            {{ $topics->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
