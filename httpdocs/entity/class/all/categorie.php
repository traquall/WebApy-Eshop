<?php

namespace Noneslad\Entity;

use Noneslad\Tools\WebTools;
use Noneslad\Tools\DB\model;
use Noneslad\Tools\DB\model as DB;
class categorie extends model{
    protected $id;
    protected $nom;
    protected $id_lang;
    protected $contenu;
    protected $ordre;
     protected $niveau;
    protected $id_parent;
   
    public function __construct($id = false)
    {
        parent::__construct();
        if($id !== false){
            $this->id = $id;
            $this->load();
        }
    }


       public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
/*--------------------------------------*/
     public function getId_parent()
    {
        return $this->id_parent;
    }
     public function setId_parent($id_parent)
    {
        $this->id_parent = $id_parent;
    }
/*--------------------------------------*/
   
    public function getNom()
    {
        return $this->nom;
    }
   
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    /*--------------------------------------*/
   
    public function getNiveau()
    {
        return $this->niveau;
    }
   
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function getNiveauParent($id_parent)
    {
        $sqll = "select niveau from categorie where id = '".$id_parent."'";
        $id_parent_res = DB::get_sql_object($sqll);

        return $id_parent_res->niveau;
    }

/*--------------------------------------*/
     public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }
     public function getOrdre()
    {
        return $this->ordre;
    }


/*--------------------------------------*/
      public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
    
     public function getContenu()
    {
        return $this->contenu;
    }
     
/*----------------------------------------------------------------------------*/
   public function getId_lang()
    {
        return $this->id_lang;
    }
    public function setId_lang($id_lang)
    {
        $this->id_lang = $id_lang;
    }
    
    
/*-----------------------------------------------------------------------------------------------------*/
 

    
    
    
     //le page a une page mère ou Non
    public  function getPagess(){
        $categories = new categorie(WebTools::fromRequest('id'));
        
        $sqll = "select nom from categorie where id = '".$categories->getId_parent()."'";
//        var_dump(DB::query($sql));exit;
        if(DB::get_sql_object($sqll)== NULL){
            return "Pas de catégorie mère";
        }else{
           return DB::get_sql_object($sqll)->nom;
        }
            
    }
     //le nembre de(s) page(s) dans la base de donné
    public  function getNpage(){
        $sql = "select count(*) AS nb from categorie";
//        var_dump(DB::query($sql));exit;
        return DB::get_sql_object($sql);
         
    } 
     public  function getAllExcpMe(){

         $rsu = DB::get_sql_tab("select * from categorie WHERE id !=".$this->id." AND id_lang='".$_SESSION["langue"]."'");
         return $rsu;
        
     }
     
    public static function getnomcat($id){
        $sql = "select nom from categorie where id='".$id."'";
//        var_dump(DB::query($sql));exit;
        return DB::get_sql_object($sql);
         
    } 
}