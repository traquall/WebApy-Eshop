<?php
namespace Noneslad\Tools\HTML;

use Noneslad\Tools\tools;

class html {

    /**
     * Elements DOM de Base
     */
    
    //DOCTYPE
    public function doctype_html5() {
        echo '<!DOCTYPE html>'. "\n";
    }

    //BALISE HTML
    public function open_html($attributs = array()) {
        $r = '<html';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        echo $r;
    }
    public function close_html() {
        echo '</html>'. "\n";
    }

    //BALISE HEAD
    public function open_head() {
        echo '<head>'. "\n";
    }
    public function close_head() {
        echo '</head>'. "\n";
    }

    //BALISE BODY
    public function open_body($attributs = array()) {
        $r = '<body';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '>' . "\n";
        echo $r;
    }
    public function close_body() {
        echo '</body>'. "\n";
    }

    /**
     * Element du Head
     */
    
    //CSS
    public function link($rel, $href, $type, $media = null) {
        $media != null ? $media = 'media = "' . $media . '"' : $media = "";
        echo '<link rel = "' . $rel . '" href = "' . $href . '" type = "' . $type . '" ' . $media . '/>' . "\n";
    }
    public function css($href) {
        self::link('stylesheet', $href, 'text/css');
    }

    //JS
    public function script($src, $type, $code = null) {
        if ($code != null) {
            echo '<script type = "' . $type . '" src = "' . $src . '">' . $code . '</script>' . "\n";
        } else {
            echo '<script type = "' . $type . '" src = "' . $src . '"></script>' . "\n";
        }
    }
    public function js($src) {
        self::script($src, 'text/javascript');
    }
    public function get_script($src, $type, $code = null) {
        if ($code != null) {
            $r = '<script type = "' . $type . '" src = "' . $src . '">' . $code . '</script>' . "\n";
        } else {
            $r = '<script type = "' . $type . '" src = "' . $src . '"></script>' . "\n";
        }
        return $r;
    }
    public function code_js($code, $src = '', $type = 'text/javascript') {
        self::script($src, $type, $code);
    }
    public function get_code_js($code, $src = '', $type = 'text/javascript') {
        return self::get_script($src, $type, $code);
    }

    //METAS
    public function title_page($text) {
        echo '<title>' . $text . '</title>' . "\n";
    }
    public function edit_meta_type($f_content = "text/html", $f_charset = "iso-8859-1") {
        if ($f_content != '') {
            if ($f_charset != '') {
                echo '<meta http-equiv = "content-type" content = "' . $f_content . '; charset = ' . $f_charset . '"/>' . "\n";
            } else {
                echo '<!-- La balise  "http-equiv -> content-type" n\'a pas été renseignée correcetement, il manque l\'url de raffraichissement -->' . "\n";
            }
        } else {
            echo '<!-- La balise  "http-equiv -> content-type" n\'a pas été renseignée. -->' . "\n";
        }
    }
    public function edit_meta_description($f_content) {
        if ($f_content != '') {
            echo
            '<meta name = "description" content = "' . $f_content . '"/>' . "\n";
        } else {
            echo
            '<!-- La balise  "description" n\'a pas été renseignée.  Balise pourtant importante pour le réferencement !!!-->' . "\n";
        }
    }

    /**
     * Element du Body
     */
    
    //BALISE BR
    public function br($nb_br = 1) {
        $r = "";
        for ($i = 0; $i < $nb_br; $i++) {
            $r .= '<br />' . "\n";
        }
        echo $r;
    }
    public function get_br($nb_br = 1, $attributs = array()) {
        $r = "";
        for ($i = 0; $i < $nb_br; $i++) {
            $r .= '<br';
            if (!empty($attributs)) {
                foreach ($attributs as $k => $v) {
                    $r .= ' ' . $k . ' = "' . $v . '"';
                }
            }
            $r .= '/>' . "\n";
        }
        return $r;
    }

    //Espace insécable
    public function sp($nb_sp = 1) {
        $r = "";
        for ($i = 0; $i < $nb_sp; $i++) {
            $r .= '&nbsp;';
        }
        echo $r;
    }
    public function get_sp($nb_sp = 1) {
        $r = "";
        for ($i = 0; $i < $nb_sp; $i++) {
            $r .= '&nbsp;';
        }
        return $r;
    }
    
