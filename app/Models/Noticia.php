<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Noticia extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'titulo',
        'descricao',
        'url',
    ];

    public function scopeFilter(Builder $query, array $filters)
    {
        if($title = $filters['title'] ?? false){
            $query->where('titulo','like','%' . $title . '%');
        }

        if($description = $filters['description'] ?? false){
            $query->where('descricao','like','%' . $description . '%');
        }
    }

    public function toSearchableArray(){
        return[
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
        ];
    }
    
    public function storeArquivo($arquivo){
        if ($arquivo){
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }
    }

}
