<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
        Por página:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('eliminar_comentarios')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                Eliminar selección
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Comment" format="csv" />
                <livewire:excel-export model="Comment" format="xlsx" />
                <livewire:excel-export model="Comment" format="pdf" />
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
                        <th>
                        Título de evaluación
                            @include('components.table.sort', ['field' => 'quiz.title'])
                        </th>
                        <th>
                            Fecha
                            @include('components.table.sort', ['field' => 'created_at'])
                        </th>
                        <th>
                            Resultado
                            @include('components.table.sort', ['field' => 'result'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($results as $result)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $result->id }}" wire:model="selected">
                            </td>
                            <td>
                                @if($result->quiz)
                                    <span class="badge badge-relationship">{{ $result->quiz->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $result->created_at }}
                            </td>
                            <td>
                                {{ $result->result.'/'.$result->questions->count() }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    <a class="btn btn-sm btn-info mr-2" href="{{ route('results.show', $result) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">Entradas no encontradas.</td>
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
            {{ $results->links() }}
        </div>
    </div>
</div>
