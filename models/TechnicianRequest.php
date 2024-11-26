<?php

namespace app\models;

use app\controllers\TechnicianController;
use app\core\DbModel;

class TechnicianRequest extends DbModel
{
    public static function getRequestsByTechnicianId($technicianId)
    {
        $sql = "SELECT r.req_id, r.cus_id, r.status, CONCAT(c.fname, ' ', c.lname) AS cus_name
                FROM cus_tech_req r
                JOIN customer c ON r.cus_id = c.cus_id
                WHERE tech_id = :tech_id";
        $stmt = (new TechnicianRequest)->prepare($sql);
        $stmt->bindValue(':tech_id', $technicianId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

//        return self::prepare($sql)->execute(['tech_id' => $technicianId])->fetchAll();
    }

    public static function updateStatus($reqId, $status)
    {
        $sql = "UPDATE cus_tech_req SET status = :status WHERE req_id = :req_id";
        return (new TechnicianRequest)->prepare($sql)->execute(['status' => $status, 'req_id' => $reqId]);
    }

    public function tableName(): string
    {
        return 'cus_tech_req';
    }

    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['req_id', 'cus_id', 'tech_id', 'status'];
    }

    public function primaryKey(): string
    {
        return 'req_id';
    }

    public function updateRules(): array
    {
        return [
            
        ];
    }
}
