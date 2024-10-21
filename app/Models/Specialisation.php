<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialisation extends Model
{
    use HasFactory;

    /**
     * De naam van de tabel die door dit model wordt gebruikt.
     * Laravel neemt automatisch aan dat de tabelnaam de meervoudsvorm van het model is ('specialisations'),
     * maar als je een aangepaste naam zou willen, voeg je dat hier toe.
     */
    protected $table = 'specialisations';

    /**
     * De velden die massaal ingevuld kunnen worden.
     * Dit beschermt velden tegen ongewenste invoer.
     */
    protected $fillable = ['class', 'specialisations', 'cooldown'];


    /**
     * Geef aan of de timestamps 'created_at' en 'updated_at' moeten worden gebruikt.
     * Dit is standaard ingeschakeld, maar als je deze niet hebt, kun je het uitschakelen.
     */
    public $timestamps = true;
}
