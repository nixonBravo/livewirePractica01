<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jugador extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'jugadors';
    protected $fillable = [
        'jugador',
        'numCamisa',
        'equipo_id',
    ];

    public function equipo(){
        return $this->BelongsTo(Equipo::class);
    }

}
