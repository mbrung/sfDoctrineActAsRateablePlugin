<div id="rating_<?php echo $rateable->id ?>">
<?php if ($sf_user->isAuthenticated()):?>
<?php if ($rateable->alreadyRatedBy($sf_user->getGuardUser()->getRawValue())):?>
<p>You have already rated this <?php echo $rateable_model?></p>
<?php else:?>

<?php echo jq_form_remote_tag(array(
    'url'      => url_for('@rating_save'),
    'update'   => 'rating_'.$rateable->id,
    'complete' => jq_visual_effect('highlight', 'rating_'.$rateable->id),
  )) ?>

<?php echo $form ?>
<input type="submit" value="Rate"></input>
</form>
<?php endif;?>
<?php endif;?>
</div>