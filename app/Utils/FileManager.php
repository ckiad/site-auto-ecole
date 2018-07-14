<?php

namespace App\Utils;
use File;
use App\User;
use App\Cours;
use App\Evaluation;
use App\Formation;
use App\Media;
use App\Post;
use App\Promotion;
use App\Temoignage;
use Sentinel;

class  FileManager
{

  // Fonction pour uploader un fichier dans un répertoire du serveur
  public function upload($file, $dest_folder)
  {

    $fileName = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension() ?: 'png';
    $destinationPath = public_path() . '/assets/img/'.$dest_folder;

    // Generer aleatoirement le nom du fichier (à revoir avec l'utilisation du SSIUD)
    $safeName  = str_random(10).'.'.$extension;

    // Deplacer le fichier à sa destination
    $file->move($destinationPath, $safeName);

    return $safeName;
  }

  // Fonction pour uploader un fichier dans un répertoire du serveur
  public function uploadFichier($file, $dest_folder)
  {

    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png','pdf','mp4','mp3','docx','doc','txt' );
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        //$extension = strtolower(  substr(  strrchr($_FILES[$file]['name'], '.')  ,1)  );
        

    $fileName = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    if ( in_array(strtolower($extension),$extensions_valides) )
    {
        $destinationPath = public_path() . '/assets/img/'.$dest_folder;
        //Vérifions que le dossier $dest_folder existe sinon on le crée
    //if (!is_dir($destinationPath))
    /*{
               if (!@mkdir($destinationPath))
               {
                               echo "Erreur lors de la création du dossier 'docs'";
               }
    }*/
        //Permettons l'accès complet sur ce dossier: lecture, écriture et suppression
        //@chmod($destinationPath,0777);
          //mkdir($destinationPath, 0777, true);      
        //Créer un identifiant difficile à deviner
        $safeName = md5(uniqid(rand(), true)).'.'.$extension;

        // Generer aleatoirement le nom du fichier (à revoir avec l'utilisation du SSIUD)
        //$safeName  = str_random(10).'.'.$extension;
    
        // Deplacer le fichier à sa destination
        $file->move($destinationPath, $safeName);
    
        return $safeName;
        
    } else{
        $extension = 'txt';
        echo "Extension correcte";
        $destinationPath = public_path() . '/assets/img/'.$dest_folder;
        $safeName = md5(uniqid(rand(), true)).'.'.$extension;
        $file->move($destinationPath, $safeName);
    
        return $safeName;
    }

    

    
  }

  public function apprenants($mot){
    $users = User::whereHas('roles', function($query)
    {
        $query->where('slug', 'like','apprenant');
    //})->where(function($query){
       // $query->where('nom','like','%'.$mot.'%');
        //->orWhere('prenom','like','%'.$mot.'%')
        //->orWhere('email','like','%'.$mot.'%');
    })->get();
    return $users;
}

  public function listerApprenants($token)
  {
  //on recupere le role de l'utilisateur
  $role = Sentinel::findRoleBySlug('apprenant');
  //on fabrique une liste d'apprenants ayant le slug specifié 
      $apprenants = $role->users()->where('prenom', 'like','%'.$token.'%')
      ->orWhere('nom', 'like','%'.$token.'%')
      ->orWhere('email', 'like','%'.$token.'%')->get();
      return $apprenants;
}

public function listerMarketeurs($token)
{
  $role = Sentinel::findRoleBySlug('marketeur');

      $marketeurs = $role->users()->where('prenom', 'like','%'.$token.'%')
      ->where('nom', 'like','%'.$token.'%')
      ->where('email', 'like','%'.$token.'%')->get();
  return $marketeurs;
  }
  
  public function rechercheCours($token)
  {
      $cours = Cours::where('label', 'like','%'.$token.'%')
      ->orWhere('description', 'like', '%'.$token.'%')
          ->orWhere('type', 'like', '%'.$token.'%')->get();
  }

  public function rechercheEvaluation($token)
  {
      $evaluations = Evaluation::where('label', 'like','%'.$token.'%')->get();
  }

  public function rechercheFormation($token)
  {
      $formations = Formation::where('label', 'like','%'.$token.'%')
      ->orWhere('description', 'like', '%'.$token.'%')->get();
      
  }

  public function rechercheMedia($token)
  {
      $medias = Media::where('label', 'like','%'.$token.'%')
          ->orWhere('type', 'like', '%'.$token.'%')->get();
      
  }

  public function recherchePost($token)
  {
      $posts = Post::where('label', 'like','%'.$token.'%')
      ->orWhere('contenu', 'like', '%'.$token.'%')->get();     
  }

  public function rechercheTemoignage($token)
  {
      $temoignages = Temoignage::where('contenu', 'like','%'.$token.'%')->get();     
  }


}
