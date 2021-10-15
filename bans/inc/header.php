<?php

class Header {
/**
 * @param $page Page
 */
function __construct($page) {
    $this->page = $page;
    if ($page->settings->header_show_totals) {
        $t = $page->settings->table;
        $t_bans = $t['bans'];
        $t_mutes = $t['mutes'];
        $t_warnings = $t['warnings'];
        $t_kicks = $t['kicks'];
        try {
            $st = $page->conn->query("SELECT
            (SELECT COUNT(*) FROM $t_bans) AS c_bans,
            (SELECT COUNT(*) FROM $t_mutes) AS c_mutes,
            (SELECT COUNT(*) FROM $t_warnings) AS c_warnings,
            (SELECT COUNT(*) FROM $t_kicks) AS c_kicks");
            ($row = $st->fetch(PDO::FETCH_ASSOC)) or die('Failed to fetch row counts.');
            $st->closeCursor();
            $this->count = array(
                'bans.php'     => $row['c_bans'],
            );
        } catch (PDOException $ex) {
            Settings::handle_error($page->settings, $ex);
        }
    }
}

function navbar($links) {
    echo '<ul class="navbar-nav mr-auto">';
    foreach ($links as $page => $title) {
        $li = "li";
        $class = "nav-item";
        if ((substr($_SERVER['SCRIPT_NAME'], -strlen($page))) === $page) {
            $class .= " active";
        }
        $li .= " class=\"$class\"";

        if ($this->page->settings->header_show_totals && isset($this->count[$page])) {
            $title .= " <span class=\"badge badge-secondary\">";
            $title .= $this->count[$page];
            $title .= "</span>";
        }
        echo "<$li><a class=\"nav-link\" href=\"$page\">$title</a></li>";
    }
    echo '</ul>';
}

function print_header() {
$settings = $this->page->settings;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Made by iFactions.tk">
    <meta name="author" content="iFactions">
	<meta name="link" content="https://ifactions.tk">
    <link rel="shortcut icon" href="inc/img/minecraft.ico">
    <!-- CSS -->
    <link href="<?php echo $this->page->autoversion('inc/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo $this->page->autoversion('./inc/css/custom.css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->page->autoversion('inc/css/glyphicons.min.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="inc/script.js"></script>
    <script type="text/javascript">
        function withjQuery(f) {
            if (window.jQuery) f();
            else window.setTimeout(function () {
                withjQuery(f);
            }, 100);
        }
    </script>
	<script>
	    var guild_id = "715615521231601664";
  axios.get(`https://discordapp.com/api/guilds/${guild_id}/widget.json`).then(response => {
  document.getElementById("count").innerHTML = response.data.members.length + " " });
  	<!-- *** Credits for script to discordbothosting.com -->
	</script>
</head>

<div class="header">
<div class="cyvers-nav">
    <div class="dd-bg" onclick="closeMobile()"></div>
		<div class="modal" id="popup-modal" tabindex="-1" role="dialog"></div>
                    <div class="dd-mobile">
                        <li>   
                            <a href="javascript:void(0)" onclick="openMobile()">
                                <i class="fas fa-bars"></i><span> Menu</span>
                            </a>
                        </li>
                    </div>
<ul id="main-nav" class="">
                        <div class="dd-close">
                            <a href="javascript:void(0)" onclick="closeMobile()"><i class="fas fa-times"></i> close</a>
                        </div>
                        <li><a href="/" target="_blank"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="https://czech-craft.eu/server/ifactions-pvp-frakcni-server/vote/" target="_blank"><i class="fas fa-thumbs-up"></i> Vote</a></li>
                        <li><a href="/bans" target="_blank"><i class="fas fa-gavel"></i> Bans</a></li>
                        <li class="store"><a href="https://store.ifactions.tk/category/257114" target="_blank"><i class="fas fa-store-alt"></i> Store</a></li>
                    </ul>
										</div>

    <div class="logo">
        <a href="/"><img height="73.891px" width="550px" src="https://ifactions.tk/img/logo.png"></a>
    </div>

<div class="cyvers-count" id="mobile-hide">
<div class="container">
<div class="left">
                    <i class="fas fa-globe"></i>
                    <div class="text-large players icons-enabled"><span id="players"></span> Players Online</div>
										<small class="ipCopy" data-clipboard-text="play.ifactions.tk" style="background: transparent;border: transparent;     cursor: pointer; " onclick="serverjoin()">Click to copy IP</small>
                </div>
<div class="right">
                    <i class="fab fa-discord"></i>
										<div class="text-large players icons-enabled"><span id="count"></span> Players Online</div>
										<small><a href="https://discord.ifactions.tk/" target="blank">Join Our Discord</a></small>
            </div>
       </div>
    </div>
</div>
</div>

	<script>
	  new ClipboardJS('.ipCopy');
	</script>

<header role="banner">
    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#litebans-navbar"
                    aria-controls="litebans-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="litebans-navbar">
			<ul class="nav navbar-nav">
                <?php
                $this->navbar(array(
                    "bans.php"     => $this->page->t("title.bans"),
                ));
                ?>
				</ul>
            </div>
        </div>
</header>

<br><br><br>
<?php
}
}
?>
