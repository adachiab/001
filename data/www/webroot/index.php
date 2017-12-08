<?php
// if (empty($_SERVER['PATH_INFO'])) {
//     //インデックスページを表示
//     include('../Index/IndexView.php');
//     // echo 'hello world.';
//     exit;
// }

//スラッシュで区切られたurlを取得します
$analysis = explode('/', $_SERVER['PATH_INFO']);
$call='index';

foreach ($analysis as $value) {
    if ($value !== "") {
        $call = $value;
        break;
    }
}

//DAOをinclude
include('../Common/Config/database.php');
include('../Common/Dao.php');

if (file_exists('../Model/'.$call.'.php')) {
    include('../Model/'.$call.'.php');
    //$call名のクラスをインスタンス化します
    $class = new $call();
    //modelのindexメソッドを呼ぶ仕様です
    $ret = $class->index($analysis);
    //配列キーが設定されている配列なら展開します
    if (!is_null($ret)) {
        if(is_array($ret)){
           extract($ret);
        }
    }
}
//
//viewをインクルードします
if (file_exists('../View/'.$call.'.php')) {
    include('../View/'.$call.'.php');
} else {
    include('../View/error.php');
}

//controllerをインクルードします
if (file_exists('../Controller/'.$call.'.php')) {
    include('../Controller/'.$call.'.php');
} else {
    include('../Controller/error.php');
}
