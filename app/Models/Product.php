<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = ['title','excerpt'];

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){

        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('nama','like','%'.$filters['search'].'%')->orWhere('description','like','%'.$filters['search'].'%');
        // }

        // $query->when($filters['search'] ?? false, function($query, $search){
        //     return $query->where('nama','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%');
        // });

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('nama', 'like', '%' . $search . '%')
                             ->orWhere('description', 'like', '%' . $search . '%');
             });
         });

    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function bahan(){
        return $this->belongsTo(Bahan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function varian(){
        return $this->hasMany(Harga::class);
    }

    public function link(){
        return $this->hasMany(Link::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }


}
