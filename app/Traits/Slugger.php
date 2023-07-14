<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Slugger
{
    public static function slugger($string)
    {
        // Project::slugger($title)

        // generare lo slug base
        $baseSlug = Str::slug($string);
        $i = 1;
        $slug = $baseSlug;
        // verificare se è già presente nella colonna slug del db
        // self punta a Project
        // usiamo while perchè non sappiamo quante volte dobbiamo iterare
        while (self::where('slug', $slug)->first()) {
            $slug = $baseSlug . '-' . $i;
            // se presente incrementare un contatore e concatenare il numero allo slug base
            $i++;
            // ripetere finchè non generiamo uno slug non presente
        }
        // ritornare lo slug trovato
        return $slug;
    }
}
