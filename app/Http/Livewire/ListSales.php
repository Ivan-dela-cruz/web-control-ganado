<?php

namespace App\Http\Livewire;

use App\Estate;
use App\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class ListSales extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '5';
    public $search = '';
    public $estate_filter = 0;

    public $estate, $date, $description, $total;
    public $sale_details = [];

    public function render()
    {
        if($this->search != ''){
            $this->estate_filter = 0;
        }
        $sales = Sale::where('status', 1)
            ->where(function ($query) {
                $query->when($this->estate_filter > 0, function ($q) {
                    $q->where('estate_id', $this->estate_filter);
                });
                $query->when($this->search != '', function ($q){
                    $q->orWhere('description', 'LIKE', "%{$this->search}%");
                    $q->orWhere('date', 'LIKE', "%{$this->search}%");
                    $q->orWhere('total', 'LIKE', "%{$this->search}%");
                });
            })
            ->paginate($this->perPage);

        $estates = Estate::get();
        return view('livewire.list-sales', compact('sales', 'estates'));
    }

    public function detailSale($id)
    {
        $sale = Sale::find($id);
        $this->estate = $sale->estate->name;
        $this->date = $sale->date;
        $this->description = $sale->description;
        $this->total = $sale->total;

        $this->sale_details = $sale->details;
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
        $this->estate_filter = 0;
    }
}
