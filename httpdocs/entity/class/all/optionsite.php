<?php

namespace Noneslad\Entity;
use Noneslad\Tools\DB\model as DB;
use Noneslad\Tools\WebTools;

class optionsite_en  extends DB {

    protected $id;
    protected $heurevisite;
    protected $heureabonne;
    protected $tel;
    protected $keywords;
    protected $text;
    protected $lienf;
    protected $lieng;
    protected $lient;
    protected $logo;
    protected $actu;

    /**
     * PageWeb constructor.
     * @param $id
     */
    public function __construct($id = false) {
        parent::__construct();
        if ($id !== false) {
            $this->id = $id;
            $this->load();
        }
    }

    public function getId() {
        return $this->id;
    }

    function getText() {
        return $this->text;
    }

    function setText($text) {
        $this->text = $text;
    }
     function setActu($actu) {
        $this->actu = $actu;
    }

    public function getHeurevisite() {
        return $this->heurevisite;
    }

    public function setHeurevisite($heurevisite) {
        $this->heurevisite = $heurevisite;
    }

    public function getHeureabonne() {
        return $this->heureabonne;
    }

    public function setHeureabonne($heureabonne) {
        $this->heureabonne = $heureabonne;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    function getLienf() {
        return $this->lienf;
    }
     function getActu() {
        return $this->actu;
    }

    function getLieng() {
        return $this->lieng;
    }

    function getlient() {
        return $this->lient;
    }

    function setLienf($lienf) {
        $this->lienf = $lienf;
    }

    function setLieng($lieng) {
        $this->lieng = $lieng;
    }

    function setlient($lient) {
        $this->lient = $lient;
    }

    function getLogo() {
        return $this->logo;
    }

    public function upload($term) {

        $dest = UPLOAD_DIR . $_FILES[$term]['name'];
        move_uploaded_file($_FILES[$term]['tmp_name'], $dest);
        return $dest;
    }
    function setLogo ($term) {
        $this->logo = $this->upload($term);
    }

   

}
