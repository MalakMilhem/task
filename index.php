<?php
require_once('Validator.php');

$testFile = ['array','json','xml','invalidXml','invalidJsonStructure'];
foreach ($testFile as $index=>$fileName) {
    if($fileName=='array')
        $sting = include ($fileName);
    else
        $sting = file_get_contents($fileName);
    $stringType = Validator::getStringType($sting);

    if (class_exists($stringType)) {
        $model = new $stringType();
        $model->set($sting);
        if ($model->load()) {
            echo "Valid String <br>";
            $transaction = new Transaction($model->decodedValue);

            if ($transaction->checkStructure())
                echo "Data is right <br><br>";
            else
                echo "Data is invalid <br><br>";

        }
    } else
        echo "undifine data type <br><br>";
}