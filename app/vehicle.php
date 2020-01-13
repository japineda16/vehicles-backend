<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'color',
        'licensePlate',
        'mileage',
        'year',
        'clientName',
        'clientPhoneNumber',
        'observations',
        'retrovisor_izquierdo',
        'retrovisor_derecho',
        'retrovisor_interno',
        'alfombras',
        'cepillos_de_parabrisas',
        'antena',
        'estereo',
        'tapa_de_gasolina',
        'tapa_valvula_de_aire',
        'placa_delantera',
        'placa_trasera',
        'capo',
        'compuerta_trasera',
        'pintura',
        'parabrisas',
        'puertas_abrir_cerrar',
        'manillas',
        'cocuyos',
        'emblema',
        'parachoques',
        'tapas_de_rines',
        'cinturones_de_seguridad',
        'neumaticos',
        'techo',
        'encendedor_de_cigarrillo',
        'luces_neblina_delanteras',
        'luces_traseras',
        'luces_delanteras',
        'luces_altas',
        'corneta',
        'alarma',
        'vidrios_suben_bajan',
        'luces_stock',
        'luces_internas',
        'aire_acondicionado',
        'frenos',
        'bateria',
        'extinguidor',
        'cables_para_corriente',
        'gato',
        'triangulo',
        'llave_de_seguridad',
        'llave_ajustar_tuercas',
        'neumatico_repuesto',
        'taza_de_ruedas',
        'fuel_level'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
