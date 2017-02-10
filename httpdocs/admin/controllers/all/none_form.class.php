<?php

namespace Noneslad\Tools\HTML;


class none_form
{
    private $donnees;
    private $erreurs;
    private $name_form = 'formulaire';

    public function set($donnees)
    {
        $this->donnees = $donnees;
    }

    public function set_erreurs($erreurs)
    {
        $this->erreurs = $erreurs;
    }

    public function get_donnees()
    {
        return $this->donnees;
    }

    public function get_erreurs($champ)
    {
        $html = new html();
        if (isset($this->erreurs[$champ])) {
            return $html->get_span($this->erreurs[$champ], array('style' => 'margin-left : 15px; color : tomato;font-size:12px; font-style : italic;'));
        }
    }

    public function debut_form($action, $method = "POST", $attributs = array())
    {
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                if ($k == "name") {
                    $this->name_form = $v;
                }
            }
        }
        $r = '<form action = "' . $action . '" method = "' . $method . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '>' . "\n";
        echo $r;
    }

    public function get_debut_form($action, $method = "POST", $attributs = array())
    {
        if (is_array($attributs)) {
            foreach ($attributs as $k => $v) {
                if ($k == "name") {
                    $this->name_form = $v;
                }
            }
        }
        $r = '<form action = "' . $action . '" method = "' . $method . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '>' . "\n";
        return $r;
    }

    public function fin_form()
    {
        echo '</form>' . "\n";
    }

    public function get_fin_form()
    {
        return '</form>' . "\n";
    }

    public function legend($text, $attributs = array())
    {
        $r = "";
        $r .= '<legend';
        if (is_array($attributs) && !empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>';
        $r .= $text;
        $r .= '</legend>' . "\n";
        echo $r;
    }

    public function get_legend($text, $attributs = array())
    {
        $r = "";
        $r .= '<legend';
        if (is_array($attributs) && !empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>';
        $r .= $text;
        $r .= '</legend>' . "\n";
        return $r;
    }

    public function debut_fieldset($attributs = array())
    {
        $r = '';
        $r .= '<fieldset';
        if (is_array($attributs) && !empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>' . "\n";
        echo $r;
    }

    public function get_debut_fieldset($attributs = array())
    {
        $r = '';
        $r .= '<fieldset';
        if (is_array($attributs) && !empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>' . "\n";
        return $r;
    }

    public function fin_fieldset()
    {
        echo '</fieldset>' . "\n";
    }

    public function get_fin_fieldset()
    {
        return '</fieldset>' . "\n";
    }

    public function get_label($text, $attributs = array())
    {
        $r = "";
        $r .= '<label';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>' . $text . '</label>' . "\n";
        return $r;
    }

    public function label($text, $attributs = array())
    {
        $r = "";
        $r .= '<label';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>' . stripcslashes(mysql_real_escape_string($text)) . '</label>' . "\n";
        echo $r;
    }

    public function input($num_index, $champ, $label = null, $guideline = null, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index, 'class' => 'no_liste color_gris margin_b_15 font_size_down2 '));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description '));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "text" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>' . "\n";
        echo $r;
    }

    function get_input($num_index, $champ, $label = null, $guideline = null, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index, 'class' => 'no_liste color_gris margin_b_15 font_size_down2 '));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description margin_b_15'));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "text" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" ';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>' . "\n";
        return $r;
    }

    function get_input_simple($num_index, $champ, $label = null, $attributs = array())
    {
        $html = new html();
        $r = "";
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description margin_b_15'));
        }
        $r .= '<input type = "text" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" ';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $this->get_erreurs($champ);
        return $r;
    }

    function bouton_submit($texte, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= '<input type = "submit" value = "' . $texte . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        echo $r;
    }

    function get_bouton_submit($texte, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= '<input type = "submit" value = "' . $texte . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        return $r;
    }

    function bouton_reset($texte, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= '<input type = "reset" value = "' . $texte . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        echo $r;

    }

    function get_bouton_reset($texte, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= '<input type = "reset" value = "' . $texte . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        return $r;
    }

    function select($num_index, $champ, $guideline = null, $attributs = array(), $options, $label = null, $la_fenetre_a_ouvirir = null)
    {
        $html = new html();
        $selection = isset($this->donnees[$champ]) ? $this->donnees[$champ] : "";
        $r = '';
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<select name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = ' . '"' . $valeur . '"';
            }
        }
        $r .= '>';
        if (is_array($options)) {
            foreach ($options as $valeur => $affichage) {
                if ($valeur == $selection) {
                    $r .= '<option value = "' . $valeur . '" selected = "selected">' . $affichage . '</option>';
                } else {
                    $r .= '<option value = "' . $valeur . '">' . $affichage . '</option>';
                }
            }
        }
        $r .= '</select>';
        $r .= $la_fenetre_a_ouvirir != null ? $html->get_img(array('class' => 'margin_l_25', 'src' => '../img/suivre.png', 'onClick' => 'ouvrir_fenetre(\'' . $la_fenetre_a_ouvirir . '\')')) : '';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= $html->get_close_li();
        echo $r;
    }

    function select_facture_ge($num_index, $champ, $guideline = null, $attributs = array(), $options, $label = null, $la_fenetre_a_ouvirir = null)
    {
        $html = new html();
        $selection = isset($this->donnees[$champ]) ? $this->donnees[$champ] : "";
        $r = '';
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index, 'class' => 'no_liste'));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<select name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = ' . '"' . $valeur . '"';
            }
        }
        $r .= '>';
        if (is_array($options)) {
            $r .= '<option value = "nulle" selected = "selected" disabled>S�l�ctionner ici votre document des ventes</option>';
            foreach ($options as $valeur => $affichage) {
                $rajout_espace = 9 - strlen($affichage['doc_des_ventes_code']);
                $rajout_espace += 8;
                if ($valeur == $selection) {
                    $r .= '<option value = "' . $affichage['doc_des_ventes_code'] . '" selected = "selected" ><span class = "color_gris gras"><b>Facture n&deg; : ' . $affichage['doc_des_ventes_code'] . $html->get_sp($rajout_espace) . '</b></span><span class = "color_gris_fonce font_size_down"> du : ' . date::DateBdd2dateFr($affichage['doc_des_ventes_date']) . '</span></option>';
                } else {
                    $r .= '<option value = "' . $affichage['doc_des_ventes_code'] . '"><span class = "color_gris gras"><b>Facture n&deg; : ' . $affichage['doc_des_ventes_code'] . $html->get_sp($rajout_espace) . '</b></span><span class = "color_gris_fonce font_size_down"> du : ' . date::DateBdd2dateFr($affichage['doc_des_ventes_date']) . '</span></option>';
                }
            }
        }
        $r .= '</select>';
        $r .= $la_fenetre_a_ouvirir != null ? $html->get_img(array('class' => 'margin_l_25', 'src' => '../img/suivre.png', 'onClick' => 'ouvrir_fenetre(\'' . $la_fenetre_a_ouvirir . '\')')) : '';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= $html->get_close_li();
        echo $r;
    }

    /**
     *
     * @param int $num_index
     * @param string $champ
     * @param string $guideline
     * @param array $attributs
     * @param array $options
     * @param string $label
     * @param string $la_fenetre_a_ouvirir
     * @return type
     */
    function select_qte_ge($num_index, $champ, $guideline = null, $attributs = array(), $options, $label = null, $la_fenetre_a_ouvirir = null)
    {
        $html = new html();
        $selection = isset($this->donnees[$champ]) ? $this->donnees[$champ] : "";
        $r = '';
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index, 'class' => 'no_liste'));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<select name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = ' . '"' . $valeur . '"';
            }
        }
        $r .= '>';
        if (is_array($options)) {
            $r .= '<option value = "nulle" selected = "selected" disabled>D�faut</option>';
            foreach ($options as $valeur => $affichage) {
                $r .= '<option value = "' . $affichage['defaut_id'] . '"><span class = "color_gris gras">' . $affichage["defaut_libelle"] . '</span></option>';
            }
        }
        $r .= '</select>';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= $html->get_close_li();
        return $r;
    }

    function get_select_with_color_GE($num_index, $champ, $guideline = null, $attributs = array(), $options, $label = null, $premier_phrase = null, $la_fenetre_a_ouvirir = null)
    {
        $html = new html();
        $selection = isset($this->donnees[$champ]) ? $this->donnees[$champ] : "";
        $r = '';
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index, 'class' => 'no_liste'));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<select name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = ' . '"' . $valeur . '"';
            }
        }
        $r .= '>';
        if (is_array($options)) {
            $r .= '<option value = "nulle" selected = "selected" disabled>' . $premier_phrase . '</option>';
            foreach ($options as $valeur => $affichage) {
                if ($premier_phrase == "S�l�ctionner ici votre document des ventes") {
                    $code = substr($affichage, 0, strpos(' de :', $affichage));
                    $date = substr($affichage, strpos(' de : ', $affichage), -1);
                    if ($valeur == $selection) {
                        $r .= '<option value = "' . $valeur . '" selected = "selected" ><span class = "color_gris gras"><b>' . $code . '</b></span><span class = "color_gris_fonce font_size_down">' . $date . '</span></option>';
                    } else {
                        $r .= '<option value = "' . $valeur . '"><span class = "color_gris gras"><b>' . $code . '</b></span><span class = "color_gris_fonce font_size_down">' . $date . '</span></option>';
                    }
                } else {
                    if ($valeur == $selection) {
                        $r .= '<option value = "' . $valeur . '" selected = "selected" >' . $affichage . '</option>';
                    } else {
                        $r .= '<option value = "' . $valeur . '">' . $affichage . '</option>';
                    }
                }

            }
        }
        $r .= '</select>';
        $r .= $la_fenetre_a_ouvirir != null ? $html->get_img(array('class' => 'margin_l_25', 'src' => '../img/suivre.png', 'onClick' => 'ouvrir_fenetre(\'' . $la_fenetre_a_ouvirir . '\')')) : '';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= $html->get_close_li();
        return $r;
    }

    function radio($champ, $props = array(), $label = null, $attributs = array())
    {
        $selection = isset($this->donnees[$champ]) ? $this->donnees[$champ] : "";
        $r = "";
        $r .= '<div id = div_radio_' . $champ . '>';
        if ($label != NULL) {
            $r .= "<label>" . $label . "</label>";
        }
        if (is_array($props)) {
            if (!empty($props)) {
                foreach ($props as $un_radio => $sa_valeur) {
                    if ($sa_valeur == $selection) {
                        $r .= html::open_span(array("class" => "span_indic_radio")) . $un_radio . html::close_span();
                        $r .= '<input id = "' . $this->name_form . '_radio_' . $sa_valeur . '" type = "radio" value = ' . $sa_valeur . ' name = "donnees[' . $champ . ']" selected = "selected"';
                        if (is_array($attributs)) {
                            if (!empty($attributs)) {
                                foreach ($attributs as $k => $v) {
                                    $r .= ' ' . $k . ' = "' . $v . '"';
                                }
                            }
                        }
                        $r .= '/>';
                    } else {
                        $r .= html::get_open_span(array("class" => "span_indic_radio")) . $un_radio . html::get_close_span() . '<input type = "radio" value = ' . $sa_valeur . ' name = "donnees[' . $champ . ']"';
                        if (is_array($attributs)) {
                            if (!empty($attributs)) {
                                foreach ($attributs as $k => $v) {
                                    $r .= ' ' . $k . ' = "' . $v . '"';
                                }
                            }
                        }
                        $r .= '/>';
                    }

                }
            }
        }
        $r .= '</div>' . "\n";
        echo $r;
    }

    function textarea($num_index, $champ, $label = null, $guideline = null, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<textarea tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>';
        $r .= isset($this->donnees[$champ]) ? $this->donnees[$champ] : '';
        $r .= '</textarea>';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>' . "\n";
        echo $r;
    }

    function get_textarea($num_index, $champ, $label = null, $guideline = null, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<textarea tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>';
        $r .= isset($this->donnees[$champ]) ? $this->donnees[$champ] : '';
        $r .= '</textarea>';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>' . "\n";
        return $r;
    }

    function get_textarea_ge($num_index, $champ, $label = null, $guideline = null, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index, 'class' => 'no_liste'));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<textarea tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '>';
        $r .= isset($this->donnees[$champ]) ? $this->donnees[$champ] : '';
        $r .= '</textarea>';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>' . "\n";
        return $r;
    }

    public function input_money($num_index, $champ, $label = null, $guideline = null, $attributs = array(), $devise = "&#8364")
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "text" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . round($this->donnees[$champ], 2) . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $html->get_small($devise, array('class' => 'symbol indic margin_l_15')) . $html->br();
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>' . "\n";
        echo $r;
    }

    public function input_duree($num_index, $champ, $label = null, $guideline = null, $attributs = array(), $unite_temps = "mois")
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "text" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $html->get_small($unite_temps, array('class' => 'indic margin_l_15'));
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>';
        echo $r;
    }

    public function input_date($num_index, $champ, $label = null, $guideline = null, $attributs = array())
    {
        $html = new html();
        $code_js_calendar = 'Calendar.setup({ inputField: "date_reapro_prod_3",baseField: "' . $champ . '",displayArea  : "calendar_18",button: "cal_img_18",ifFormat: "%B %e, %Y",onSelect: selectDate});';
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div(array('style' => '', 'class' => 'text_center'));
        $r .= $html->get_open_span();
        $r .= '<input type = "text" name = "donnees[' . $champ . '_jour]" id = "' . $champ . '_jour" tabindex = "' . $num_index . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= isset($this->donnees[$champ . '_jour']) ? ' value = "' . $this->donnees[$champ . '_jour'] . '" ' : '';
        $r .= '/>';
        $r .= self::get_label('Jour', array('for' => $champ . '_jour'));
        $r .= $html->get_close_span();
        $r .= $html->get_open_span();
        $r .= '<input type = "text" name = "donnees[' . $champ . '_mois]" id = "' . $champ . '_mois" tabindex = "' . $num_index . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= isset($this->donnees[$champ . '_mois']) ? ' value = "' . $this->donnees[$champ . '_mois'] . '" ' : '';
        $r .= '/>';
        $r .= self::get_label('Mois', array('for' => $champ . '_mois'));
        $r .= $html->get_close_span();
        $r .= $html->get_open_span();
        $r .= '<input type = "text" name = "donnees[' . $champ . '_annee]" id = "' . $champ . '_annee" tabindex = "' . $num_index . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= isset($this->donnees[$champ . '_an']) ? ' value = "' . $this->donnees[$champ . '_an'] . '" ' : '';
        $r .= '/>';
        $r .= self::get_label('Ann�e', array('for' => $champ . '_annee'));
        $r .= $html->get_close_span();
        $r .= $html->get_open_span(array('id' => 'calendar_' . $num_index, 'class' => 'disp_inlie_block'));
        $r .= $html->get_img(array('id' => 'cal_img_' . $num_index, 'class' => 'datepicker', 'src' => 'img/calendar.gif', 'alt' => 'Choisir une date !'));
        $r .= $html->get_close_span();
        $r .= $html->get_close_div();
        $r .= $html->get_code_js($code_js_calendar);
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= $html->get_close_li();
        echo $r;
    }

    public function get_input_date($num_index, $champ, $label = null, $guideline = null, $attributs = array())
    {
        $html = new html();
        $code_js_calendar = 'Calendar.setup({ inputField: "date_reapro_prod_3",baseField: "' . $champ . '",displayArea  : "calendar_18",button: "cal_img_18",ifFormat: "%B %e, %Y",onSelect: selectDate});';
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div(array('style' => '', 'class' => 'text_center'));
        $r .= $html->get_open_span();
        $r .= '<input type = "text" name = "donnees[' . $champ . '_jour]" id = "' . $champ . '_jour" tabindex = "' . $num_index . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= isset($this->donnees[$champ . '_jour']) ? ' value = "' . $this->donnees[$champ . '_jour'] . '" ' : '';
        $r .= '/>';
        $r .= self::get_label('Jour', array('for' => $champ . '_jour'));
        $r .= $html->get_close_span();
        $r .= $html->get_open_span();
        $r .= '<input type = "text" name = "donnees[' . $champ . '_mois]" id = "' . $champ . '_mois" tabindex = "' . $num_index . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= isset($this->donnees[$champ . '_mois']) ? ' value = "' . $this->donnees[$champ . '_mois'] . '" ' : '';
        $r .= '/>';
        $r .= self::get_label('Mois', array('for' => $champ . '_mois'));
        $r .= $html->get_close_span();
        $r .= $html->get_open_span();
        $r .= '<input type = "text" name = "donnees[' . $champ . '_annee]" id = "' . $champ . '_annee" tabindex = "' . $num_index . '"';
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= isset($this->donnees[$champ . '_an']) ? ' value = "' . $this->donnees[$champ . '_an'] . '" ' : '';
        $r .= '/>';
        $r .= self::get_label('Ann�e', array('for' => $champ . '_annee'));
        $r .= $html->get_close_span();
        $r .= $html->get_open_span(array('id' => 'calendar_' . $num_index, 'class' => 'disp_inlie_block'));
        $r .= $html->get_img(array('id' => 'cal_img_' . $num_index, 'class' => 'datepicker', 'src' => 'img/calendar.gif', 'alt' => 'Choisir une date !'));
        $r .= $html->get_close_span();
        $r .= $html->get_close_div();
        $r .= $html->get_code_js($code_js_calendar);
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= $html->get_close_li();
        return $r;
    }

    public function input_poids($num_index, $champ, $label = null, $guideline = null, $attributs = array(), $unite_poids = "Grammes")
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "text" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $html->get_small($unite_poids, array('class' => 'indic margin_l_15'));
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>';
        echo $r;
    }

    public function input_mesure($num_index, $champ, $label = null, $guideline = null, $attributs = array(), $unite_mesure = "mm")
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "text" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $html->get_small($unite_mesure, array('class' => 'indic margin_l_15'));
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>';
        echo $r;
    }

    public function ck_box($num_index, $champ, $label = null, $guideline = null, $attributs = array(), $text2 = '')
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "checkbox" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $html->get_small($text2, array('class' => 'indic margin_l_15'));
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>';
        echo $r;
    }

    public function ck_box_simple($num_index, $champ, $plus, $attributs = array(), $text2 = '')
    {
        $html = new html();
        $r = "";

        $r .= $html->get_open_span(array('class' => 'width_30'));
        $r .= '<input type = "checkbox" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        $champ_vise = substr($champ, 0, strpos($champ, '_ck_box'));
        $id_du_champ = substr($champ, strpos($champ, 'ck_box_') + 7, 99999);
        if (isset($this->donnees[$champ_vise])) {
            if (in_array($id_du_champ, $this->donnees[$champ_vise]))
                $r .= ' value = "on" checked = "checked"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $html->get_small($text2, array('class' => 'indic margin_l_15'));
        $r .= $html->get_close_span();

        echo $r;
    }

    public function get_ck_box_simple($num_index, $champ, $plus, $attributs = array(), $text2 = '')
    {
        $html = new html();
        $r = "";

        $r .= $html->get_open_span(array('class' => 'width_30'));
        $r .= '<input type = "checkbox" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        $champ_vise = substr($champ, 0, strpos($champ, '_ck_box'));
        $id_du_champ = substr($champ, strpos($champ, 'ck_box_') + 7, 99999);
        if (isset($this->donnees[$champ_vise])) {
            if (in_array($id_du_champ, $this->donnees[$champ_vise]))
                $r .= ' value = "on" checked = "checked"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $html->get_small($text2, array('class' => 'indic margin_l_15'));
        $r .= $html->get_close_span();

        return $r;
    }

    public function get_ck_box($num_index, $champ, $label = null, $guideline = null, $attributs = array(), $text2 = '')
    {
        $html = new html();
        $r = "";
        $r .= $html->get_open_li(array('id' => 'li_' . $num_index));
        if ($label != null) {
            $r .= self::get_label($label, array('for' => $champ, 'class' => 'description'));
        }
        $r .= $html->get_open_div();
        $r .= '<input type = "checkbox" tabindex = "' . $num_index . '" name = "donnees[' . $champ . ']" id = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>';
        $r .= $text2 != '' ? $html->get_small($text2, array('class' => 'indic margin_l_15')) : '';
        $r .= $this->get_erreurs($champ);
        $r .= $html->get_close_div();
        $r .= $html->get_p($html->get_small($guideline), array('id' => 'guide_' . $num_index, 'class' => 'guideline'));
        $r .= '</li>';
        return $r;
    }

    public function hidden($champ, $attributs = array())
    {
        $r = "";
        $r .= '<input type = "hidden" name = "donnees[' . $champ . ']"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        echo $r;
    }

    public function get_hidden($champ, $attributs = array())
    {
        $r = "";
        $r .= '<input type = "hidden" name = "donnees[' . $champ . ']"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        return $r;
    }

    public function get_hidden_simple($champ, $attributs = array())
    {
        $r = "";
        $r .= '<input type = "hidden" name = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        return $r;
    }

    public function hidden_simple($champ, $attributs = array())
    {
        $r = "";
        $r .= '<input type = "hidden" name = "' . $champ . '"';
        if (isset($this->donnees[$champ])) {
            $r .= ' value = "' . $this->donnees[$champ] . '"';
        }
        if (!empty($attributs)) {
            foreach ($attributs as $attr => $valeur) {
                $r .= ' ' . $attr . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        echo $r;
    }

    function get_bouton($texte, $attributs = array())
    {
        $html = new html();
        $r = "";
        $r .= '<input type = "button" value = "' . $texte . '"';
        if (is_array($attributs)) {
            foreach ($attributs as $cle => $valeur) {
                $r .= ' ' . $cle . ' = "' . $valeur . '"';
            }
        }
        $r .= '/>' . "\n";
        return $r;
    }
}

?>