    //BALISE H1 à H6
    public function heading($level, $text, $attributs = array()) {
        $r = "";
        $r.= '<h' . $level;
        if (!empty($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>';
        $r .= $text;
        $r .= '</h' . $level . '>'. "\n";
        return $r;
    }

    //BALISE H1
    public function h1($text, $attributs = array()) {
        echo self::heading(1, $text, $attributs);
    }
    public function get_h1($text, $attributs = array()) {
        return self::heading(1, $text, $attributs);
    }

    //BALISE H2
    public function h2($text, $attributs = array()) {
        echo self::heading(2, $text, $attributs);
    }
    public function get_h2($text, $attributs = array()) {
        return self::heading(2, $text, $attributs);
    }

    //BALISE H3
    public function h3($text, $attributs = array()) {
        echo self::heading(3, $text, $attributs);
    }
    public function geth3($text, $attributs = array()) {
        return self::heading(3, $text, $attributs);
    }

    //BALISE H4
    public function h4($text, $attributs = array()) {
        echo self::heading(4, $text, $attributs);
    }
    public function get_h4($text, $attributs = array()) {
        return self::heading(4, $text, $attributs);
    }

    //BALISE H5
    public function h5($text, $attributs = array()) {
        echo self::heading(5, $text, $attributs);
    }
    public function get_h5($text, $attributs = array()) {
        return self::heading(5, $text, $attributs);
    }

    //BALISE H6
    public function h6($text, $attributs = array()) {
        echo self::heading(6, $text, $attributs);
    }
    public function get_h6($text, $attributs = array()) {
        return self::heading(6, $text, $attributs);
    }

    /**
     * Element Html de contenant
     */
    
    //BALISE DIV
    public function open_div($attributs = array()) {
        $r = "";
        $r .= '<div';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>' . "\n";
        echo $r;
    }
    public function get_open_div($attributs = array()) {
        $r = "";
        $r .= '<div';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>' . "\n";
        return $r;
    }
    public function close_div() {
        echo '</div>' . "\n";
    }
    public function get_close_div() {
        return '</div>' . "\n";
    }
    public function div($text, $attributs = array()) {
        $r = $this->open_div($attributs);
        $r .= $text;
        $r .= '</div>' . "\n";
        echo $r;
    }
    public function get_div($text, $attributs = array()) {
        $r = "";
        $r .= '<div';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>';
        $r .= $text;
        $r .= '</div>' . "\n";
        return $r;
    }

    //BALISE P
    public function open_p($attributs = array()) {
        $r = "";
        $r .='<p';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>' . "\n";
        echo $r;
    }
    public function get_open_p($attributs = array()) {
        $r = "";
        $r .='<p';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>' . "\n";
        return $r;
    }
    public function close_p() {
        echo '</p>' . "\n";
    }
    public function get_close_p() {
        return '</p>' . "\n";
    }
    public function p($text, $attributs = array()) {
        $r = "";
        $r .= self::get_open_p($attributs);
        $r .= $text;
        $r .= self::get_close_p();
        echo $r;
    }
    public function get_p($text, $attributs = array()) {
        $r = "";
        $r .= self::get_open_p($attributs);
        $r .= $text;
        $r .= self::get_close_p();
        return $r;
    }

    //BALISE SPAN
    public function open_span($attributs = array()) {
        $r = "";
        $r .= '<span';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>' . "\n";
        echo $r;
    }
    public function get_open_span($attributs = array()) {
        $r = "";
        $r .= '<span';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>' . "\n";
        return $r;
    }
    public function close_span() {
        echo '</span>' . "\n";
    }
    public function get_close_span() {
        return '</span>' . "\n";
    }
    public function span($text, $attributs = array()) {
        $r = "";
        $r .= self::get_open_span($attributs);
        $r .= $text;
        $r .= self::get_close_span();
        echo $r;
    }
    public function get_span($text, $attributs = array()) {
        $r = "";
        $r .= self::get_open_span($attributs);
        $r .= $text;
        $r .= self::get_close_span();
        return $r;
    }
    
    //BALISE SMALL
    public function small($text, $attributs = array()) {
        $r = "";
        $r .= '<small';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>';
        $r .= $text;
        $r .= '</small>'. "\n";
        echo $r;
    }
    public function get_small($text, $attributs = array()) {
        $r = "";
        $r .= '<small';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>';
        $r .= $text;
        $r .= '</small>'. "\n";
        return $r;
    }

    /**
     * Elements de liste
     */
    
    //BALISE UL
    public function open_ul($attributs = array()) {
        $r = "";
        $r .= '<ul';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        echo $r;
    }
    public function close_ul() {
        echo '</ul>'. "\n";
    }
    public function get_close_ul() {
        return '</ul>'. "\n";
    }
    public function get_open_ul($attributs = array()) {
        $r = "";
        $r .= '<ul';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        return $r;
    }

    //BALISE LI
    public function open_li($attributs = array()) {
        $r = "";
        $r .= '<li';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        echo $r;
    }
    public function get_open_li($attributs = array()){
        $r = "";
        $r .= '<li';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        return $r;
    }
    public function close_li() {
        echo '</li>'. "\n";
    }
    public function get_close_li(){
        return '</li>'. "\n";
    }
    public function li($text, $attributs = array()) {
        $r = "";
        $r .= '<li';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        $r .= $text;
        $r .= '</li>'. "\n";
        echo $r;
    }
    public function get_li($text, $attributs = array()) {
        $r = "";
        $r .= '<li';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        $r .= $text;
        $r .= '</li>'. "\n";
        return $r;
    }

    
    /**
     * Element Images
     */
    
    //BALISE IMG
    public function img($attributs = array()) {
        $r = "";
        $r .= '<img';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        echo $r;
    }
    public function get_img($attributs = array()) {
        $r = "";
        $r .= '<img';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        return $r;
    }

   
    /**
     * Element Liens 
     */
    
    //BALISE A
    public function get_lien($href, $text, $attributs = array()) {
        $html = new html();
        $r = "";
        $r .= '<a href = "' . $href . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>'. "\n";
        $r .= $text;
        $r .= '</a>'. "\n";
        return $r;
    }
    public function lien($href, $text, $attributs = array()) {
        $r = "";
        $r .= '<a href = "' . $href . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                $r .= ' ' . $k . ' = "' . $v . '"';
            }
        }
        $r .= '>'. "\n";
        $r .= $text;
        $r .= '</a>'. "\n";
        echo $r;
    }
    public function a($text, $attributs = array()) {
        $r = "";
        $r .= '<a';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        $r .= $text;
        $r .= '</a>'. "\n";
        echo $r;
    }
    public function get_a($text, $attributs = array()) {
        $r = "";
        $r .= '<a';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>'. "\n";
        $r .= $text;
        $r .= '</a>'. "\n";
        return $r;
    }

