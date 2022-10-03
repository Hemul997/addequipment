<?php
require_once __DIR__. '/../model/EquipmentRepository.php';
require_once __DIR__. '/../auxiliary/MaskMatcher.php';

session_start();

$serial_nums = $equip_type = "";
$repo = new EquipmentRepository();
$errors = array();


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $serial_nums = explode("\r\n", $_POST['serial_numbers']);
    $type_id = clear_input($_POST['equip_type']);
    $mask = $repo->GetMaskById($type_id);
    
    foreach ($serial_nums as $serial_number) {
        if (MaskMatcher::Is_Match($mask, clear_input($serial_number))){
            
            if ($repo->IsUnique($serial_number)) {
                $repo->AddSerialNumberByType($type_id, $serial_number);
            } else {
                $errors[] = 'Введенный серийный номер ' . $serial_number 
                        . ' уже есть в базе данных.';
            }
        } else {
            $errors[] = ' Введенный серийный номер ' . $serial_number
                    . ' не соответствует типу оборудования, указанному в форме.';
        }
    }
    if (count($errors) != 0) {
        $_SESSION['sn_errors'] = $errors;
        header('Location: /page/error.php');
    } else {
        header('Location: /');
    }
    
}

function clear_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}