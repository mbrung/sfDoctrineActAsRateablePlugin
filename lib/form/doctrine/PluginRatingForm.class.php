<?php

/**
 * PluginRating form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginRatingForm extends BaseRatingForm
{
	public function setup() {
		parent::setup();
	  	unset($this["created_at"], $this["updated_at"], $this["user_id"],$this["id"]);

  	if ($this->getOption("rateable")) {
  		$rateable_model = get_class($this->getOption("rateable"));
  		$rateable_id = $this->getOption("rateable")->getPrimaryKey();
  	  	$this->widgetSchema["record_model"] = new sfWidgetFormInputHidden(array(),array("value"=>$rateable_model));
  		$this->widgetSchema["record_id"] = new sfWidgetFormInputHidden(array(),array("value"=>$rateable_id));
  	} else {
  	  	$this->widgetSchema["record_model"] = new sfWidgetFormInputHidden();
  		$this->widgetSchema["record_id"] = new sfWidgetFormInputHidden();
  	}
  	
  	$this->widgetSchema["return_url"] = new sfWidgetFormInputHidden();  
  	$this->validatorSchema["return_url"] = new sfValidatorPass();	
  	$this->widgetSchema["score"] = new sfWidgetFormChoice(array("choices"=>range(1,5)));
  	$this->validatorSchema["score"] = new sfValidatorChoice(array("choices"=>range(1,5)));
	$this->disableLocalCSRFProtection();

	}
}
