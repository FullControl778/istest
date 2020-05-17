<?php
use yii\db\ActiveRecord;
use frontend\controllers\SiteController;
use backend\controllers\GalleryController;

//$result = \backend\models\Gallery;
//$result = \backend\models\Gallery::tableName()->$albums;
$table = \backend\models\Gallery::tableName($_GET['gallery']);
print_r($result);



//$result = $modelClass;
//echo (privet);
//print_r($result);



//if (isset($_POST["name"])) {
//    // Формируем массив для JSON ответа
//    $result = array(
//        'name' => $_POST["name"],
//    );
//
//    // Переводим массив в JSON
//    echo json_encode($result);
//}
//

//include($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
//
//use classes\base\Application;
//
//Application::getInstance()->start();
//$user = Application::getInstance()->user;
//
//$result = $user->checkIsAbonentByPhone($_GET['phone']);
//
//echo json_encode($result);
// if ($result === true) {
//     echo "1";
// } else {
//     echo "0";
// }