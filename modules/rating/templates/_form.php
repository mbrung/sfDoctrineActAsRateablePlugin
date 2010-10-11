<div id="rating_<?php echo $rateable->id ?>">
<?php if ($sf_user->isAuthenticated()):?>
<?php if ($rateable->alreadyRatedBy($sf_user->getGuardUser()->getRawValue())):?>
<p>You have already rated this <?php echo $rateable_model?></p>
<?php else:?>

<form id="rating_form_<?php echo $rateable->id ?>" action="<?php echo url_for('@rating_save')?>" method="post">

<?php echo $form ?>
<input type="submit" value="Rate"></input>
</form>
<?php endif;?>
<?php endif;?>
</div>

<script>
$('#rating_form_<?php echo $rateable->id ?>').submit(function() {
	$.post("<?php echo url_for('@rating_save')?>", $(this).serialize(), function(data) {
		$('#rating_form_<?php echo $rateable->id ?>').html(data);	
	});
	return false;
});
</script>