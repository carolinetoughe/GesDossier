<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GesDos</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="design/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="design/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="design/css/style.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <!-- <a class="navbar-brand" href="#"><img src="design/img/logo.jpeg" class="img-responsive" style="width: 140px; margin-top: -16px;"></a> -->
            </div>
            @if (Route::has('login'))

            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#banner">Accueil</a></li>
                <li class=""><a href="#about">Etablissement</a></li>
                <li class=""><a href="#doctor-team">Docteurs</a></li>
                <li class=""><a href="#service">Services</a></li>
                <li class=""><a href="#contact">Contact</a></li>
                    @auth
                    <li class=""><a href="{{ url('/home') }}">Espace Medical</a></li>
                    @else
                    <li class=""><a href="{{ route('login') }}">Espace Medical</a></li>
                    @endauth

                    @auth
                    <li class=""><a href="{{ url('patient/home') }}">Espace Patient</a></li>
                    @else
                    <li class=""><a href="{{ route('patient.login') }}">Espace Patient</a></li>
                    @endauth
            </ul>
            @endif
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <!-- <img src="design/img/logo.jpeg" class="img-responsive"> -->
            </div>
            <div class="banner-text text-center">
              <h1 class="red">Votre dossier médical à portée de main</h1>
              <p>Bienvenue à la Clinique Hématologie du CNTS<br>.</p>
              
              {{-- <a href="{{ route('createp') }}" class="btn btn-appoint">Prendre Un Rendez-vous.</a> --}}

            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--about-->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row col-lg-12">
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="section-title">
            <h2 class="head-title lg-line">Clinique Hématologie <br></h2>
            <hr class="botm-line">
            <p class="sec-para">La Clinique du CNTS, spécialisée en hématologie, possède 10 lits d'hospitalisation conventionnelle (500 séjours/an) et 8 places en urgence. 5 médecins spécialistes et une equipe d'infirmiers assurent ces prises en charge. Elle collabore avec le Centre National De Transfusion Sanguine qui est la branche principale.</p>
            <!-- <a href="" style="color: #0cb8b6; padding-top:10px;">Know more..</a> -->
          </div>
        </div>
        <div class="col-md-5 col-sm-8 col-xs-12">
          <div style="visibility: visible;" class="col-sm-9 more-features-box">
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Lutte Contre La Drepanocytose.</h3>
                <!-- <p> .</p> -->
              </div>
              <br>
            </div>
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Lutte Contre les maladies hémorragiques comme l’hémophilie et les anémies.</h3>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.</p> -->
              </div>
            </div>
          </div>
        </div>
        <div class="schedule-tab">
          <div class="col-md-3 col-sm-8 col-xs-12">
            <div class="mt-boxy-color"></div>
            <div class="time-info">
              <h3>Heures d'Ouverture</h3>
              <table style="margin: 8px 0px 0px;" border="1">
                <tbody>
                  <tr>
                    <td>Lundi - Vendredi </td>
                    <td>8.00 - 15.00</td>
                  </tr>
                  <tr>
                    <td>Samedi - Dimanche</td>
                    <td>Fermé</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      
      </div>
    </div>
  </section>
  <!--/ about-->
  
  <!--doctor team-->
  <section id="doctor-team" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Notre Equipe Médical</h2>
          <hr class="botm-line">
        </div>

        @foreach ($data as $user)
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
         
            <img src="{{ asset('storage/'.$user->image) }}" alt="..." class="team-img"/>
            <div class="caption">
        
              <h3>{{ $user->name }}</h3>
              <h3>{{ $user->prenom }}</h3>
              <p>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
                </p>
            </div>
           
            <br>
          </div>
        </div>
        @endforeach



      </div>
    </div>
  </section>
  <!--/ doctor team-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Services Du Site</h2>
          <hr class="botm-line">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris cillum.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-upload"></i>
            </div>
            <div class="icon-info">
              <h4>Fichiers Telechargeables</h4>
              <p>Chaques documents etablis a la possibilité d'etre telechargés  .</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-folder-open"></i>
            </div>
            <div class="icon-info">
              <h4>Dossier Médical Complet</h4>
              <p>Lieu de stokage retracant des épisodes ayant affecté la santé,allergies,examens,bons d'analyse et .</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <div class="icon-info">
              <h4>Consultation Medical</h4>
              <p>Retrouver les détails de chaque consultation regroupés en seul endroit.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="icon-info">
              <h4>Prescription Medical</h4>
              <p>Service de base minimal pour la prescription electronique de médicaments et analyses.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  <!--contact-->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Nous Contacter</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <h3>Informations</h3>
          <div class="space"></div>
          <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Sacré Coeur 3 Extension<br> Dakar,Sénégal</p>
          <div class="space"></div>
          <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>etoughe@gmail.com</p>
          <div class="space"></div>
          <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>776214013</p>
        </div>
        <div class="col-md-8 col-sm-8 marb20">
          <div class="contact-info">
            <h3 class="cnt-ttl">Vous Avez Une Question? Ecrivez-Nous!</h3>
            <div class="space"></div>
            <div id="sendmessage">Votre message a bien été envoyé. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="subject" id="subject" placeholder="Sujet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

              <div class="form-action">
                <button type="submit" class="btn btn-form">Envoyer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ contact-->
  <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">A propos de Nous</h4>
            </div>
            <div class="info-sec">
              <p>Le site GesDos représente la plateforme de gestion des dossiers médicaux de la Clinique Hématologique du Centre National de Transfusion Sanguine.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Quelques Liens</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.html"><i class="fa fa-circle"></i>Accueil</a></li>
                <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
                <li><a href="#contact"><i class="fa fa-circle"></i>Contact</a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright ETOUGHE Christelle Caroline Julie.
            
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->


  <script src="{{ asset('design/js/jquery.min.js') }}"></script>
  <script src="{{ asset('design/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('design/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('design/js/custom.js') }}"></script>
  <script src="{{ asset('design/contactform/contactform.js') }}"></script>

</body>

</html>
