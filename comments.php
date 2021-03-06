<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $singleCommentOptions) {
$commentClass = '';
if ($comments->authorId) {
if ($comments->authorId == $comments->ownerId) {
$commentClass .= ' comment-by-author';
} else {
$commentClass .= ' comment-by-user';
}
}

$commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
?>
<li id="<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->_levels > 0) {
echo ' comment-child';
$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
//以上部份 不用理会，是判断一些奇偶数评论和作者类的，下面的才是需要修改的，根据需要修改吧， php部份不需要 修改，只需要修改 HTML 部分，下面是我现在用的
?>">

<!---这里自定义评论显示列表-->
<div class="comment-author">
<?php $comments->gravatar($singleCommentOptions->avatarSize, $singleCommentOptions->defaultAvatar);    //头像 只输出 img 没有其它标签 ?>
<div class="comment-info">
<?php $singleCommentOptions->beforeAuthor();
$comments->author();$singleCommentOptions->afterAuthor(); //输出评论者 ?>

<p class="comment-time">
<?php $singleCommentOptions->beforeDate(); 
$comments->date($singleCommentOptions->dateFormat);
$singleCommentOptions->afterDate();  //输出评论日期 ?>
</p>

</div>
<div class="comment-reply">
<?php $comments->reply($singleCommentOptions->replyWord); //输出 回复 链接?>
</div>
</div>
 
<?php $comments->content(); //输出评论内容，包含 <p></p> 标签 ?>
<!--到这里以后不要改-->

<?php if ($comments->children) { ?>
<div class="comment-children">
<?php $comments->threadedComments($singleCommentOptions); //评论嵌套?>
</div>
<?php } ?>
 
</li>
<?php
}
?> 

<!--以上是自定义评论列表添加的内容-->

<div id="comments">
 <?php $this->comments()->to($comments); ?>
 <?php if ($comments->have()): ?>
  <h4 style="margin-top: 5px" ><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>

  <?php $comments->listComments(); ?>

  <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
 <?php endif; ?>

<?php if($this->allow('comment')): ?>
  <div id="<?php $this->respondId(); ?>" class="respond">
    <div class="cancel-comment-reply">
      <?php $comments->cancelReply(); ?>
    </div>
    
    <h4 style="margin-bottom: 10px" id="response"><?php _e('添加新评论'); ?></h4>
    <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
      <?php if($this->user->hasLogin()): ?>
        <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
      <?php else: ?>
        <input placeholder="称呼" type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
        <input placeholder="邮箱" type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
        <input placeholder="网址" type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
      <?php endif; ?>
      
      <div class="response-content">
        <textarea placeholder="内容" rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
        <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
      </div>
      
      <?php $security = $this->widget('Widget_Security'); ?>
      
      <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>">
      
    </form>
  </div>
  <?php else: ?>
    <h4>评论已关闭</h4>
  <?php endif; ?>
</div>
