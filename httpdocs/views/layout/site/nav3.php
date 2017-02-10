<?php
namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;

use Noneslad\Entity\PageWeb;

  ?>
 
 
<div class="tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="../admin/<?php $lien = WebTools::fromRequest('site'); echo pageweb::givPage($lien)->slide; ?>">
			<div class="container">
				<h1><?php $lien = WebTools::fromRequest('site'); echo pageweb::givPage($lien)->nom; ?></h1>
				<!--<ol class="tg-breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">about us</li>
				</ol>-->
			</div>
		</div>