@extends('layouts.apppatient')
@section('content')
    {{-- <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Gestion de Votre Profil</h1>
        </div>
        <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('patient.editinfo', $patient->id) }}">Modifier Informations</a>
            </div>
        <div class="card">
            <div class="card-body">
                        <img src="{{ URL::to('/') }}/images/{{ $patient->image }}"width="100" height="80"  class="img-thumbnail" />
                            
                <h5 class="card-title">Coordonnées </h5>
                <table class="table">
                    <tbody>
        <br>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Numero de Dossier</td>
                            <td>{{ $patient->dossier }}</td>
                        </tr>
                        <tr>
                            <td>Numero de Piece d'Identite</td>
                            <td>{{ $patient->pieceidentite }}</td>
                        </tr>

                        <tr>
                            <td>Nom </td>
                            <td>{{ $patient->nom }}</td>
</tr>
                            
                            <tr>
                            <td>Adresse</td>
                            <td>{{ $patient->adresse }}</td>
                            </tr>
                            <tr>
                            <td>Nationalite</td>
                            <td>{{ $patient->nationalite }}</td>
                            </tr>
                            <td>numero Telephone</td>
                            <td>{{ $patient->numerotelephone }}</td>
                            </tr>
                
                <tr>
                            <td>Sexe</td>
                            <td>{{ $patient->sexe }}</td>
                </tr>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $patient->email }}</td>
                        </tr>
                        
                        <h5 class="card-title">Coordonnées Medicales</h5>

                        
                        <tr>
                            <td>Nom Personne A Contacter </td>
                            <td>{{ $patient->nomurgence }}</td>
                        </tr>
                            <tr>p
                            <td>Numero Personne A Contacter</td>
                            <td>{{ $patient->numerotelephone }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.css">
<style>
    body{
    background-color: #ddebfa !important;";
   
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000;

}
p {
    font-size: 0.875rem;
    margin-bottom: .5rem;
    line-height: 1.3rem;
}


.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e7eaed;
    border-radius: 0;
}
.card .card-description {
    margin-bottom: .875rem;
    font-weight: 400;
    color: #76838f;
}






.profile-header {
	height: 150px;
	width: 100%;
	position: relative;
}

.cover-image {
	height: 150px;
	width: 100%;
	overflow: hidden;
}



.user-image {
	position: absolute;
	height: 50px;
	width: 50px;
	border-radius: 50%;
	bottom: -50%;
	left: 50%;
	/* top: 50%; */
	transform: translate(-50%, -50%);
	z-index: 5;
}

.user-image img {
	height: 80px;
	width: 80px;
	border-radius: 50%;
	top: -40px;
	border: 5px solid #777;
}

.profile-card .profile-content {
	padding: 50px 20px 30px 20px;
}



.profile-card .profile-name {
	font-size: 1.2rem;
	color: #3249b9;
	font-weight: 600;
	text-align: center;
}

.profile-card .profile-designation {
	font-size: 13px;
	color: #777;
	text-align: center;
}

.profile-card .profile-description {
	padding: 10px;
	font-size: 13px;
	color: #777;
	margin: 5px 0px;
	background-color: #F1F2F3;
	border-radius: 5px;
}

.profile-card ul.profile-info-list {
	padding: 0;
	margin: 10px 0;
	list-style: none;
	font-size: 1rem;
	font-weight: 500;
	color: #777;
}




.profile-card ul.profile-info-list a {
	text-decoration: none;
	color:inherit;
}



.profile-card a.profile-info-list-item {
	margin: 10px 0;
	padding:15px;
	background-color: #F1F2F3;
	display: block;
	 -webkit-transition: all .5s ease-in-out;
    -o-transition: all .5s ease-in-out;
    transition: all .5s ease-in-out;

}

.profile-card a.profile-info-list-item:hover {
    background-color: #9E9E9E;
    color: white;
	 -webkit-transition: all .5s ease-in-out;
    -o-transition: all .5s ease-in-out;
    transition: all .5s ease-in-out;
	
}


.profile-card a.profile-info-list-item  i {
	padding: 10px;
	
}

ul.about {
    list-style: none;
    color: black;
	padding: 0;
}
li.about-items {
    margin: 10px;
    font-size: 0.9rem;
    /* font-family: sans-serif; */
    /* font-weight: 400; */
}



