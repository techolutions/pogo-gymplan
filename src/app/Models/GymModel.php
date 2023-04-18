<?php namespace App\Models;

use CodeIgniter\Model;

class GymModel extends Model
{
    protected $table         = 'gym';
    protected $primaryKey    = 'gym_id';
    protected $allowedFields = [];
    protected $useTimestamps = false;
    protected $returnType    = 'App\Entities\Gym';

    public function findInGeofence($polygon) {
      $sql = 'SELECT name, description, url, team_id, slots_available, enabled, is_ex_raid_eligible, latitude, longitude FROM gymdetails INNER JOIN gym ON gym.gym_id = gymdetails.gym_id WHERE ST_CONTAINS(ST_GEOMFROMTEXT(:polygon:), POINT(latitude, longitude)) ORDER BY latitude DESC, longitude DESC';
      $query = $this->db->query($sql, [
        'polygon' => 'POLYGON(('.$polygon.'))'
      ]);

      return $query->getResult($this->returnType);
    }
}
