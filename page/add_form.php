<?php
require_once __DIR__ . '/../model/EquipmentRepository.php';

try {
    $repo = new EquipmentRepository();
    $types = $repo->GetTypes();
} catch (Exception $ex) {
    $types = [];   
}
?>


<div class="container mt-lg-5">
    <h2>Введите необходимую информацию:</h2>
</div>
<div class="container">
    <form class="row align-items-start border bg-light" id="addForm" 
          action="middlewares/check_form.php" method="post">
        <div class="col-4"></div>
        <div class="col-6 g-4">
            <div class="col-6"><label for="serial_numbers" class="form-label">
                    Введите список серийных номеров:</label>
            </div>
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"><textarea required="required" id="serial_numbers" 
                name="serial_numbers" class="form-control-lg" rows="7"></textarea>
            </div>
        </div>
        <div class="row g-3 ">
            <div class="col-4"></div>
            <div class="col-3">
               <select required="required" id="equip_type" name="equip_type" 
                       class="form-select">
                <option value="">Выберите тип устройства</option>
                <?php
                foreach ($types as $type) {?>
                    <option value="<?php echo $type['id']?>">
                        <?php echo $type['type'] ?></option>
                <?php } ?>
                </select>
                <label id="equip_type_result" /> 
            </div>
        </div>
        <div class="row g-2">
            <div class="col-5"></div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary ">Отправить</button>
            </div>
        </div>
    </form>
</div>

