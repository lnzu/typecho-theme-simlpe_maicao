<html>

<title>search......</title>

<?php $this->need('header.php');?>

<body>

<?php if ($this->have()): ?>

<div class="content">
<?php while($this->next()): ?>
<div id="list">
<a id="list_title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
<?php $this->content('阅读更多....'); ?>
<div id="list_preview">
<span><?php $this->date('F'); ?>&nbsp;&nbsp;<?php $this->date('j'); ?>&nbsp;&nbsp;<?php $this->date('Y'); ?></span>
<span id="list_categery"><?php $this->category('-'); ?></span>
<span><?php $this->author(); ?></span>
</div>
<hr />
</div>
<?php endwhile; ?>
<script>hideLastHr();hideListBr();</script>
</div>

<?php else: ?>
<div style="text-align: center;font-family: sans-serif;height: 420px;line-height: 420px;font-size:.75em";>没有找到相关文章!</div>
<?php endif; ?>  

<!-- 上一页都下一页-->
<ul id="pager">
<li class="previous"><?php $this->pageLink('上一页'); ?></li>
<li><?php echo $this->_currentPage;?>/<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></li>
<li class="next"><?php $this->pageLink('下一页', 'next'); ?></li>
</ul>

<?php $this->need('footer.php'); ?>
</body>
</html>