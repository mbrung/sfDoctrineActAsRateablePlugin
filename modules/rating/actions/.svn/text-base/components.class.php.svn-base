<?php

class ratingComponents extends sfComponents
{
	public function executeForm() {
		$this->rateable_model = get_class($this->rateable);
		$this->form = new RatingForm(null, array("rateable"=>$this->rateable), false);
		$this->form->setDefault("return_url", $this->return_url);
	}
}
