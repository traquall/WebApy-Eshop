<?php

namespace Noneslad\Tools\DB;
use PDO;

/**
 * Description de model
 * Classe d'abstration à la base de donnée une sorte de petit ORM<br/>
 * En mettant une classe en extends de celle ci, on peut interagir avec la base de donnés sur les attributs des objets<br/>
 *
 */
class model {

    private $cnx;

    function __construct() {
        try {
            $this->cnx = new PDO('mysql:host=' . PARAM_hote . ';port=' . PARAM_port . ';dbname=' . PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe, array(PDO::ATTR_PERSISTENT => true));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function insert(){
        $sql = "insert into ".$this->removeNamespace(get_class($this))." (";
        foreach (get_object_vars($this) as $key => $value) {
            if($key != 'cnx'){
                $sql.= ' `'.$key.'`,';
            }
        }
        $sql = substr($sql, 0,-1).") values (";
        foreach (get_object_vars($this) as $key => $value) {
            if($key != 'cnx'){
                $sql.= ' :'.$key.',';
            }
        }
        $sql = substr($sql, 0,-1).');';
        $rq = $this->cnx->prepare($sql);
        $tab_data =  array();
        foreach (get_object_vars($this) as $key => $value) {
            if($key != 'cnx'){
                $tab_data[':'.$key]= $value != null ? $this->escape($value):$value;
            }
        }
        try {
            $rq->execute($tab_data);
            $this->id = $this->cnx->lastInsertId();
            $rq->errorCode() > 0 ? var_dump($rq->errorInfo()) : '';
        }
        catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function update(){
        $sql = "update ".$this->removeNamespace(get_class($this))." set ";
        foreach (get_object_vars($this) as $key => $value) {
            if($key != 'cnx'){
                if($value != null){
                    $sql.= $key." = :".$key.',';
                }
            }
        }
        $sql = substr($sql, 0,-1)." where id = ".$this->getId();
        $rq = $this->cnx->prepare($sql);
        $tab_data =  array();
        foreach (get_object_vars($this) as $key => $value) {
            if($key != 'cnx'){
                if($value != null){
                    $tab_data[':'.$key]= $this->escape($value);
                }
            }
        }
        $rq->execute($tab_data);
        if($rq->errorCode() > 0){
            var_dump($rq->errorInfo());
            echo "\n".$sql;
        }

    }
    public function select($champs = array(), $where = array(), $all = null) {
        $sql = "select ";
        if (is_array($champs) && !empty($champs)) {//si champs n'est pas vide
            $sql.= 'id,';
            foreach ($champs as $un_champ) { // pour chacun des champs
                if (array_key_exists($un_champ, get_object_vars($this))) {// si le champ fait bien partie des attributs de l'objet en cours
                    $sql.= $un_champ . ","; // on les rajoute à la liste des champs à séléctionner
                }
            }
            $sql = substr($sql, 0, -1); // on vire la virgule de fin
        } else {
            $sql.= "* "; //sinon on prend tout !
        }
        $sql.= "from " . $this->removeNamespace(get_class($this)); // dans la table de l'objet en cours
        $text_where = "";
        if (is_array($where) && !empty($where)) { // si le champ where est rempli
            $text_where .= " where "; // on ajoute le mot clé where
            foreach ($where as $champs => $valeur) { // et pour chacun des éléments where
                if (array_key_exists($champs, get_object_vars($this))) { // si le champ sur lequel porte la condition est bien un attribut de l'objet
                    $text_where .= $champs . " = '" . $valeur . "' and"; // on rajoute cette condition et le mot clé 'and' !! todo choisir entre and et or
                }else{
                    var_dump(get_object_vars($this));
                }
            }
            $text_where = substr($text_where, 0, -3); // on vire le dernier AND
        }
        elseif ($all == null) { // sinon si le champs all est à null c'est que l'on ne veut pas tout
            $text_where = " where id = " . $this->getId(); // bin l'id de l'objet !
        }
        $sql.= $text_where;
        $retour = array();
//        var_dump($sql);
        try {
            $rq = $this->cnx->query($sql);
            $rq->errorCode() > 0 ? var_dump($rq->errorInfo()) : '';
            while ($res = $rq->fetchObject()) {
                $retour[$res->id] = $res;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
//        var_dump($retour);exit;
        return $retour;
    }

    public function selectOne($champs = array(), $where = array(), $all = null) {
        $sql = "select ";
        if (is_array($champs) && !empty($champs)) {//si champs n'est pas vide
            $sql.= 'id,';
            foreach ($champs as $un_champ) { // pour chacun des champs
                if (array_key_exists($un_champ, get_object_vars($this))) {// si le champ fait bien partie des attributs de l'objet en cours
                    $sql.= $un_champ . ","; // on les rajoute à la liste des champs à séléctionner
                }
            }
            $sql = substr($sql, 0, -1); // on vire la virgule de fin
        } else {
            $sql.= "* "; //sinon on prend tout !
        }
        $sql.= "from " . $this->removeNamespace(get_class($this)); // dans la table de l'objet en cours
        $text_where = "";
        if (is_array($where) && !empty($where)) { // si le champ where est rempli
            $text_where .= " where "; // on ajoute le mot clé where
            foreach ($where as $champs => $valeur) { // et pour chacun des éléments where
                if (array_key_exists($champs, get_object_vars($this))) { // si le champ sur lequel porte la condition est bien un attribut de l'objet
                    $text_where .= $champs . " = '" . $valeur . "' and"; // on rajoute cette condition et le mot clé 'and' !! todo choisir entre and et or
                }else{
                    var_dump(get_object_vars($this));
                }
            }
            $text_where = substr($text_where, 0, -3); // on vire le dernier AND
        }
        elseif ($all == null) { // sinon si le champs all est à null c'est que l'on ne veut pas tout
            $text_where = " where id = " . $this->getId(); // bin l'id de l'objet !
        }
        $sql.= $text_where;
        $retour = array();
//        var_dump($sql);
        try {
            $rq = $this->cnx->query($sql);
            $rq->errorCode() > 0 ? var_dump($rq->errorInfo()) : '';
            while ($res = $rq->fetchObject()) {
                $retour = $res;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
//        var_dump($retour);exit;
        return $retour;
    }


    public function delete(){
        return $this->cnx->query("delete from ".$this->removeNamespace(get_class($this))." where id = ".$this->getId());
    }
    public function occurence_exist() {
        $sql = "select id from " . get_class($this) . " where id = ".$this->getId();
        $rq = $this->cnx->query($sql);
        return $rq->fetchObject();
    }
    public function save() {
        if (!$this->occurence_exist()) {
            $this->insert();
        } else {
            $this->update();
        }
    }
    public function find_all() {
        return $this->select(null, null, 'all');
    }
    public function find($champs = array()) {
        return $this->select($champs);
    }
    public function findBy($where) {
        return $this->select(null,$where);
    }

    public function findOneBy($where) {
        return $this->selectOne(null,$where);
    }

    public function load($champs = array()) {

        $donnees = $this->find($champs);
        foreach ($donnees as $une_occurence) {
            foreach ($une_occurence as $champ => $valeur) {
                $this->$champ = stripcslashes(($valeur));
            }
        }
    }
    public function escape($data) {
        switch (gettype($data)) {
            case 'string':

                $data = $data == 'null' ? null : self::mysql_escape_input($data);
                break;
            case 'boolean':
                $data = (int) $data;
                break;
            case 'double':
                $data = sprintf('%F', $data);
                break;
            default:
                $data = ($data === null) ? 'null' : $data;
        }

        return (string) $data;
    }
    public function __toString() {

        $html = new html();
        $r = "";
        $r .= $html->get_open_div(array('class' => 'border_1_s_b border_radius_25 width_800px pad_25'));
        $r .= $html->get_p($html->get_span(strtoupper(get_class($this)) . ' :: ', array('class' => 'color_tomato font_size_up float_l')) . $html->get_span($html->get_span('table : ', array('class' => 'font_size_down color_gray italic')) . $this->getSql_table() . $html->get_br() . $html->get_span('id : ', array('class' => 'font_size_down color_gray italic')) . $this->getSql_id(), array('class' => 'float_r')));
        $r .= $html->get_div('', array('class' => 'clear'));
        foreach (get_object_vars($this) as $champ => $valeur) {

            if (!in_array($champ, $this->sql_no_bd)) {
                if (is_object($valeur)) {
                    krumo($valeur);
                } else {
                    $r.= $html->get_p($champ . $html->get_sp(8) . ' => ' . $html->get_sp(8) . $html->get_span($valeur, array('class' => 'color_vert_pomme')) . $html->get_sp(8) . $html->get_span(gettype($valeur), array('class' => 'italic font_size_down color_bleu_fonce')), array('class' => 'margin_t_5_off'));
                }
            }
        }
        $r .= $html->get_close_div();
        return $r;
    }
    public function removeNamespace($name){
        $pos = strrpos($name, '\\');
        if($pos===false) {
            return $name;
        } else {
            return substr($name, $pos+1);
        }
    }

    // Tricky
    public static function get_sql_object($la_requete) {
        $cnx = new PDO('mysql:host=' . PARAM_hote . ';port=' . PARAM_port . ';dbname=' . PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe, array(PDO::ATTR_PERSISTENT => true));
        $rq = $cnx->query($la_requete);
        return $rq->fetchObject();
    }
    public static function query($la_requete) {
        $cnx = new PDO('mysql:host=' . PARAM_hote . ';port=' . PARAM_port . ';dbname=' . PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe, array(PDO::ATTR_PERSISTENT => true));
        $rq = $cnx->query($la_requete);
        $cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        if(gettype($rq) == "boolean")
            return true;
        return $rq->fetchAll();
    }
    public static function get_sql_tab($la_requete) {
        $cnx = new PDO('mysql:host=' . PARAM_hote . ';port=' . PARAM_port . ';dbname=' . PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe, array(PDO::ATTR_PERSISTENT => true));
        $rq = $cnx->query($la_requete);
        $rq->setFetchMode(PDO::FETCH_ASSOC);
        $tab_retour = array();
        while ($res = $rq->fetch()) {
            $tab_retour[] = $res;
//            $html = new html();
//            $html->vard('le res requete',$res);
        }
        return $tab_retour;
    }
    public static function mysql_escape_input($value) {
        if ((!is_null($value)) && strlen($value) > 0) {
            $retval = $value;
            $retval = Htmlentities($value);
            if (get_magic_quotes_gpc())
                $retval = stripslashes($retval);
//      $retval = mysql_real_escape_string($retval);
            $retval = html_entity_decode($retval);
        } else
            $retval = $value;
        return $retval;
    }
    public static function exec_sql($sql) {
        $cnx = new PDO('mysql:host=' . PARAM_hote . ';port=' . PARAM_port . ';dbname=' . PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe, array(PDO::ATTR_PERSISTENT => true));
        $rq = $cnx->exec($sql);
        return $rq;
    }

}