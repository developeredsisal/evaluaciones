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
                    {{ __('Eliminar selección') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Comment" format="csv" />
                <livewire:excel-export model="Comment" format="xlsx" />
                <livewire:excel-export model="Comment" format="pdf" />
            @endif
        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Buscando:
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
                            {{ trans('cruds.comment.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.comment_text') }}
                            @include('components.table.sort', ['field' => 'comment_text'])
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.question') }}
                            @include('components.table.sort', ['field' => 'question.question_text'])
                        </th>
                        <th>
                            {{ trans('cruds.comment.fields.quiz') }}
                            @include('components.table.sort', ['field' => 'quiz.title'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $comment->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $comment->id }}
                            </td>
                            <td>
                                {{ $comment->name }}
                            </td>
                            <td>
                                {{ $comment->comment_text }}
                            </td>
                            <td>
                                @if($comment->question)
                                    <span class="badge badge-relationship">{{ $comment->question->question_text ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($comment->quiz)
                                    <span class="badge badge-relationship">{{ $comment->quiz->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('ver_comentarios')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('comments.show', $comment) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('editar_comentarios')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('comments.edit', $comment) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('eliminar_comentarios')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $comment->id }})" wire:loading.attr="disabled">
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
            {{ $comments->links() }}
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
