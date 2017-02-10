<?php

namespace Noneslad\Entity;

use Noneslad\Tools\WebTools;
use Noneslad\Tools\DB\model;
use Noneslad\Tools\DB\model as DB;
class document extends model

{
    protected $id;
    protected $nom;
    protected $ext;
    protected $url;
    protected $cat;
    protected $id_lang;
    protected $date_c;
    protected $date_m;
 

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
    /*--------------------------------*/
   
    public function getNom()
    {
        return $this->nom;
    }
     public function setNom($nom)
    {
        $this->nom = $nom;
    }
    /*--------------------------------*/
    public function getExt()
    {
        return $this->ext;
    }
    public function setExt($ext)
    {
        $this->ext = $ext;
    }
    
    /*--------------------------------*/
     public function getDate_c()
    {
        return $this->date_c;
    }
     public function setDate_c($date_c)
    {
        $this->date_c = $date_c;
    }
/*--------------------------------*/
 public function getDate_m()
    {
        return $this->date_m;
    }
     public function setDate_m($date_m)
    {
        $this->date_m = $date_m;
    }
/*--------------------------------*/
 public function getId_lang()
    {
        return $this->id_lang;
    }
     public function setId_lang($id_lang)
    {
        $this->id_lang = $id_lang;
    }
/*--------------------------------*/
    public function upload($term) {
        $dest = EXT_UPLOAD_DIR . $_FILES[$term]['name'];
        move_uploaded_file($_FILES[$term]['tmp_name'], $dest);
        $dest = $_FILES[$term]['name'];
        return $dest;
    }
    function setUrl ($term) {
        $this->url = $this->upload($term);
    }
     public function getUrl()
    {
        return $this->url;
    }
    /*--------------------------------*/
    public function getCat()
    {
        return $this->cat;
    }
    public function setCat($cat)
    {
        $this->cat = $cat;
    }
    /*------------------------------------------*/
       //le page a une page mère ou Non
    public  function getPagess(){
        $documenta = new document(WebTools::fromRequest('id'));
        
        $sqll = "select nom from document where id = '".$documenta->getId_parent()."'";
//        var_dump(DB::query($sql));exit;
        if(DB::get_sql_object($sqll)== NULL){
            return "Pas de page mère";
        }else{
           return DB::get_sql_object($sqll)->nom;
        }
            
    }
     //le nembre de(s) page(s) dans la base de donné
    public  function getNpage($id_parent){
        $sql = "select count(*) AS nb from document WHERE id_parent=".('id_parent');
//        var_dump(DB::query($sql));exit;
        return DB::get_sql_object($sql);
         
    } 
    
  
}