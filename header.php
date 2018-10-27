<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/prism.css'); ?>" type="text/css" />
<link rel="stylesheet" href='//at.alicdn.com/t/font_892664_51zgweqhp6.css' type="text/css" />

<script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/prism.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/main.min.js'); ?>" type="text/javascript"></script>
</head>

<body>

<header id="top">
<a href="<?php $this->options->siteUrl(); ?>">首页</a>
<a id="tag_btn">搜索</a>
<?php $this->widget('Widget_Contents_Page_List')->parse('<a href="{permalink}">{title}</a>'); ?>
<a href="<?php $this->options->siteUrl(); ?>admin">博客后台</a>
<hr />

<div id="tag_yun">
  <form style="margin:0" method="post" action="">
    <input maxlength="30" id="search" placeholder="Search......" autocomplete="off" required="true" name="s" type="text" />
  </form>
  <div id="categery">
    <?php $this->widget('Widget_Metas_Category_List')->parse('<a href="{permalink}">{name} {count}</a>');?>
  </div>
</div>

<!--狗狗-->
<div id="dog_layout">
  <p id="dog_say"></p>
  <img onclick="showDogSay()" id="dog" src="<?php $this->options->themeUrl('img/dog.gif'); ?>"/>
</div>

</header>

</body>