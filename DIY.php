<?php
/**
 * DIY
 *
 * @package custom
 *
 */
?>
<title><?php $this->title() ?></title>

<?php $this->need('header.php'); ?>

<div class="content">
<?php $this->content(''); ?>
</div>

<?php $this->need('footer.php'); ?>
