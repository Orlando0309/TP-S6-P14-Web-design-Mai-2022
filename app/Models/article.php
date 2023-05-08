<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
  protected $table='article';
  protected $fillable = ['titre','resume','categorie','contenu'];
  public static function getList(){
    return [
      array('titre'=>'Titre 1','resume' => 'Resume 1','categorie' => 'Categorie 1','contenu' => 'Contenu 1'),
      array('titre'=>'Titre 2','resume' => 'Resume 2','categorie' => 'Categorie 2','contenu' => 'Contenu 2'),
      array('titre'=>'Titre 3','resume' => 'Resume 3','categorie' => 'Categorie 3','contenu' => 'Contenu 3'),
      array('titre'=>'Titre 4','resume' => 'Resume 4','categorie' => 'Categorie 4','contenu' => 'Contenu 4')
    
    ];
  }
}
