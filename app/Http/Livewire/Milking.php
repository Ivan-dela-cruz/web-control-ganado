<?php

namespace App\Http\Livewire;

use App\Milking as Milk;
use App\Estate;
use App\Income;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
class Milking extends Component
{
    use WithFileUploads;
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    public $timeWhere='';

    public $perPage = '10';
    public $search = '';
    public $estate_filter = 0;

    public $estates, $data_id, $estate_id;


    //VARIABLES PARA LITROS
    public $income =null;


    public function render()
    {
        $this->estates = Estate::all();
       
        switch($this->timeWhere){

            case 'day':
                $this->time = $now->day;
                $incomes = Income::where(function ($query) {
                    $query->when($this->estate_filter > 0, function ($q) {
                        $q->where('estate_id', $this->estate_filter);
                    });
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('date', 'LIKE', "%{$this->search}%");
                        $q->orWhere('description', 'LIKE', "%{$this->search}%");
                        $q->orWhere('total_liters', 'LIKE', "%{$this->search}%");
                    });
                })
                ->whereDay('created_at',$this->time)
                ->paginate($this->perPage);
                break;
            case 'yesterday':
                $now = Carbon::yesterday();
                $this->time = $now->day;
              
                $incomes = Income::where(function ($query) {
                    $query->when($this->estate_filter > 0, function ($q) {
                        $q->where('estate_id', $this->estate_filter);
                    });
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('date', 'LIKE', "%{$this->search}%");
                        $q->orWhere('description', 'LIKE', "%{$this->search}%");
                        $q->orWhere('total_liters', 'LIKE', "%{$this->search}%");
                    });
                })
                ->whereDay('created_at',$this->time)
                ->paginate($this->perPage);
               
                break;
            case 'week':
                $this->time = $now->startOfWeek()->format('Y-m-d');

                $incomes = Income::where(function ($query) {
                    $query->when($this->estate_filter > 0, function ($q) {
                        $q->where('estate_id', $this->estate_filter);
                    });
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('date', 'LIKE', "%{$this->search}%");
                        $q->orWhere('description', 'LIKE', "%{$this->search}%");
                        $q->orWhere('total_liters', 'LIKE', "%{$this->search}%");
                    });
                })
                ->whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->paginate($this->perPage);
                break;
            case 'month':
                $this->time = $now->month;
                $incomes = Income::where(function ($query) {
                    $query->when($this->estate_filter > 0, function ($q) {
                        $q->where('estate_id', $this->estate_filter);
                    });
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('date', 'LIKE', "%{$this->search}%");
                        $q->orWhere('description', 'LIKE', "%{$this->search}%");
                        $q->orWhere('total_liters', 'LIKE', "%{$this->search}%");
                    });
                })
                ->whereMonth('created_at',$this->time)
                ->paginate($this->perPage);
               
                break;
            case 'year':
                $this->time = $now->year;
                $incomes = Income::where(function ($query) {
                    $query->when($this->estate_filter > 0, function ($q) {
                        $q->where('estate_id', $this->estate_filter);
                    });
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('date', 'LIKE', "%{$this->search}%");
                        $q->orWhere('description', 'LIKE', "%{$this->search}%");
                        $q->orWhere('total_liters', 'LIKE', "%{$this->search}%");
                    });
                })
                ->whereYear('created_at',$this->time)
                ->paginate($this->perPage);
                break;
            case '':
                $this->time = "";
                $incomes = Income::where(function ($query) {
                    $query->when($this->estate_filter > 0, function ($q) {
                        $q->where('estate_id', $this->estate_filter);
                    });
                    $query->when($this->search != '', function ($q) {
                        $q->orWhere('date', 'LIKE', "%{$this->search}%");
                        $q->orWhere('description', 'LIKE', "%{$this->search}%");
                        $q->orWhere('total_liters', 'LIKE', "%{$this->search}%");
                    });
                })
                ->paginate($this->perPage);
                break; 
        }



        $milkings = Milk::where('income_id',$this->data_id)->get();

        return view('livewire.milking',compact('incomes','milkings'));
    }

    public function getTime($time)
    {
        $this->timeWhere =  $time;
    }
    public function dataId($id)
    {
    
        $this->data_id = $id;
        $this->income = Income::find($id);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
        $this->estate_filter = '';
        $this->income = null;
    }
}
