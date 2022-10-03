<?php
require_once __DIR__ . '/../db/DBConnector.php';

class EquipmentRepository {

    private DBConnector $dBConnector;

    public function __construct() {
        $this->dBConnector = DBConnector::GetInstance();
    }

    public function GetTypes(): array {
        $result = [];
        
        try {
            $query = 'Select id, type FROM equipment_type';
            $stmt = $this->dBConnector->GetConnection()->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $ex) {
            //For Debug
            //var_dump($ex->errorInfo);
        }
        
        return $result;
    }
    
    public function GetMaskById($id): string {
        $result = '';
        
        try {
            $query = 'SELECT sn_mask FROM equipment_type WHERE id= :id';
            $stmt = $this->dBConnector->GetConnection()->prepare($query);
            $stmt->execute(["id" => $id]);
            
            if ($stmt->rowCount()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC)['sn_mask'];
            }
        } catch (PDOException $ex) {
            //For Debug
            //var_dump($ex->errorInfo);
        }        
        return $result;
    }
    
    public function AddSerialNumberByType($type_id, $serial_number): bool {
        $inserted_count = 0;
        
        try {
            $connection = $this->dBConnector->GetConnection();
            $query = "INSERT INTO equipment (type_id, serial_number) "
                    . "VALUES ('$type_id', '$serial_number') ";
            $inserted_count = $connection->exec($query); 
        } catch (PDOException $ex) {
            //For Debug
            //var_dump($ex->errorInfo);
        }
        
        return $inserted_count > 0;
    }
    
    public function IsUnique($serial_number): bool {
        try {
            $query = "SELECT id FROM equipment "
                    . "WHERE BINARY serial_number= :serial_number";
            $stmt = $this->dBConnector->GetConnection()->prepare($query);
            $stmt->execute(["serial_number" => $serial_number]);
            return $stmt->rowCount() == 0;
        } catch (PDOException $ex) {
            //For Debug
            //var_dump($ex->errorInfo);
            return false;
        }
    }
    
}
