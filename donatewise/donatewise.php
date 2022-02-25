<?php
 
if (!defined('_PS_VERSION_'))
    exit();
 
class donatewise extends Module
{
    public function __construct()
    {
        $this->name = 'donatewise';
        $this->version = '1.0.3-PL';
        $this->author = 'donatewise';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
        $this->bootstrap = true;
 
        parent::__construct();
 
        $this->displayName = $this->l('Donatewise', 'donatewise');
        $this->description = $this->l('Increase your conversion rate and revenue by enabling recurring donations to the most reputable charities in your online shop.', 'donatewise');
    }

    public function install()
    {
        if (!parent::install() 
        || !$this->registerHook('displayHeader')
        || !$this->registerHook('displayHome')
        || !$this->registerHook('displayProductPriceBlock')
        || !$this->registerHook('displayProductActions')
        ) {
            return false;
        }
        return true;
    } 
 
    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHome($params)
    {
        return '<a href="https://prestapros.com/">PrestaPros.com</a>';
    }

    public function hookDisplayProductActions($params)
    {
        if(Configuration::get('DONATEWISE_WIDGET_PROD_STAT') == true)
            $params['uuid'] = Configuration::get('DONATEWISE_UUID');

        $this->context->smarty->assign($params);

        return $this->display(__FILE__, 'views/front/widget.tpl');
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addJS($this->_path.'views/js/main.js');
        $this->context->controller->addCSS($this->_path.'views/css/style.css', 'all');
    }

    public function displayForm($form_type)
    {   
        if($form_type == 'widget_product')
        {
            $form = [
                'form' => [
                    'legend' => [
                        'title' => $this->l('Enable widget'),
                    ],
                    'input' => [
                        [
                            'type' => 'switch',
                            'label' => $this->l('The widget will be featured on your product page. Enable?'),
                            'name' => 'DONATEWISE_WIDGET_PROD_STAT',
                            'is_bool' => true,
                            'values' => [
                                [
                                    'value' => 1,
                                    'label' => 'Enabled',
                                ],
                                [
                                    'value' => 0,
                                    'label' => 'Disabled',
                                ],
                            ],
                        ],
                    ],
                    'submit' => [
                        'title' => 'Save',
                        'class' => 'btn btn-default pull-right',
                        'name' => 'submit_widget_product',
                    ],
                ],
            ];
     
            $helper = new HelperForm();

            // Module, token and currentIndex
            $helper->table = $this->table;
            $helper->name_controller = $this->name;
            $helper->token = Tools::getAdminTokenLite('AdminModules');
            $helper->currentIndex = AdminController::$currentIndex . '&' . http_build_query(['configure' => $this->name]);
            $helper->submit_action = 'submit' . $this->name;

            // Default language
            $helper->default_form_language = (int) Configuration::get('PS_LANG_DEFAULT');

            // Load current value into the form
            $helper->fields_value['DONATEWISE_WIDGET_PROD_STAT'] = Tools::getValue('DONATEWISE_WIDGET_PROD_STAT', Configuration::get('DONATEWISE_WIDGET_PROD_STAT'));

            return $helper->generateForm([$form]);
        }
        else if($form_type == 'uuid')
        {
            $form = [
                'form' => [
                    'legend' => [
                        'title' => 'Configure',
                    ],
                    'input' => [
                        [
                            'type' => 'text',
                            'label' => $this->l('Your UUID'),
                            'name' => 'DONATEWISE_UUID',
                            'size' => 20,
                            'required' => true,
                        ],
                    ],
                    'submit' => [
                        'title' => 'Save',
                        'class' => 'btn btn-default pull-right',
                        'name' => 'submit_donatewise_uuid',
                    ],
                ],
            ];
     
            $helper = new HelperForm();

            // Module, token and currentIndex
            $helper->table = $this->table;
            $helper->name_controller = $this->name;
            $helper->token = Tools::getAdminTokenLite('AdminModules');
            $helper->currentIndex = AdminController::$currentIndex . '&' . http_build_query(['configure' => $this->name]);
            $helper->submit_action = 'submit' . $this->name;

            // Default language
            $helper->default_form_language = (int) Configuration::get('PS_LANG_DEFAULT');

            // Load current value into the form
            $helper->fields_value['DONATEWISE_UUID'] = Tools::getValue('DONATEWISE_UUID', Configuration::get('DONATEWISE_UUID'));

            return $helper->generateForm([$form]);
        }
         
    }

    public function getContent()
    {
         $output = '';

        // this part is executed only when the form is submitted
        if (Tools::isSubmit('submit_donatewise_uuid')) {
            // retrieve the value set by the user
            $configValue = (string) Tools::getValue('DONATEWISE_UUID');

            // check that the value is valid
            if (empty($configValue) || !Validate::isGenericName($configValue)) {
                // invalid value, show an error
                $output = $this->displayError($this->l('Wrong UUID number.'));
            } else {
                // value is ok, update it and display a confirmation message
                Configuration::updateValue('DONATEWISE_UUID', $configValue);
                $output = $this->displayConfirmation($this->l('UUID number has been updated.'));
            }
        }
        else if (Tools::isSubmit('submit_widget_product')) {
            // retrieve the value set by the user
            $configValue = (string) Tools::getValue('DONATEWISE_WIDGET_PROD_STAT');

            // check that the value is valid
            if (!Validate::isGenericName($configValue)) {
                // invalid value, show an error
                $output = $this->displayError($this->l('Error occured.'));
            } else {
                // value is ok, update it and display a confirmation message
                Configuration::updateValue('DONATEWISE_WIDGET_PROD_STAT', $configValue);
                $output = $this->displayConfirmation($this->l('The widget settings have been updated.'));
            }
        }

        $params = array();
        $params['form_uuid'] = $this->displayForm('uuid');
        $params['form_widget_product'] = $this->displayForm('widget_product');
        $params['uuid'] = Configuration::get('DONATEWISE_UUID');

        $this->context->smarty->assign($params);
        return $output . $this->display(__FILE__, 'views/admin/configuration.tpl');
    }
}