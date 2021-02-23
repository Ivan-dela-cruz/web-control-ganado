<?php

namespace App\Http\Livewire;

use App\Employ;
use App\Estate;
use App\Task;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeTasks extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    public $perPage = '10';
    public $search = '';
    public $estate_filter = 0;
    public $employee_filter = 0;
    public $estates = [], $estate_id;
    public $employees = [], $employee_id;
    public $tasks = [];

    public $task_id, $title, $description, $date, $hour;

    public $position = 'new_task';

    public $header_task = 'Nueva Tarea';

    public function render()
    {
        $this->estates = Estate::all();
        $this->employees = Employ::all();
        $allTasks = Task::where('title', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->orWhere('date', 'LIKE', "%{$this->search}%")
            ->orWhere('hour', 'LIKE', "%{$this->search}%")
            ->orderBy('updated_at', 'desc')->paginate($this->perPage);

        if ($this->employee_id > 0) {
            $employee = Employ::find($this->employee_id);
            $this->tasks = $employee->tasks;
        }

        return view('livewire.employee-tasks', compact('allTasks'));
    }

    public function storeTask()
    {
        $this->validate([
            'estate_id' => 'required',
            'employee_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'hour' => 'required',
        ], [
            'estate_id.required' => 'Campo obligatorio.',
            'employee_id.required' => 'Campo obligatorio.',
            'title.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'date.required' => 'Campo obligatorio.',
            'hour.required' => 'Campo obligatorio.',
        ]);

        $employee = Employ::find($this->employee_id);

        $task = new Task([
            'estate_id' => $this->estate_id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'hour' => $this->hour
        ]);

        $employee->tasks()->save($task);

        $this->resetInputFields();
        $this->alert('success', 'Tarea asignada con exíto.');
        //dd($employee);

    }

    public function taskCompleted($id)
    {
        $task = Task::find($id);
        $new_status = '';
        switch ($task->status) {
            case 'Pendiente':
                $new_status = 'Finalizada';
                break;
            case 'Finalizada':
                $new_status = 'Pendiente';
                break;
        }
        $task->update([
            'status' => $new_status
        ]);

        $this->alert('success', 'Tarea ' . $new_status);
    }

    public function editTask($id)
    {
        $this->header_task = 'Editar Tarea';
        $this->position = 'new_task';

        $task = Task::find($id);
        $this->task_id = $task->id;
        $this->estate_id = $task->estate_id;
        $this->employee_id = $task->taskeable->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->date = $task->date;
        $this->hour = $task->hour;

    }

    public function updateTask()
    {
        $this->validate([
            'estate_id' => 'required',
            'employee_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'hour' => 'required',
        ], [
            'estate_id.required' => 'Campo obligatorio.',
            'employee_id.required' => 'Campo obligatorio.',
            'title.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'date.required' => 'Campo obligatorio.',
            'hour.required' => 'Campo obligatorio.',
        ]);

        $task = Task::find($this->task_id);
        $task->taskeable_id = $this->employee_id;
        $task->estate_id = $this->estate_id;
        $task->title = $this->title;
        $task->description = $this->description;
        $task->date = $this->date;
        $task->hour = $this->hour;
        $task->save();


        $this->resetInputFields();
        $this->alert('success', 'Tarea actualizada con exíto.');

    }

    public function destroyTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        $this->alert('success', 'Tarea eliminada con exíto.');

    }

    public function setPos($pos)
    {
        switch ($pos) {
            case 'new_task':
                $this->position = 'new_task';
                break;
            case 'list_task':
                $this->position = 'list_task';
                $this->resetInputFields();
                break;
        }
    }

    public function resetInputFields()
    {
        $this->estate_id = 0;
        $this->employee_id = 0;
        $this->title = '';
        $this->description = '';
        $this->date = '';
        $this->hour = '';
        $this->tasks = [];
        $this->header_task = 'Nueva Tarea';
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
        $this->estate_id = 0;
        $this->employee_id = 0;
        $this->tasks = [];
    }
}
