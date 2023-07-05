<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\Jugador;
use Livewire\WithPagination;
use Livewire\Component;

class JugadorComponent extends Component
{
    use WithPagination;
    public $equipo, $dt, $idJ, $jugador, $numCamisa, $equipo_id, $search = '';
    protected $paginationTheme = 'bootstrap', $queryString = ['search' => ['except' => '']];

    protected $rules = [
        'jugador' => 'required|regex:/^[a-zA-ZñÑ\s]{3,}$/',
        'numCamisa' => 'required',
        'equipo_id' => 'required',
    ];

    protected $messages = [
        'jugador.required' => 'El nombre del jugador es requerido.',
        'jugador.regex' => 'Ingresa minimo 3 letras no se permiten numeros ni caracteres especiales.',
        'numCamisa.required' => 'El numero Camisa del jugador es requerido.',
        'equipo_id.required' => 'El Equipo al que pertenece el jugador es requerido.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clearInputs(){
        $this->equipo = '';
        $this->dt = '';
        $this->jugador = '';
        $this->numCamisa = '';
        $this->equipo_id = '';
    }

    public function render()
    {
        return view('livewire.jugador-component', [
            'equipos' => Equipo::all(),
            'jugadores' => Jugador::where('jugador', 'like', '%'.$this->search.'%')
            /* ->orWhere('numCamisa', 'like', '%'.$this->search.'%') */
            ->paginate(5),
        ]);
    }

    public function storeEquipo(){
        Equipo::create([
            'equipo' => $this->equipo,
            'dt' => $this->dt,
        ]);
        $this->clearInputs();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Equipo Creado']);
    }

    public function storeJugador(){
        $validatedData = $this->validate();
        Jugador::create([
            'jugador' => $this->jugador,
            'numCamisa' => $this->numCamisa,
            'equipo_id' => $this->equipo_id,
        ]);
        $this->clearInputs();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Jugador Creado']);
    }

    public function editJugador($id){
        $jugador = Jugador::find($id);
        $this->idJ = $jugador->id;
        $this->jugador = $jugador->jugador;
        $this->numCamisa = $jugador->numCamisa;
        $this->equipo_id = $jugador->equipo_id;
    }

    public function updateJugador(){
        $validateData = $this->validate();
        Jugador::where('id', $this->idJ)->update([
            'jugador' => $validateData['jugador'],
            'numCamisa' => $validateData['numCamisa'],
            'equipo_id' => $validateData['equipo_id'],
        ]);
        $this->clearInputs();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Actualizado']);
    }

    public function deleteJugador($id){
        $this->idJ = $id;

    }

    public function destroyJugador(){
        $jugador = Jugador::find($this->idJ)->delete();
        $this->dispatchBrowserEvent('close-modal', ['message' => 'Eliminado']);
    }

}
