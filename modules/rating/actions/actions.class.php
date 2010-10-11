<?php

/**
 * rating actions.
 *
 * @package    grandcrew
 * @subpackage rating
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ratingActions extends sfActions
{
	public function executeSave(sfWebRequest $request) {
		$this->form = new RatingForm();
		$params = $request->getParameter("rating");
		
		$this->form->bind($params);
		if ($this->form->isValid()) {
			$this->form->getObject()->user_id = $this->getUser()->getGuardUser()->getPrimaryKey();
			$this->form->save();
		} 
		
		if ($request->isXmlHttpRequest()) {
			return $this->renderText("Thank you for rating this ".$params["record_model"]);
		}
		
		if ($request->isXmlHttpRequest()) {
			return $this->renderPartial("rating/form", array("form"=>$this->form));
		} else {
			if (array_key_exists("return_url", $params)) {
				$this->redirect($params["return_url"]);
			} else {
				$this->redirect("@homepage");
			}
		}
	}
}
