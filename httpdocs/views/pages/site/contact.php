<?php
namespace Noneslad\Controllers;
use Noneslad\Entity\email;
use Noneslad\Tools\WebTools;


if (isset($_POST['soci'])
    && isset($_POST['tel'])
    && isset($_POST['prenom'])
    && isset($_POST['email'])
    && isset($_POST['message'])
    /*vérification vide ou pas*/
    && !empty($_POST['email'])
    && !empty($_POST['message'])
    && !empty($_POST['objet'])) {


    $email = addslashes($_POST['email']);
    $prenom = addslashes($_POST['prenom']);
    $message = addslashes($_POST['message']);
    $phone = addslashes($_POST['tel']);
    $soci = addslashes($_POST['soci']);


                /*                 * ************************* */
                /*                 * *** Envoi des mails ***** */
                /*                 * ************************ */
                // envoi du mail
                $ree = "Votre message a ètè bien envoyé";
                $msg = "
     <p>Bonjour, </p>
     <p><strong>Vous avez reçu une demande d'information: </strong></p>
     <strong>prenom : </strong>" . stripslashes($prenom) . "<br/>
     <strong> soci&eacute;t&eacute; : </strong>" . stripslashes($soci) . "<br/>
     <strong>message : </strong>" . stripslashes($message) . "<br/>
     <strong> email : </strong>" . stripslashes($email) . " <br/>
     <strong> télèphone : </strong>" . stripslashes($phone) . " <br/>";
      $return_path = "-f" . "webchalon@gmail.com";
                $recipient = stripslashes("contact@spectasonic.com");
                $subject = "Site spectasonic : nouveau message";
                $mailheaders = "MIME-Version: 1.0 \n";
                $mailheaders .= "Content-type: text/html; charset=UTF-8 \n";
                $mailheaders .= "From:".$nom." <".$email."> \n";
                $mailheaders .= "Reply-To: ".$email."\n\n";
                mail($recipient, $subject, $msg, $mailheaders,'-f noreply@spectasonic.com');
                echo '<div style="display: block; " class="alert alert-success" role="alert">' . $ree . '</div>';
            }

		?>
			<main id="main" class="tg-main-section tg-haslayout tg-bgwhite">
			<div class="container">
				<div class="row">
					<div class="tg-info tg-haslayout">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="tg-infobox tg-border">
								<div class="tg-displaytable">
									<div class="tg-displaytablecell">
										<i class="icon-location"></i>
										<div class="tg-heading-border">
											<h3>Local</h3>
											<address>6 Place Charles HERNU, Le Colysée - 69100 VILLEURBANNE</address>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="tg-infobox tg-border">
								<div class="tg-displaytable">
									<div class="tg-displaytablecell">
										<i class="icon-telephone60"></i>
										<div class="tg-heading-border">
											<h3>Tel</h3>
											<span>+44 - 123 - 456 - 789</span>
											<span>+0800 - 123 - 456 - 789</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="tg-infobox tg-border">
								<div class="tg-displaytable">
									<div class="tg-displaytablecell">
										<i class="icon-email"></i>
										<div class="tg-heading-border">
											<h3>Email </h3>
											<span><a href="support@spectasonic.com">support@spectasonic.com</a></span>
											<span><a href="contact@spectasonic.com">contact@spectasonic.com</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-main-section tg-relativepostion tg-haslayout">
				<div class="tg-relativepostion tg-lightgray tg-haslayout">
					<div class="tg-contact-form tg-haslayout">
						<div class="tg-displaytable">
							<div class="tg-displaytablecell">
								<div class="container">
									<div class="row">
										<div class="col-md-6 col-sm-12 col-xs-12 pull-right">
											<h2>Contact</h2>
											<form class="tg-form-contact" method="post" action="">
												<fieldset>
													<div class="col-sm-6">
														<div class="form-group">
															<input type="text" class="form-control" name="prenom" placeholder="Prénom">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<input type="text" class="form-control"  name="tel" placeholder="Tel">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<input type="text" class="form-control" name="soci"  placeholder="Société">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<input type="email" class="form-control"  name="email" placeholder="Email">
														</div>
													</div>
													<div class="col-xs-12">
														<div class="form-group">
															<textarea class="form-control"  name="message"  placeholder="Message"></textarea>
														</div>
													</div>
													<div class="col-xs-12">
														<button class="tg-btn">Envoyer</button>
													</div>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 pull-left">
						<div class="row">
							<div class="tg-mapbox">
								<div id="tg-location-map" class="tg-location-map tg-haslayout"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2783.0452955591263!2d4.8616040150134925!3d45.77028247910574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea85718bc503%3A0xe33fb4a36aa61dca!2s6+Place+Charles+Hernu%2C+69100+Villeurbanne!5e0!3m2!1sfr!2sfr!4v1482957773412" width="600" height="665" margin-top="60px" frameborder="0" style="border:0" allowfullscreen></iframe></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="container">
				<div class="row">
					<div class="tg-brands tg-paddingzero tg-haslayout">
						<div class="col-sm-3 col-xs-6">
							<div class="tg-brand">
								<div class="tg-displaytable">
									<figure class="tg-displaytablecell">
										<img src="assets/images/brands/img-01.png" alt="image description">
									</figure>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="tg-brand">
								<div class="tg-displaytable">
									<figure class="tg-displaytablecell">
										<img src="assets/images/brands/img-02.png" alt="image description">
									</figure>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="tg-brand">
								<div class="tg-displaytable">
									<figure class="tg-displaytablecell">
										<img src="assets/images/brands/img-03.png" alt="image description">
									</figure>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">
							<div class="tg-brand">
								<div class="tg-displaytable">
									<figure class="tg-displaytablecell">
										<img src="assets/images/brands/img-04.png" alt="image description">
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