    //Button
    public function boutonLien2($text,$href,$type){
        echo '<a href = "'.$href.'" class = "btn btn-'.$type.'">'.$text.'</a>'. "\n";
    }
    public function boutonLien($text,$href,$type,$taille=null){
        echo '<a href = "'.$href.'" class = "btn btn-'.$type.'" style="width:'.$taille.'px;">'.$text.'</a>'. "\n";
    }
    public function boutonLienDisabled($text,$href,$type,$taille=null){
        echo '<a href = "'.$href.'" class = "btn btn-'.$type.'" disabled="disabled" style="width:'.$taille.'px;">'.$text.'</a>'. "\n";
    }
    public function bouton($text, $attributs = array()) {
        $r = "";
        $r .= '<input type = "button" value = "' . $text . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        echo $r;
    }
    public function get_bouton($text, $attributs = array()) {
        $r = "";
        $r .= '<input type = "button" value = "' . $text . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>'. "\n";
        return $r;
    }

    /**
     * Elements de débug 
     */
    public function none_form_info($text, $item) {
        $html = new html();
        $form = new none_form();
        $form->debut_fieldset(array('class' => 'fieldset_euroc text_left'));
        $html->h1($text . ' : ', array('class' => 'titre_euroc2 '));

        var_dump($item);

        $form->fin_fieldset();
    }
    public function vard($text, $var) {
        $html = new html();

        $html->open_div(array('style' => 'border : 2px solid darkgray;text-align:left;'));
        $html->span($text, array('style' => 'font-weight : bold;font-style:italic;color: #F34938'));
        $html->open_div();
        var_dump($var);
        $html->close_div();
        $html->close_div();
    }
    public function get_vard($text, $var) {
        $html = new html();

        $r = $html->get_open_div(array('style' => 'border : 2px solid darkgray;text-align:left;'));
        $r.= $html->get_span($text, array('style' => 'font-weight : bold;font-style:italic;color: #F34938'));
        $r.= $html->get_open_div();
        $r.= var_export($var, true);
        $r.= $html->get_close_div();
        $r.= $html->get_close_div();
        return $r;
    }
    public function var_dump_none($all = 0) {
        $html = new html();
        $html->open_div(array('class' => 'form_container_euroc', 'style' => 'padding : 15px'));
        $html->h1('Données envoyées : ', array('class' => 'titre_euroc'));
        $html->open_div(array('class' => 'form_container_euroc text_left', 'style' => 'padding : 15px'));
        $html->open_div();
        $html->none_form_info('$_GET', $_GET);
        $html->none_form_info('$_POST', $_POST);
        if ($all > 0) {
            $html->none_form_info('$_FILES', $_FILES);
        }
        if ($all > 1) {
            if (isset($_SESSION)) {
                $html->none_form_info('$_SESSION', $_SESSION);
            }
            $html->none_form_info('$_REQUEST', $_REQUEST);
        }
        if ($all > 2) {
            $html->none_form_info('$_COOKIE', $_COOKIE);
            $html->none_form_info('$_SERVER', $_SERVER);
            $html->none_form_info('$_ENV', $_ENV);
        }
        $html->close_div();

        $html->close_div();
        $html->br();
        $html->bouton_retour();
        $html->br();
        $html->close_div();
    }

