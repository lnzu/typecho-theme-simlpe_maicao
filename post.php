<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<title><?php $this->title() ?></title>


<div class="content">

<a id="list_title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>

<div id="list_preview">
<span><?php $this->date('F'); ?>&nbsp;&nbsp;<?php $this->date('j'); ?>&nbsp;&nbsp;<?php $this->date('Y'); ?></span>
<span id="list_categery"><?php $this->category('-'); ?></span>
<span><?php $this->author(); ?></span>
</div>

<?php $this->content(''); ?>

</div>

<p>上一篇: <?php $this->thePrev('%s','没有了'); ?></p>
<p>下一篇: <?php $this->theNext('%s','没有了'); ?></p>
</div>

<?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>
