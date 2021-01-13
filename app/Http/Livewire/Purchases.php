<?php

namespace App\Http\Livewire;

use App\DetailPurchase;
use App\DetailSale;
use App\Estate;

use App\Purchase;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Purchases extends Component
{
    public $estate_id, $description, $total;
    public $purchase_id, $item_id;
    public $description_dp, $quantity_dp, $price_dp;

    public function render()
    {
        $estates = Estate::get();
        $items = DetailPurchase::where('purcharse_id', $this->purchase_id)->get();
        return view('livewire.purchases', compact('estates', 'items'));
    }

    public function purchase_store()
    {
        $this->validate([
            'estate_id' => 'required',
            'description' => 'required'
        ], [
            'estate_id.required' => 'Seleccione una Hacienda',
            'description.required' => 'Campo obligatorio.'
        ]);

        $purchase = Purchase::create([
            'estate_id' => $this->estate_id,
            'description' => $this->description,
            'date' => date('Y-m-d'),
            'status' => 0
        ]);
        $this->purchase_id = $purchase->id;
        $this->emit('newPurchase');
    }

    public function purchase_update()
    {
        $this->validate([
            'estate_id' => 'required',
            'description' => 'required'
        ], [
            'estate_id.required' => 'Seleccione una Hacienda',
            'description.required' => 'Campo obligatorio.'
        ]);
        $purchase = Purchase::find($this->purchase_id);
        $purchase->update([
            'estate_id' => $this->estate_id,
            'description' => $this->description,
            'status' => 0
        ]);

        $this->emit('newPurchase');
    }

    public function addItem()
    {
        $this->validate([
            'description_dp' => 'required',
            'quantity_dp' => 'required',
            'price_dp' => 'required'
        ], [
            'description_dp.required' => 'Campo obligatorio.',
            'quantity_dp.required' => 'Campo obligatorio.',
            'price_dp.required' => 'Campo obligatorio.'
        ]);

        $total_dp = round(((int)$this->quantity_dp * (double)round($this->price_dp, 2)), 2);

        $dp = DetailPurchase::create([
            'purcharse_id' => $this->purchase_id,
            'description' => $this->description_dp,
            'quanity' => $this->quantity_dp,
            'price_unit' => round($this->price_dp, 2),
            'price_total' => $total_dp,
            'status' => 0,
        ]);

        $this->emit('animalStore');
        $this->resetInputModal();
    }

    public function editItem($id){
        $item = DetailPurchase::find($id);
        $this->description_dp = $item->description;
        $this->quantity_dp = $item->quanity;
        $this->price_dp = $item->price_unit;
        $this->item_id = $item->id;
    }

    public function updateItem(){
        $this->validate([
            'description_dp' => 'required',
            'quantity_dp' => 'required',
            'price_dp' => 'required'
        ], [
            'description_dp.required' => 'Campo obligatorio.',
            'quantity_dp.required' => 'Campo obligatorio.',
            'price_dp.required' => 'Campo obligatorio.'
        ]);

        $total_dp = round(((int)$this->quantity_dp * (double)round($this->price_dp, 2)), 2);
        $item = DetailPurchase::find($this->item_id);

        $item->update([
            'purcharse_id' => $this->purchase_id,
            'description' => $this->description_dp,
            'quanity' => $this->quantity_dp,
            'price_unit' => round($this->price_dp, 2),
            'price_total' => $total_dp,
            'status' => 0,
        ]);

        $this->emit('animalStore');
        $this->resetInputModal();
    }

    public function deleteItem($id){
        DetailPurchase::find($id)->delete();
        $this->alert('success', 'Item eliminado con exíto.');
    }

    public function endPurchase()
    {
        $total_purchase = DB::table('detail_purcharses')
            ->where('purcharse_id', $this->purchase_id)
            ->select(DB::raw('SUM(price_total)as total_purchase'))
            ->value('total_purchase');
        $purchase = Purchase::find($this->purchase_id);
        $purchase->update([
            'total' => $total_purchase,
            'status' => 1,
        ]);
        $dp = DetailPurchase::where('purcharse_id', $this->purchase_id)->get();
        foreach ($dp as $d) {
            $d->update([
                'status' => 1,
            ]);
        }
        $this->resetInputFields();
        $this->emit('endPurchase');
        $this->alert('success', '¡Compra registrada con exito!');
    }


    public function resetInputModal()
    {
        $this->description_dp = '';
        $this->quantity_dp = '';
        $this->price_dp = '';
    }

    public function resetInputFields()
    {
        $this->estate_id = '';
        $this->description = '';
        $this->purchase_id = '';
    }
}
