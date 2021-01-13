<?php

namespace App\Http\Livewire;

use App\DetailSale;
use App\Estate;
use App\Sale;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Sales extends Component
{
    public $estate_id, $description, $total;
    public $sale_id, $item_id;
    public $description_ds, $quantity_ds, $price_ds;

    public function render()
    {
        $estates = Estate::get();
        $items = DetailSale::where('sale_id', $this->sale_id)->get();
        return view('livewire.sales', compact('estates','items'));
    }

    public function sale_store()
    {
        $this->validate([
            'estate_id' => 'required',
            'description' => 'required'
        ], [
            'estate_id.required' => 'Seleccione una Hacienda',
            'description.required' => 'Campo obligatorio.'
        ]);

        $sale = Sale::create([
            'estate_id' => $this->estate_id,
            'description' => $this->description,
            'date' => date('Y-m-d'),
            'status' => 0
        ]);
        $this->sale_id = $sale->id;
        $this->emit('newSale');
    }

    public function sale_update()
    {
        $this->validate([
            'estate_id' => 'required',
            'description' => 'required'
        ], [
            'estate_id.required' => 'Seleccione una Hacienda',
            'description.required' => 'Campo obligatorio.'
        ]);
        $sale = Sale::find($this->sale_id);
        $sale->update([
            'estate_id' => $this->estate_id,
            'description' => $this->description,
            'status' => 0
        ]);
        $this->emit('newSale');
    }

    public function addItem()
    {
        $this->validate([
            'description_ds' => 'required',
            'quantity_ds' => 'required',
            'price_ds' => 'required'
        ], [
            'description_ds.required' => 'Campo obligatorio.',
            'quantity_ds.required' => 'Campo obligatorio.',
            'price_ds.required' => 'Campo obligatorio.'
        ]);

        $total_ds = round(((int)$this->quantity_ds * (double)round($this->price_ds, 2)), 2);

        $dp = DetailSale::create([
            'sale_id' => $this->sale_id,
            'description' => $this->description_ds,
            'quanity' => $this->quantity_ds,
            'price_unit' => round($this->price_ds, 2),
            'price_total' => $total_ds,
            'status' => 0,
        ]);

        $this->emit('animalStore');
        $this->resetInputModal();
    }

    public function editItem($id){
        $item = DetailSale::find($id);
        $this->description_ds = $item->description;
        $this->quantity_ds = $item->quanity;
        $this->price_ds = $item->price_unit;
        $this->item_id = $item->id;
    }

    public function updateItem(){
        $this->validate([
            'description_ds' => 'required',
            'quantity_ds' => 'required',
            'price_ds' => 'required'
        ], [
            'description_ds.required' => 'Campo obligatorio.',
            'quantity_ds.required' => 'Campo obligatorio.',
            'price_ds.required' => 'Campo obligatorio.'
        ]);

        $total_dp = round(((int)$this->quantity_ds * (double)round($this->price_ds, 2)), 2);
        $item = DetailSale::find($this->item_id);

        $item->update([
            'sale_id' => $this->sale_id,
            'description' => $this->description_ds,
            'quanity' => $this->quantity_ds,
            'price_unit' => round($this->price_ds, 2),
            'price_total' => $total_dp,
            'status' => 0,
        ]);

        $this->emit('animalStore');
        $this->resetInputModal();
    }

    public function deleteItem($id){
        DetailSale::find($id)->delete();
        $this->alert('success', 'Item eliminado con exíto.');
    }

    public function endSale()
    {
        $total_sale = DB::table('detail_sales')
            ->where('sale_id', $this->sale_id)
            ->select(DB::raw('SUM(price_total)as total_sale'))
            ->value('total_sale');
        $sale = Sale::find($this->sale_id);
        $sale->update([
            'total' => $total_sale,
            'status' => 1,
        ]);
        $ds = DetailSale::where('sale_id', $this->sale_id)->get();
        foreach ($ds as $d) {
            $d->update([
                'status' => 1,
            ]);
        }
        $this->resetInputFields();
        $this->emit('endSale');
        $this->alert('success', '¡Venta registrada con exito!');
    }

    public function resetInputModal()
    {
        $this->description_ds = '';
        $this->quantity_ds = '';
        $this->price_ds = '';
    }

    public function resetInputFields()
    {
        $this->estate_id = '';
        $this->description = '';
        $this->sale_id = '';
    }

}