    /**
     * Exemple d'élement d'affichage bootstrap
     */
    public function alert($text, $type = 'info') {
        $this->p($text, array('class' => 'margin_l_10 margin_t_10 alert alert-' . $type));
    }
    public function alertDanger($text, $type = 'danger') {
        $this->alert($text, $type);
    }
    public function alertSuccess($text, $type = 'success') {
        $this->alert($text, $type);
    }
    public function alertWarning($text, $type = 'warning') {
        $this->alert($text, $type);
    }

    /**
     * Element contenant du JS
     */
    public function bouton_retour() {
        echo '<form style = "display : inline"><input type="button" value="Retour" onclick="history.back()"></form>' . "\n";
    }
    public function bouton_retour_style() {
        echo '<form style = "display : inline"><input type="button" value="Retour" class = "button_gen_ge" onclick="history.back()"></form>' . "\n";
    }
    public function get_bouton_retour_style() {
        return '<form style = "display : inline"><input type="button" value="Retour" class = "button_gen_ge" onclick="history.back()"></form>' . "\n";
    }
    public function get_bouton_retour() {
        return '<form style = "display : inline"><input type="button" value="Retour" onclick="history.back()"></form>' . "\n";
    }
    public function get_bouton_fermer() {
        return '<form style = "display : inline"><input type="button" value="Fermer" onclick="window.close()"></form>' . "\n";
    }
    public function bouton_fermer() {
        echo '<form style = "display : inline"><input type="button" value="Fermer" onclick="window.close()"></form>' . "\n";
    }

    

    public function open_panel($titre,$type){
        $this->open_div(array('class'=>'panel panel-'.$type));
        $this->open_div(array('class'=>'panel-heading'));
        $this->h3($titre, array('class'=>'panel-title'));
        $this->close_div();
        $this->open_div(array('class'=>'panel-body'));
    }
    public function close_panel(){
        $this->close_div();
        $this->close_div();
    }
    
    public function media($titre,$comment,$lien,$image = IMG_ICON_PDF,$width = '40px'){
        $this->open_div(array('class' => 'media'));
            $this->open_div(array('class' => 'media-left'));
                $this->a($this->get_img(array('src' => $image, 'width' => $width)), array('href' => $lien,'target'=>'_blank'));
            $this->close_div();
            $this->open_div(array('class' => 'media-body'));
                $this->h4($titre, array('class' => 'media-heading'));
                $this->p($comment);
            $this->close_div();
        $this->close_div();
    }
    public function mediaPDF($titre,$comment,$lien){
        $this->media($titre, $comment, $lien );
    }
    public function mediaVideo($titre,$comment,$lien){
        $this->media($titre, $comment, $lien, IMG_ICON_VIDEO);
    }
    
    
    public function u8($data){
        return utf8_encode($data);
    }
}

function toggle_color($test, $color1 = '#D8D8D8', $color2 = '#E8E8E8') {
    return $test == $color1 ? $color2 : $color1;
}


?>