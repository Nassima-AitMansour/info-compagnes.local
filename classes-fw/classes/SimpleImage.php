<?php

class SimpleImage{
   
  function fctredimimage($W_max, $H_max, $rep_Dst, $img_Dst, $rep_Src, $img_Src) {
 // ------------------------------------------------------------------
 $condition = 0;
 $img_Dst=$this->renameph($img_Dst);
 if (file_exists($rep_Src) && ($W_max!=0 || $H_max!=0)) { 
   // ----------------------------------------------------------------
   // extensions acceptees : 
   $ExtfichierOK = '" jpg jpeg png gif"'; // (l espace avant jpg est important)
   // extension fichier Source
   $tabimage = explode('.',$img_Src);
   $extension = $tabimage[sizeof($tabimage)-1]; // dernier element
   $extension = strtolower($extension); // on met en minuscule
   // ----------------------------------------------------------------
   // extension OK ? on continue ...
   if (strpos($ExtfichierOK,$extension) != '') {
      // -------------------------------------------------------------
      // recuperation des dimensions de l image Src
      $img_size = getimagesize($rep_Src);
      $W_Src = $img_size[0]; // largeur
      $H_Src = $img_size[1]; // hauteur
      // -------------------------------------------------------------
      // condition de redimensionnement et dimensions de l image finale
      // -------------------------------------------------------------
      // A- LARGEUR ET HAUTEUR maxi fixes
      if ($W_max != 0 && $H_max != 0) {
         $ratiox = $W_Src / $W_max; // ratio en largeur
         $ratioy = $H_Src / $H_max; // ratio en hauteur
         $ratio = max($ratiox,$ratioy); // le plus grand
         $W = $W_Src/$ratio;
         $H = $H_Src/$ratio;   
         $condition = ($W_Src>$W) || ($W_Src>$H); // 1 si vrai (true)
		 
      }     
	 
	  
	  // B- HAUTEUR maxi fixe
      if ($W_max == 0 && $H_max != 0) {
         $H = $H_max;
         $W = $H * ($W_Src / $H_Src);
         $condition = $H_Src > $H_max; // 1 si vrai (true)
      }
      // -------------------------------------------------------------
      // C- LARGEUR maxi fixe
      if ($W_max != 0 && $H_max == 0) {
         $W = $W_max;
         $H = $W * ($H_Src / $W_Src);         
         $condition = $W_Src > $W_max; // 1 si vrai (true)
      }
	  $condition =1;
	   // AA- -------------------------------------------------------------
      
	  if(($W_Src<=$W_max) and ($H_Src<=$H_max)){
		  $condition=2;
		 
		  copy($rep_Src,$rep_Dst.$img_Dst);
		  }
      // -------------------------------------------------------------
      // on REDIMENSIONNE si la condition est vraie
      // -------------------------------------------------------------
      // Par defaut : 
	  // Si l'image Source est plus petite que les dimensions indiquees :
	  // PAS de redimensionnement.
	  // Mais on peut "forcer" le redimensionnement en ajoutant ici :
	  // $condition = 1;
      if ($condition == 1) {
         // ----------------------------------------------------------
         // creation de la ressource-image "Src" en fonction de l extension
         switch($extension) {
         case 'jpg':
         case 'jpeg':
           $Ress_Src = imagecreatefromjpeg($rep_Src);
           break;
         case 'png':
           $Ress_Src = imagecreatefrompng($rep_Src);
           break;
		 case 'gif':
           $Ress_Src = imagecreatefromgif($rep_Src);
           break;
         }
         // ----------------------------------------------------------
         // creation d une ressource-image "Dst" aux dimensions finales
         // fond noir (par defaut)
         switch($extension) {
         case 'jpg':
         case 'jpeg':
           $Ress_Dst = imagecreatetruecolor($W,$H);
           break;
         case 'png':
           $Ress_Dst = imagecreatetruecolor($W,$H);
           // fond transparent (pour les png avec transparence)
           imagesavealpha($Ress_Dst, true);
           $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
           imagefill($Ress_Dst, 0, 0, $trans_color);
           break;
		 case 'gif':
           $Ress_Dst = imagecreatetruecolor($W,$H);
           // fond transparent (pour les png avec transparence)
           imagesavealpha($Ress_Dst, true);
           $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
           imagefill($Ress_Dst, 0, 0, $trans_color);
           break;
         }
         // ----------------------------------------------------------
         // REDIMENSIONNEMENT (copie, redimensionne, re-echantillonne)
         imagecopyresampled($Ress_Dst, $Ress_Src, 0, 0, 0, 0, $W, $H, $W_Src, $H_Src); 
         // ----------------------------------------------------------
         // ENREGISTREMENT dans le repertoire (avec la fonction appropriee)
         switch ($extension) { 
         case 'jpg':
         case 'jpeg':
		 imageinterlace($Ress_Dst, true);
           imagejpeg ($Ress_Dst, $rep_Dst.$img_Dst,100);
           break;
         case 'png':
           imagepng ($Ress_Dst, $rep_Dst.$img_Dst);
           break;
		  case 'gif':
           imagegif ($Ress_Dst, $rep_Dst.$img_Dst);
           break;
         }
         // ----------------------------------------------------------
         // liberation des ressources-image
         imagedestroy ($Ress_Src);
         imagedestroy ($Ress_Dst);
      }
      // -------------------------------------------------------------
   }
 }
 return $img_Dst;
// 	---------------------------------------------------------------
 // si le fichier a bien ete cree
 if ($condition == 1 && file_exists($rep_Dst.$img_Dst)) { return true; }
 else { return false; }
}

public function verimage($image,$repertoire,$newnom='',$poids_max = 5242880)
	{
		
if ($image['type'] != 'image/png' && $image['type'] != 'image/jpeg' && $image['type'] != 'image/jpg' && $image['type'] != 'image/gif')
{$erreur = 'Le fichier doit &ecirc;tre au format *.jpeg, *.gif ou *.png .';}
/*elseif ($image['size'] > $poids_max)
{$erreur = 'L\'image doit être inférieur à ' . $poids_max/1024 . 'Ko.';}*/
elseif (!file_exists($repertoire))
{$erreur = 'Erreur, le dossier d\'upload n\'existe pas.';}
if(isset($erreur))
{return $erreur;}
else
{

 
if($newnom==''){$nom_fichier =$image['name'];}
else{
	$extension=strrchr($image['name'],'.');
	$extension=substr($extension,1) ; 
	$nom_fichier =$newnom.'.'.$extension;
	}
 $nom_fichier=$this->renameph($nom_fichier);
if (move_uploaded_file($image['tmp_name'], $repertoire.$nom_fichier))
{return $nom_fichier;}
else
{return false;}
}
	} 

  function renameph($filename){	   
	   $filename = utf8_decode($filename);
		$filename = trim($filename);
		$filename = stripslashes($filename);
		$filename = strtr($filename,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',		'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$filename = str_replace(" ","-",$filename);
		$filename = str_replace("'","-",$filename);
		$filename = str_replace("---","-",$filename);
		$filename = str_replace("--","-",$filename);
		$filename = strtolower($filename);
	   
	   
	   return $filename;
	   }
  
}


?>