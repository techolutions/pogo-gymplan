<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="300">

    <title>ARENAPLAN | <?= $location; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" integrity="sha256-l3FykDBm9+58ZcJJtzcFvWjBZNJO40HmvebhpHXEhC0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ajax-bootstrap-select/1.4.5/css/ajax-bootstrap-select.min.css" integrity="sha256-HKOQCo5VaPKgJRwrqv+7j2wQqLAduu1Aw1zKEJ+nSg0=" crossorigin="anonymous" />

    <style>
			body {
				padding-top: 65px;
				background-color: #888;
				background-size: 80% auto;
				background-position: center 25vh;
				background-repeat: no-repeat;
				background-attachment: fixed;
			}
      .col {
        margin-bottom:-20px;
				color:#fff;
				text-shadow: 0 0 5px #000;
      }
      .name {
				display:inline-block;
        font-weight:bold;
        margin-bottom:-3px;
        max-width:90%;
      }
      .name a {
				text-decoration:none;
        color:inherit;
      }
			.occupancy {
				padding: 4px 2px 0 0;
				float:right;
				font-size:.8em;
			}
      .times {
        position:relative;
        left:-1.3em;
        height:14px;
        font-size:.7em;
        clear:both;
        overflow:hidden;
      }
      .times > .time {
        height:100%;
        float:left;
      }
      .times > .time:last-child {
        width:auto !important;
      }
  		.timeline {
        height:20px;
        border:1px solid #666;
        border-radius:0 0 6px 6px;
        overflow:hidden;
      }
      .timeline > .days {
        height:5px;
        border-bottom:1px solid #666;
        background-color:#ddd;
      }
      .timeline > .days > .day {
        float:left;
        height:100%;
        border-right:1px solid #666;
        box-sizing:border-box;
      }
      .timeline > .slots {
        height:15px;
      }
      .timeline > .slots > .slot {
        float:left;
        height:100%;
        border-right:1px solid #666;
        box-sizing:border-box;
      }
      .current {
        border-left: 1px solid #666;
				width: 50%;
        display: block;
        height: 32px;
        position: relative;
        left: calc(50% - 1px);
        top: -32px;
      }
    </style>

  </head>
  <body style="background-image: url('<?= $current['background'] ?>');">

		<nav class="navbar fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <?php if (isset($current['icon'])): ?>
				<img src="<?= $current['icon'] ?>" width="30" height="30" class="d-inline-block align-top" alt="<?= $current['name'] ?>">
        <?php endif; ?>
				<?= $location; ?>
			</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto">
          <?php foreach ($teams as $team): ?>
					<li class="nav-item <?= ($team == $current) ? 'active' : ''; ?>">
            <a class="nav-link" href="?t=<?= $team['label']; ?>">
							<img src="<?= $team['bullet']; ?>" class="d-inline-block align-middle" alt="">
							<?= $team['name']; ?>
						</a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>


    <div class="container">
			<?php foreach ($gyms as $gym): ?>
      <div class="row">
        <div class="col">
          <div class="name">
						<a href="<?= $gym['link']; ?>" target="_blank"><?= $gym['name']; ?> <?php if ($gym['exraid']): ?><span class="badge badge-dark">EX</span><?php endif; ?></a>
					</div>
					<div class="occupancy">
						<img src="<?= $gym['bullet']; ?>" class="d-inline-block align-middle"/><?= $gym['occupied']; ?>/6
					</div>
          <div class="times">
            <?php foreach ($times as $key => $time): ?>
            <div class="time" style="width:<?= $time['p']; ?>%"><?= ($key != 0) ? date('H:i',$time['s']) : ''; ?></div>
            <?php endforeach; ?>
          </div>
          <div class="timeline">
            <div class="days">
              <?php foreach ($days as $day): ?>
              <div class="day" style="width:<?= $day['p']; ?>%"></div>
              <?php endforeach; ?>
            </div>
            <div class="slots" style="background-color:<?= $gym['team'][$upcoming['t']]['color']; ?>">
              <?php foreach ($slots as $slot): ?>
              <div class="slot" style="width:<?= $slot['p']; ?>%;background-color:<?= $gym['team'][$slot['t']]['color']; ?>"></div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="current"></div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
