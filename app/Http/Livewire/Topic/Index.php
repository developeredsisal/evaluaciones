<?php

namespace App\Http\Livewire\Topic;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Topic;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Topic())->orderable;
    }

    public function render()
    {
        $query = Topic::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $topics = $query->paginate($this->perPage);

        return view('livewire.topic.index', compact('query', 'topics'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('borrar_tema'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Topic::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Topic $topic)
    {
        abort_if(Gate::denies('borrar_tema'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topic->delete();
    }
}
