<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Por página:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('eliminar_examen')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Eliminar selección') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Test" format="csv" />
                <livewire:excel-export model="Test" format="xlsx" />
                <livewire:excel-export model="Test" format="pdf" />
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
                            {{ trans('cruds.test.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.quiz') }}
                            @include('components.table.sort', ['field' => 'quiz.title'])
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.result') }}
                            @include('components.table.sort', ['field' => 'result'])
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.ip_address') }}
                            @include('components.table.sort', ['field' => 'ip_address'])
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.time_spent') }}
                            @include('components.table.sort', ['field' => 'time_spent'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tests as $test)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $test->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $test->id }}
                            </td>
                            <td>
                                @if($test->user)
                                    <span class="badge badge-relationship">{{ $test->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($test->quiz)
                                    <span class="badge badge-relationship">{{ $test->quiz->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $test->result.'/'.$test->questions->count() }}
                            </td>
                            <td>
                                {{ $test->ip_address }}
                            </td>
                            <td>
                                {{ $test->time_spent }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('mostrar_examen')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('results.show', $test) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('editar_examen')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('tests.edit', $test) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('eliminar_examen')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $test->id }})" wire:loading.attr="disabled">
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
            {{ $tests->links() }}
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
