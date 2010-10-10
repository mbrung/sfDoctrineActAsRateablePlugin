<?php if ($sf_user->isAuthenticated()):?>
<?php if ($rateable->alreadyRatedBy($sf_user->getGuardUser()->getRawValue())):?>
<p>You have already rated this <?php $rateable_model?></p>
<?php else:?>
<form action="<?php echo url_for('@rating_save')?>" method="post">
<?php echo $form ?>
<input type="submit" value="Rate"></input>
</form>
<?php endif;?>
<?php endif;?>
