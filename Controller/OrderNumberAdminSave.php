<?php

namespace OrderNumber\Controller;

use OrderNumber\OrderNumber;
use Thelia\Controller\Admin\BaseAdminController;
use OrderNumber\Model\Config;
use OrderNumber\Form\ConfigureFormulaire;
use Thelia\Tools\URL;
use Symfony\Component\Routing\Router; 
class OrderNumberAdminSave extends BaseAdminController
{
  function save()
    {
    		$error_message="";
            $conf = new Config();
            $form = new ConfigureFormulaire($this->getRequest());
            $vform = $this->validateForm($form);
    		$conf->setORDERNUMBERPERSONALVALUE($vform->get('PersonalValue')->getData())
                    ->write(OrderNumber::JSON_CONFIG_PATH);
        $this->redirectToRoute("admin.module.configure",array(),
        array ( 'module_code'=>"OrderNumber",
        '_controller' => 'Thelia\\Controller\\Admin\\ModuleController::configureAction'));
    }
    
}
