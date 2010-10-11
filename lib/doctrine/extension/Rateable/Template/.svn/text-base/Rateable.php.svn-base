<?php

class Doctrine_Template_Rateable extends Doctrine_Template
{
  public function setTableDefinition()
  {
    $this->addListener(new Doctrine_Template_Listener_Rateable($this->_options));
  }
  
  public function alreadyRatedBy(SfGuardUser $user) {
  	return ($this->getRatingsQuery()->andWhere("u.id=?", $user->id)->count()>0);
  }
  
  public function addRating(Rating $rating)
  {
    $rating->set('record_model', $this->_invoker->getTable()->getComponentName());
    $rating->set('record_id', $this->_invoker->get('id'));
    $rating->save();
    
    return $this->_invoker;
  }

  public function getRatingScore()
  {
  	list($score, $vote_count) = $this->getRatingsQuery()->select("SUM(score), COUNT(id)")->execute(array(), Doctrine::HYDRATE_NONE);
  	if ($vote_count==0) {
  		return 0;
  	} else {
  		return ($score/$vote_count);
  	}
  }

  public function getRatingsQuery()
  {
    $query = Doctrine::getTable('Rating')->createQuery('c')
      ->where('c.record_id = ?', $this->_invoker->get('id'))
      ->andWhere('c.record_model = ?', $this->_invoker->getTable()->getComponentName())
      ->innerJoin("c.User as u");

    return $query;
  }
}