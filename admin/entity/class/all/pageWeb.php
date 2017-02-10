<?php

namespace Noneslad\Entity;

use Noneslad\Tools\WebTools;
use Noneslad\Tools\DB\model;
use Noneslad\Tools\DB\model as DB;
class pageweb extends model
{
    protected $id;
    protected $id_lang;
    protected $nom;
    protected $title;
    protected $contenu;
    protected $descripion;
    protected $rewrite;
    protected $ordre;
    protected $id_parent;
    protected $menu;
    protected $slide;

    /**
     * pageweb constructor.
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
    public function getId_lang()
    {
        return $this->id_lang;
    }
     public function getId_parent()
    {
        return $this->id_parent;
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
     public function setId_parent($id_parent)
    {
        $this->id_parent = $id_parent;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }
    public function getMenu()
    {
        return $this->menu;
    }
     public function getOrdre()
    {
        return $this->ordre;
    }
     public function getRewrite()
    {
        return $this->rewrite;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
     public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }
    public function setMenu($menu)
    {
        $this->menu = $menu;
    }
    
    public function setRewrite($rewrite)
    {
        $this->rewrite = $rewrite;
    }
        public function upload($term) {

        $dest = UPLOAD_DIR . $_FILES[$term]['name'];
        move_uploaded_file($_FILES[$term]['tmp_name'], $dest);
        return $dest;
    }
    function setSlide ($term) {
        $this->slide = $this->upload($term);
    }


    /**
     * @return mixed
     */
     public function getSlide()
    {
        return $this->slide;
    }
    public function getTitle()
    {
        return $this->title;
    }
     public function getContenu()
    {
        return $this->contenu;
    }
     public function getDescripion()
    {
        return $this->descripion;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
     public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
     public function setDescripion($descripion)
    {
        $this->descripion = $descripion;
    }

 //le Rewrite lien changer le caracter maj par min etc
     public function nf_urlencode($LIBELLE, $SEPARATEUR = '-'){
        $LIBELLE = strtr((strip_tags($LIBELLE)),'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYeaaaaceeeeiiiioooooouuuuae');
        return strtolower(preg_replace('/([^a-z0-9]+)/i', $SEPARATEUR, $LIBELLE));
    }

     //le page aficher ou non
    public  function etat(){
        $pageweb = new pageweb(WebTools::fromRequest('id'));
        if($pageweb->getMenu() == 1){
            return"Oui";
        }else{
            return"Non";
        }
    }
     //le page a une page mère ou Non
    public  function getPagess(){
        $pageweba = new pageweb(WebTools::fromRequest('id'));
        
        $sqll = "select nom from pageweb where id = '".$pageweba->getId_parent()."'";
//        var_dump(DB::query($sql));exit;
        if(DB::get_sql_object($sqll)== NULL){
            return "Pas de page mère";
        }else{
           return DB::get_sql_object($sqll)->nom;
        }
            
    }
     //le nembre de(s) page(s) dans la base de donné
    public  function getNpage($id_parent){
        $sql = "select count(*) AS nb from pageweb WHERE id_parent=".('id_parent');
//        var_dump(DB::query($sql));exit;
        return DB::get_sql_object($sql);
         
    } 
     public  function getAllExcpMe(){

         $rsu = DB::get_sql_tab("select * from pageweb WHERE id !=".$this->id);
         return $rsu;
        
     }
     public static function givPage($rewrite)
    {
       $sql = "SELECT * FROM pageweb WHERE rewrite = '".$rewrite."' AND menu = 1";
       if(WebTools::fromRequest('site'))
       return DB::get_sql_object($sql);
    }
}