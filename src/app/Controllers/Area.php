<?php namespace App\Controllers;

class Area extends BaseController
{
	public function index(String $location = null)
	{
		if (!isset($location)) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		$gyms = $this->getGyms($location);
		$data = $this->calculate($gyms, 25, 1, 12, 1577851200); //01.01.2020 04:00 (UTC) - 1577851200
		$data['location'] = mb_strtoupper($location);

		return view('plan', $data);
	}

	private function calculate(array $gyms, float $window, float $interval, float $rotation, int $origin) {
		date_default_timezone_set('Europe/Berlin');

		$default  = ['label'=> 'all', 'name' => 'Alle Teams', 'color' => '#909090', 'bullet' => base_url('img/bullet_white.png'), 'icon' => null, 'background' => base_url('img/default.png')];
		$mystic   = ['label'=> 'mystic', 'name' => 'Mystic', 'color' => '#3498db', 'bullet' => base_url('img/bullet_blue.png'), 'icon' => base_url('img/articuno.png'), 'background' => base_url('img/mystic.png')];
		$valor    = ['label'=> 'valor', 'name' => 'Valor',	'color' => '#e74c3c', 'bullet' => base_url('img/bullet_red.png'), 'icon' => base_url('img/moltres.png'), 'background' => base_url('img/valor.png')];
		$instinct = ['label'=> 'instinct', 'name' => 'Instinct', 'color' => '#f4d03f', 'bullet' => base_url('img/bullet_yellow.png'), 'icon' => base_url('img/zapdos.png'), 'background' => base_url('img/instinct.png')];

		$teams = [$default, $mystic, $valor, $instinct];
		$current = $default;
		foreach ($teams as $team) {
			if ($this->request->getGet('t') == $team['label']) {
				$current = $team;
			}
		}
		$data['teams'] = $teams;
		$data['current'] = $current;

		$w = intval($window * 3600);
		$i = intval($interval * 3600);
		$r = intval($rotation * 3600);
		$o = intval($origin - (date('I') * 3600));
		$n = intval(round(time() / 300) * 300);
		$s = intval($n - ($w / 2));
		$e = $s + $w;

		$t = [$valor, $mystic, $instinct];


		$c = $o + floor(($s - $o) / $r) * $r;
		$times = [];
		while($c < $e) {
			$time['s'] = max($s, $c);
			$c += $r;
			$time['e'] = min($e, $c);
			$time['p'] = round(($time['e'] - $time['s']) / $w * 100, 1);
			array_push($times, $time);
		}
		$data['times'] = $times;


		$c = mktime(0, 0, 0, date('n', $s), date('j', $s), date('Y', $s));
		$days = [];
		while ($c < $e) {
			$day['s'] = max($s, $c);
			$c += 86400;
			$day['e'] = min($e, $c);
			$day['p'] = round(($day['e'] - $day['s']) / $w * 100, 1);
			array_push($days, $day);
		}
		array_pop($days);
		$data['days'] = $days;


		$c = intval(floor($s / $i) * $i);
		$slots = [];
		while($c < $e) {
			$slot['s'] = max($s, $c);
			$c += $i;
			$slot['e'] = min($e, $c);
			$slot['p'] = round(($slot['e'] - $slot['s']) / $w * 100, 1);
			$slot['t'] = floor(($slot['s'] - $o) / $r) % count($t);
			array_push($slots, $slot);
		}
		$data['upcoming'] = array_pop($slots);
		$data['slots'] = $slots;

		$data['gyms'] = [];
		foreach ($gyms as $gym) {
			$item['name'] = $gym->name;
			$item['link'] = sprintf('https://maps.google.de/?q=%f,%f', $gym->latitude, $gym->longitude);
			$item['exraid'] = (bool) $gym->is_ex_raid_eligible;
			$item['bullet'] = $teams[$gym->team_id]['bullet'];
			$item['occupied'] = 6 - $gym->slots_available;
			$item['team'] = $t;

			if ($current['label'] == $default['label'] || $current['label'] == $t[$slots[round(count($slots)/2)]['t']]['label']) {
				array_push($data['gyms'], $item);
			}

			array_push($t, array_shift($t));
		}

		return $data;
	}

	private function getGyms(String $location) : array {
		$gymModel = new \App\Models\GymModel();
		$gyms = [];

		switch(mb_strtolower($location)) {
			default:
				$polygon = $this->readGeofence($location);
				$gyms = $gymModel->findInGeofence($polygon);
				break;
		}

		return $gyms;
	}

	private function readGeofence(String $location) : String {
		$filename = sprintf('./geofence/%s.txt', $location);
		if (!is_file($filename)) throw new \Exception("file not found");

		$lines = file($filename);

		foreach ($lines as $key => $line) {
			$lines[$key] = trim(str_replace(',', ' ', $line));
			if (preg_match('/\[.*\]/', $line)) unset($lines[$key]);
		}

		$lines = array_values($lines);
		$first = array_shift($lines);
		$last = array_pop($lines);
		array_unshift($lines, $first);
		array_push($lines, $last);
		if ($first != $last) array_push($lines, $first);

		return implode(', ', $lines);
	}



	//--------------------------------------------------------------------

}
