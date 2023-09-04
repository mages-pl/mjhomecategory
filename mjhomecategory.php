<?php
/**
 * Mjhomecategory 
 * @author MAGES Michał Jendraszczyk
 * @copyright (c) 2023, Michał Jendraszczyk
 * @license https://mages.pl
 */

class Mjhomecategory extends Module
{
    
    public function __construct()
    {
        $this->name = "mjhomecategory";
        $this->tab = 'administration';
        $this->author = "MAGES Michał Jendaszczyk";
        $this->version = "1.0.0";
        
        parent::__construct();
        $this->bootstrap = true;
                
        $this->prefix = $this->name."_";
        
        $this->displayName = $this->l("Blok kategorii");
        $this->description = $this->l('Umożliwia zarządzanie kategoriami na stronie głównej');
        $this->confirmUninstall= $this->l("Usunąć ? ");

    }
    public function install()
    {
        return parent::install()
                && $this->registerHook("displayHome");
    }

    public function postProcess() { 
        if(Tools::isSubmit('submitAddconfiguration')) { 

            for($i=1;$i<=5;$i++) {

                if(
                    !empty(Tools::getValue('mjhomecategory_title'.$i)) && 
                    !empty(Tools::getValue('mjhomecategory_subtitle'.$i))
                ) {
                    Configuration::updateValue('mjhomecategory_title'.$i,Tools::getValue('mjhomecategory_title'.$i));
                    Configuration::updateValue('mjhomecategory_subtitle'.$i,Tools::getValue('mjhomecategory_subtitle'.$i));
                }

                #if(!empty(Tools::getValue('mjhomecategory_link'.$i)) {
                    Configuration::updateValue('mjhomecategory_link'.$i,Tools::getValue('mjhomecategory_link'.$i));
                #

                // Jesli wgrywamy plik
                if(!empty($_FILES['mjhomecategory_image'.$i])) {
            
                    $type = $_FILES["mjhomecategory_image".$i]["type"];
                    $pos_start = strpos($type,"/");
                    $ext = substr($type,$pos_start+1);

                    $target_dir = _PS_MODULE_DIR_."/".$this->name."/uploads/";
                    $target_file = $target_dir . md5(basename($_FILES["mjhomecategory_image".$i]["name"])).".".$ext;

                    $allow_ext = ['jpg','png','jpeg','web'];
                                
                    if(in_array($ext, $allow_ext)) { 

                    if (move_uploaded_file($_FILES["mjhomecategory_image".$i]["tmp_name"], $target_file)) {
                        Configuration::updateValue('mjhomecategory_image'.$i, $target_file);
                    } else {

                    }
                } else { 

                }
                
                } 

 
            }
            
        }
    }
    public function renderForm() {
        $form_fields = [];


        $banners = array();
        for($i=1; $i<=5;$i++) {

            $item_title = array(
                'label' => $this->l('Tytuł sekcji '.$i.'#'),
                'type' => 'text',
                'name' => 'mjhomecategory_title'.$i,
                'class' => 'form-control',
            );

            array_push($banners, $item_title);
         
            $item_subtitle = array(
                'label' => $this->l('Podtytuł sekcji '.$i.'#'),
                'type' => 'text',
                'name' => 'mjhomecategory_subtitle'.$i,
                'class' => 'form-control',
            );
            array_push($banners, $item_subtitle);

          

            $item_link = array(
                    'label' => $this->l('Link sekcji '.$i.'#'),
                    'type' => 'text',
                    'name' => 'mjhomecategory_link'.$i,
                    'class' => 'form-control',
            );
            array_push($banners, $item_link);

 
            $item_image = array(
                    'label' => $this->l('Obraz sekcji '.$i.'#'),
                    'type' => 'file',
                    'name' => 'mjhomecategory_image'.$i,
                    'class' => 'form-control',
                    'display_image' => true,
                    'image' =>  '<img src="'._PS_BASE_URL_.__PS_BASE_URI__.Configuration::get('mjhomecategory_image'.$i).'" class="thumbnail" style="max-width:100%;"/>'
        );
        array_push($banners, $item_image);


        }


        $form_fields[]['form'] = array(
            'legend' => array(
                'title' => $this->l('Ustawienia')
            ),
            'input' => $banners,
            'submit' => array(
                'title' => 'Zapisz',
                'class' => 'btn btn-default pull-right'
            )
        );

        $form = new HelperForm();

        $form->token = Tools::getAdminTokenLite('AdminModules');
        $form->default_form_language = $this->context->language->id;
        $form->languages = Language::getLanguages();


        for($i=1; $i<=5;$i++) {
            $form->tpl_vars['fields_value']['mjhomecategory_title'.$i] = Tools::getValue('mjhomecategory_title'.$i, Configuration::get('mjhomecategory_title'.$i));

            $form->tpl_vars['fields_value']['mjhomecategory_subtitle'.$i] = Tools::getValue('mjhomecategory_subtitle'.$i, Configuration::get('mjhomecategory_subtitle'.$i));

            $form->tpl_vars['fields_value']['mjhomecategory_link'.$i] = Tools::getValue('mjhomecategory_link'.$i, Configuration::get('mjhomecategory_link'.$i));

            $form->tpl_vars['fields_value']['mjhomecategory_image'.$i] = Tools::getValue('mjhomecategory_image'.$i, Configuration::get('mjhomecategory_image'.$i));
        }
    

        return $form->generateForm($form_fields);
    }
    public function getContent() {
        return $this->postProcess(). $this->renderForm();
    }
   public function hookDisplayHome() {

        $this->context->smarty->assign(
            array(  
                'banner1_title' => Configuration::get('mjhomecategory_title1'),
                'banner1_subtitle' => Configuration::get('mjhomecategory_subtitle1'),
                'banner1_link' => Configuration::get('mjhomecategory_link1'),
                'banner1_image' => Configuration::get('mjhomecategory_image1'),

                'banner2_title' => Configuration::get('mjhomecategory_title2'),
                'banner2_subtitle' => Configuration::get('mjhomecategory_subtitle2'),
                'banner2_link' => Configuration::get('mjhomecategory_link2'),
                'banner2_image' => Configuration::get('mjhomecategory_image2'),

                'banner3_title' => Configuration::get('mjhomecategory_title3'),
                'banner3_subtitle' => Configuration::get('mjhomecategory_subtitle3'),
                'banner3_link' => Configuration::get('mjhomecategory_link3'),
                'banner3_image' => Configuration::get('mjhomecategory_image3'),

                'banner4_title' => Configuration::get('mjhomecategory_title4'),
                'banner4_subtitle' => Configuration::get('mjhomecategory_subtitle4'),
                'banner4_link' => Configuration::get('mjhomecategory_link4'),
                'banner4_image' => Configuration::get('mjhomecategory_image4'),

                'banner5_title' => Configuration::get('mjhomecategory_title5'),
                'banner5_subtitle' => Configuration::get('mjhomecategory_subtitle5'),
                'banner5_link' => Configuration::get('mjhomecategorylink5'),
                'banner5_image' => Configuration::get('mjhomecategory_image5'),
            )
        );
        return $this->fetch('module:mjhomecategory/views/templates/hook/mjhomecategory.tpl');
   }
    public function uninstall()
    {
        return parent::uninstall();
    }
}