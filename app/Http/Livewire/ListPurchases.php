<?php

namespace App\Http\Livewire;

use App\Estate;
use App\Purchase;
use Livewire\Component;
use Livewire\WithPagination;

class ListPurchases extends Component
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
    public $purchase_details = [];

    public function render()
    {
        if($this->search != ''){
            $this->estate_filter = 0;
        }

        $purchases = Purchase::where('status', 1)
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
        return view('livewire.list-purchases', compact('purchases', 'estates'));
    }

    public function detailPurchase($id)
    {
        $purchase = Purchase::find($id);
        $this->estate = $purchase->estate->name;
        $this->date = $purchase->date;
        $this->description = $purchase->description;
        $this->total = $purchase->total;

        $this->purchase_details = $purchase->details;
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
        $this->estate_filter = 0;
    }
}