li.about-items i {
color:#607d8b;
}

span.about-item-name {
    width: 100px;
    display: inline-flex;
	    margin-left: 10px;
}


span.about-item-detail {
    display: inline-flex;
    width: calc(100% - 160px);
}
span.about-item-detail > button{
  margin-right: 10px;
}

.btn.btn-icon {
    width: 40px;
    height: 40px;
    padding: 0;
}
.btn.btn-rounded {
    border-radius: 50px;
}

a.about-item-edit {
    float: right;
}
</style>
		<!-- partial -->
		<div class="main-panel">
			<div class="container">


				<div class="row">
					<div class="col-md-4 grid-margin stretch-card">
						<div class="card">
							<div class="profile-card">

								<div class="profile-header">

                                    
								
									<div class="user-image">
									{{-- <img src="{{ URL::to('/') }}/images/{{ $patient->image }}" class="img "> --}}
									</div>
								</div>

								<div class="profile-content">
                                    
									{{-- <p class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p> --}}
								
								</div>
							</div>
						</div>
                    </div>



                    
					<div class="col-md-8 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<p class="card-title font-weight-bold"><a href="{{ route('patient.editinfo', $patient->id) }}" class="about-item-edit">Modifier Informations</a></p>
                                <hr>
                                <p class="card-description">Informations De Base</p>
								<ul class="about">

                                    <li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span class="about-item-name">Nom & Prenom:</span><span class="about-item-detail">{{ $patient->nom }} {{ $patient->prenom }}</span></li>
									<li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span class="about-item-name">Numero Piece d'Identite:</span><span class="about-item-detail">{{ $patient->pieceidentite }}</span></li>

									<li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span class="about-item-name">Anniversaire:</span><span class="about-item-detail">{{ $patient->datenaissance }}</span></li>
									<li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Sexe:</span><span class="about-item-detail">{{ $patient->sexe }}</span> </li>
									<li class="about-items"><i class="mdi mdi-clipboard-account icon-sm "></i><span class="about-item-name">Nationalite:</span><span class="about-item-detail">{{ $patient->nationalite }}</span> </li>
									{{-- <li class="about-items"><i class=" "></i><span class="about-item-name">Groupe Sanguin:</span><span class="about-item-detail">{{ $patient->groupesanguin }}</span></li> --}}
									<li class="about-items"><i class="mdi mdi-human-male-female icon-sm "></i><span class="about-item-name">Situation Matrimoniale:</span><span class="about-item-detail"></span>{{ $patient->civilite }}</li>
								</ul>
								
								<p class="card-description">Coordonnées</p>
								<ul class="about">
									<li class="about-items"><i class="mdi mdi-phone icon-sm "></i><span class="about-item-name">Numero Telephone:</span><span class="about-item-detail">{{ $patient->numerotelephone }}</li>
									<li class="about-items"><i class="mdi mdi-map-marker icon-sm "></i><span class="about-item-name">Adresse:</span><span class="about-item-detail">{{ $patient->adresse }}</li>
									<li class="about-items"><i class="mdi mdi-email-outline icon-sm "></i><span class="about-item-name">Email:</span><span class="about-item-detail">{{ $patient->email }}</li>
								</ul>
								<p class="card-description">Informations de Santé</p>
								<ul class="about">
									<li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Numero de Dossier:</span><span class="about-item-detail">{{ $patient->dossier }}</li>
                                    <li class="about-items"><i class="mdi mdi-water icon-sm "></i><span class="about-item-name">Groupe Sanguin:</span><span class="about-item-detail">{{ $patient->groupesanguin }}</li>
                                    </ul>
                                        <p class="card-description">Contact d'Urgence</p>
								<ul class="about">
									<li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Nom:</span><span class="about-item-detail">{{ $patient->nomurgence }}</li>
									<li class="about-items"><i class="mdi mdi-lock-outline icon-sm "></i><span class="about-item-name">Numero</span><span class="about-item-detail">{{ $patient->numerourgence }}</li>
									
								</ul>


							</div>
						</div>
					</div>

				</div>




			</div>
			<!-- content-wrapper ends -->
			<!-- partial:partials/_footer.html -->

			
			<!-- partial -->
		</div>
        <!-- main-panel ends -->
@endsection