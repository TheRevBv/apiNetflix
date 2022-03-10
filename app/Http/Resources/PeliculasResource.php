<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeliculasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'imagen' => $this->imagen,
            'descripcion' => $this->descripcion,
            'actores' => $this->actores,
            'fechaEstreno' => $this->fechaEstreno,
            'url' => $this->url,
            // 'created_at' => $this->created_at->format('d/m/Y'),
            // 'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
