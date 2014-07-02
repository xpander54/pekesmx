<?php
if (!defined('_PS_VERSION_'))
	exit;

class CsQuickView extends Module
{
	function __construct()
	{
		$this->name = 'csquickview';
		$this->tab = 'My Blocks';
		$this->version = 1.0;
		$this->author = 'Codespot';
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('CS QuickView product.');
		$this->description = $this->l('Show popup when click Quick view.');
	}

	function install()
	{	
		if (!Configuration::updateValue('CS_QUICKVIEW_ITEM_SELECT',"a.product_img_link,a.product_image") || !parent::install()|| !$this->registerHook('header'))
			return false;
		Configuration::updateValue('CS_QUICKVIEW_RESIZE_TYPE',0);
		Configuration::updateValue('CS_QUICKVIEW_RESIZE_WIDTH',60);
		Configuration::updateValue('CS_QUICKVIEW_RESIZE_HEIGHT',90);
		return true;
	}
	
	public function uninstall()
	{
		Configuration::deleteByName('CS_QUICKVIEW_ITEM_SELECT');
		return parent::uninstall();
	}
	
	/**
	 * getContent used to display admin module form
	 *
	 * @return string content
	 */
	 
	 public function getContent()
	{
		$output = '';
		if (Tools::isSubmit('submitItemSelector'))
		{
			$itemClass =Tools::getValue('itemClass');
			$resize_type =Tools::getValue('resize_type');
			$resize_width=Tools::getValue('popup_width');
			$resize_height=Tools::getValue('popup_height');
			
			Configuration::updateValue('CS_QUICKVIEW_ITEM_SELECT',$itemClass);
			Configuration::updateValue('CS_QUICKVIEW_RESIZE_TYPE',$resize_type);
			Configuration::updateValue('CS_QUICKVIEW_RESIZE_WIDTH',$resize_width);
			Configuration::updateValue('CS_QUICKVIEW_RESIZE_HEIGHT',$resize_height);
			if (isset($errors) AND sizeof($errors))
				$output .= $this->displayError(implode('<br />', $errors));
			else
				$output .= $this->displayConfirmation($this->l('Settings updated'));
		}
		return $output.$this->displayForm();
	}
	 
	public function displayForm()
	{
		$output = '<div class="panel">
		<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="panel-heading">'.$this->l('CS QuickView Module configuration').'</div>';
		$output .= '
				<br/>
				
				<div class="form-group">
					<label class="control-label col-lg-3" for="itemClass">'.$this->l('Items Selector').'</label>
					<div class="col-lg-9"><input id="itemClass" type="text" name="itemClass" value="'.Tools::safeOutput(Tools::getValue('itemClass', Configuration::get('CS_QUICKVIEW_ITEM_SELECT'))).'" style="width:700px" />
					<p class="help-block">'.$this->l('selector for each items use to insert quickview image.Ex: itemSelector1,itemSelector2').'</p></div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">'.$this->l('Resize By').'</label>
					<div class="col-lg-9"><input type="radio" name="resize_type" id="resize_type_per" value="0" '.(!Tools::getValue('resize_type', Configuration::get('CS_QUICKVIEW_RESIZE_TYPE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="resize_type_per">Percentage</label>
					<input type="radio" name="resize_type" id="resize_type_pix" value="1" '.(Tools::getValue('resize_type', Configuration::get('CS_QUICKVIEW_RESIZE_TYPE')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="resize_type_pix">Pixels</label></div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3" for="popup_width">'.$this->l('Popup Width').'</label>
					<div class="col-lg-9"><input id="popup_width" type="text" name="popup_width" value="'.Tools::safeOutput(Tools::getValue('popup_width', Configuration::get('CS_QUICKVIEW_RESIZE_WIDTH'))).'" style="width:100px" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3" for="popup_height">'.$this->l('Popup Height').'</label>
					<div class="col-lg-9"><input id="popup_height" type="text" name="popup_height" value="'.Tools::safeOutput(Tools::getValue('popup_height', Configuration::get('CS_QUICKVIEW_RESIZE_HEIGHT'))).'" style="width:100px" /></div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-default pull-right" type="submit" name="submitItemSelector">'.$this->l('Save').'<i class="process-icon-save"></i></button>
				</div>
		</form></div>';
		return $output;
	}
	
	public function hookHeader($params)
	{
		global $smarty, $cookie;
		
		$this->context->controller->addCss($this->_path.'css/cs_quickview.css', 'all');
		$this->context->controller->addJQueryPlugin('fancybox');
		$this->context->controller->addJs($this->_path.'js/cs_quickview.js');
		
		$itemClass="";
		$resize_type=0;
		$resize_width=50;
		$resize_height=50;
		
		$itemClass =Configuration::get('CS_QUICKVIEW_ITEM_SELECT');
		$resize_type=Configuration::get('CS_QUICKVIEW_RESIZE_TYPE');
		$resize_width=Configuration::get('CS_QUICKVIEW_RESIZE_WIDTH');
		$resize_height=Configuration::get('CS_QUICKVIEW_RESIZE_HEIGHT');
		
		$smarty->assign('itemsclass',$itemClass);	
		$smarty->assign('resize_type',$resize_type);	
		$smarty->assign('resize_width',$resize_width);	
		$smarty->assign('resize_height',$resize_height);	
		
		if($itemClass!="")
		{
			if(strpos($itemClass,',')!==false)
			{
				$arrItemClass=explode(",",$itemClass);
				$n=count($arrItemClass);
			}
			else
			{
				$n=1;
			}
		}
		else
		{
			$n=0;
		}
		$smarty->assign('num_item',$n);
		
		return $this->display(__FILE__, 'views/templates/front/csvarurl.tpl');
	}
}


