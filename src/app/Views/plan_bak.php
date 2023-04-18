<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">
    -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" integrity="sha256-l3FykDBm9+58ZcJJtzcFvWjBZNJO40HmvebhpHXEhC0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ajax-bootstrap-select/1.4.5/css/ajax-bootstrap-select.min.css" integrity="sha256-HKOQCo5VaPKgJRwrqv+7j2wQqLAduu1Aw1zKEJ+nSg0=" crossorigin="anonymous" />

    <!-- Favicons -->
    <!--
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    -->

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
        font-weight: bold;
        margin-bottom: -5px;
      }
			.occupancy {
				padding: 4px 2px 0 0;
				float:right;
				font-size:.8em;
			}
      .times {
        height:14px;
        font-size:.7em;
        margin-left: -1.4em;
        margin-right: 1.4em;
      }
      .times > .time {
        height:100%;
        float:left;
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
  <body style="background-image: url('<?php echo base_url('img/instinct.png'); ?>');">

		<nav class="navbar fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
				<img src="<?php echo base_url('img/zapdos.png'); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
				Hildburghausen
			</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto">
					<li class="nav-item">
            <a class="nav-link" href="#">
							<img src="<?php echo base_url('img/bullet_white.png'); ?>" class="d-inline-block align-middle" alt="">
							All Teams
						</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">
							<img src="<?php echo base_url('img/bullet_yellow.png'); ?>" class="d-inline-block align-middle" alt="">
							Instinct
						</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="#">
							<img src="<?php echo base_url('img/bullet_red.png'); ?>" class="d-inline-block align-middle" alt="">
							Valor
						</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="#">
							<img src="<?php echo base_url('img/bullet_blue.png'); ?>" class="d-inline-block align-middle" alt="">
							Mystic
						</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="container">
			<?php for ($i = 1; $i <= 20; $i++): ?>
      <div class="row">
        <div class="col">
          <div class="name">
						Holzwildschwein <span class="badge badge-dark">EX</span>
					</div>
					<div class="occupancy">
						<img src="<?php echo base_url('img/bullet_white.png'); ?>" class="d-inline-block align-middle"/>2/6
					</div>
          <div class="times">
            <div class="time" style="width:5%"></div>
            <div class="time" style="width:45%">05:00</div>
            <div class="time">17:00</div>
          </div>
          <div class="timeline">
            <div class="days">
              <div class="day" style="width:57.8%"></div>
            </div>
            <div class="slots" style="background-color:#3498DB">
              <div class="slot" style="width:0.1%;background-color:#E74C3C"></div>
              <div class="slot" style="width:4%;background-color:#E74C3C"></div>
              <div class="slot" style="width:4%;background-color:#E74C3C"></div>
              <div class="slot" style="width:4%;background-color:#E74C3C"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#F4D03F"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
              <div class="slot" style="width:4%;background-color:#3498DB"></div>
            </div>
          </div>
          <div class="current"></div>
        </div>
      </div>
			<?php endfor; ?>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
