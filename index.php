<?php
/**
 * simple_maicao简洁主题。欢迎有空的话来我的小站逛逛！
 * 
 * @package simple_maicao
 * @author maicao
 * @version 1.0
 * @link http://maicao.fun
 */
?>

<html>

<title><?php $this->options->title() ?>&nbsp;<?php echo ' 第 '.$this->_currentPage.' 页'; ?></title>

<?php $this->need('header.php');?>

<body>

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

<!-- 上一页都下一页-->
<ul id="pager">
<li class="previous"><?php $this->pageLink('上一页'); ?></li>
<li><?php echo $this->_currentPage;?>/<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></li>
<li class="next"><?php $this->pageLink('下一页', 'next'); ?></li>
</ul>

<?php $this->need('footer.php'); ?>
</body>
</html>