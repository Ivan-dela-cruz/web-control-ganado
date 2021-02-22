<?php

namespace App\Http\Livewire;

use App\Employ;
use App\Estate;
use App\Task;
use Livewire\Component;

class EmployeeTasks extends Component
{
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

    public $title, $description, $date, $hour;

    public function render()
    {
        $this->estates = Estate::all();
        $this->employees = Employ::all();

        if($this->employee_id > 0) {
            $employee = Employ::find($this->employee_id);
            $this->tasks = $employee->tasks;
        }

        return view('livewire.employee-tasks');
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

    public function taskCompleted($id){
        $task = Task::find($id);
        $new_status = '';
        switch ($task->status){
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

        $this->alert('success', 'Tarea '.$new_status);
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
