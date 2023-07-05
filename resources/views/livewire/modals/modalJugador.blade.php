<!--Modal Equipo-->
<div wire:ignore.self class="modal fade" id="newEquipo">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="storeEquipo">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Create Equipo</h4>
                    <button type="button" class="close btn btn-outline-danger" wire:click="clearInputs"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control @error('equipo')is-invalid @enderror" type="text"
                            wire:model="equipo" placeholder="Equipo">
                        @error('equipo')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('dt')is-invalid @enderror" wire:model="dt" rows="2"
                            placeholder="Director Tecnico"></textarea>
                        @error('dt')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" wire:click="clearInputs"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.modal equipo-->
<!--Modal Jugador-->
<div wire:ignore.self class="modal fade" id="newJugador">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="storeJugador">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Create Jugador</h4>
                    <button type="button" class="close btn btn-outline-danger" wire:click="clearInputs"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control @error('jugador')is-invalid @enderror" type="text"
                            wire:model="jugador" placeholder="Jugador">
                        @error('jugador')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('numCamisa')is-invalid @enderror" type="number"
                            wire:model="numCamisa" placeholder="Número Camisa">
                        @error('numCamisa')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipoSelect" class="text-white">Equipo</label>
                        <select class="custom-select rounded-0 @error('equipo_id')is-invalid @enderror"
                            wire:model="equipo_id" id="equipoSelect">
                            <option></option>
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->id }}">{{ $equipo->equipo }}</option>
                            @endforeach
                        </select>
                        @error('equipo_id')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" wire:click="clearInputs"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.modal jugador-->
<!--Modal Edit Jugador-->
<div wire:ignore.self class="modal fade" id="updateJugador">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="updateJugador">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit Jugador</h4>
                    <button type="button" class="close btn btn-outline-danger" wire:click="clearInputs"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control @error('jugador')is-invalid @enderror" type="text"
                            wire:model="jugador" placeholder="Jugador">
                        @error('jugador')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('numCamisa')is-invalid @enderror" type="number"
                            wire:model="numCamisa" placeholder="Número Camisa">
                        @error('numCamisa')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="equipoSelect" class="text-white">Equipo</label>
                        <select class="custom-select rounded-0 @error('equipo_id')is-invalid @enderror"
                            wire:model="equipo_id" id="equipoSelect">
                            <option></option>
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->id }}">{{ $equipo->equipo }}</option>
                            @endforeach
                        </select>
                        @error('equipo_id')
                            <span class="error text-white">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" wire:click="clearInputs"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-info">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.modal edit jugador-->
<!--Modal Delete Jugador-->
<div wire:ignore.self class="modal fade" id="destroyJugador">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="destroyJugador">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Delete Jugador</h4>
                    <button type="button" class="close btn btn-outline-danger" wire:click="clearInputs" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-white">
                    <h4>¿Está seguro de que desea eliminar los datos del jugador?</h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" wire:click="clearInputs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-info">Eliminar!</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.modal delete jugador-->
