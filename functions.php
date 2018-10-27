<?php 

// 自定义每页文章条数 
function themeInit($archive){
    Helper::options()->commentsMaxNestingLevels = 999;
    if ($archive->is('index')) {
        $archive->parameter->pageSize = 12;
    }
}

?>

