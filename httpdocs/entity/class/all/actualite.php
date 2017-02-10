<?php

namespace Noneslad\Entity;

use Noneslad\Tools\WebTools;
use Noneslad\Tools\DB\model;
use Noneslad\Tools\DB\model as DB;
class article extends model
{
    protected $id;
    protected $id_lang;
    protected $text;
    protected $titre;
    protected $date;
    protected $affichage;
    /**
     * article constructor.
     * @param $id
     */
    public function __construct($id = false)
    {
        parent::__construct();
        if($id !== false){
            $this->id = $id;
            $this->load();
        }
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
     

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
     public function setId_lang($id_lang)
    {
        $this->id_lang = $id_lang;
    }
     public function getId_lang()
    {
        return $this->id_lang;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }
    public function getTitre()
    {
        return $this->titre;
    }
     public function getDate()
    {
        return $this->date;
    }
     public function getAffichage()
    {
        return $this->affichage;
    }

    /**
     * @param mixed $nom
     */
    public function setText($text)
    {
        $this->text = $text;
    }
     public function setTitre($titre)
    {
        $this->titre = $titre;
    }
   
    
     public function setAffichage($affichage)
    {
        $this->affichage = $affichage;
    }
     public function setDate($date)
    {
        $this->date = $date;
    }

     //le page aficher ou non
    public  function etat(){
        $article = new article(WebTools::fromRequest('id'));
        if($article->getAffichage() == 1){
            return"Oui";
        }else{
            return"Non";
        }
    }    
     public  function getAllExcpMe(){

         $rsu = DB::get_sql_tab("select * from article WHERE id !=".$this->id);
         return $rsu;
        
     }
    
}