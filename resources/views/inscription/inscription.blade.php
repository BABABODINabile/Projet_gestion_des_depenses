<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Font Awesome CDN pour les icônes -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Inscription</title>
</head>
	<body>
		@include('inscription.css')

	<div class="container right-panel-active" id="container" style="min-height: 600px;">
	<div class="form-container sign-up-container">
		<form action="" method="POST" enctype="multipart/form-data">
			@csrf
			<h1 style="color: #FF4B2B;margin-bottom:40px">Créer un compte</h1>
			<div class="input-icon-group"><i class="fa fa-user"></i><input type="text" placeholder="Nom" name="nom" value="{{ old('nom')}}"/></div>
			 @error('nom', 'register')<span class="text-danger"> {{ $message }} </span>@enderror
			<div class="input-icon-group"><i class="fa fa-user"></i><input type="text" placeholder="Prénom"  name="prenom" value="{{ old('prenom')}}" /></div>
			 @error('prenom', 'register')<span class="text-danger"> {{ $message }} </span>@enderror
			<div class="input-icon-group"><i class="fa fa-briefcase"></i><input type="text" placeholder="Profession" name="profession" value="{{old('profession')}}"></div>
			 @error('profession', 'register')<span class="text-danger"> {{ $message }} </span>@enderror
			<div class="input-icon-group"><i class="fa fa-envelope"></i><input type="email" placeholder="Email" name="email" value="{{ old('email')}}" /></div>
			 @error('email', 'register')<span class="text-danger"> {{ $message }} </span>@enderror
			<div class="input-icon-group password-group">
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="Mot de passe" name="password" id="password" />
				<span class="toggle-password" onclick="togglePassword('password', this)"><i class="fa fa-eye-slash"></i></span>
			</div>
			 @error('password', 'register')<span class="text-danger"> {{ $message }} </span>@enderror
			<div class="input-icon-group password-group">
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="Confirmer le mot de passe" name="password_confirmation" id="password_confirmation" />
				<span class="toggle-password" onclick="togglePassword('password_confirmation', this)"><i class="fa fa-eye-slash"></i></span>
			</div>
			 @error('password_confirmation')<span class="text-danger"> {{ $message }} </span>@enderror
			<div class="custom-file-input">
				<input type="file" id="image" name="image" accept="image/*" style="display:none;" onchange="const label=document.getElementById('file-label'); label.classList.add('selected'); label.innerText = this.files[0] ? this.files[0].name : 'Choisir une image'; label.insertAdjacentHTML('afterbegin', '<span></span>'); ">
				<label for="image" id="file-label" class="custom-file-label"><i class="fa fa-camera"></i> Choisir une image</label>
				 @error('image', 'register')<span class="text-danger"> {{ $message }} </span>@enderror
			</div>
			<button type="submit">S'inscrire</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="{{route('auth.login')}}"  method="POST">
			@csrf
			<h1 style="color: #FF4B2B;margin-bottom:40px">Se connecter</h1>
			<div class="input-icon-group"><i class="fa fa-envelope"></i><input type="email" placeholder="Email" name="email" value="{{ old('email')}}"/></div>
			@error('email', 'login')<span class="text-danger"> {{ $message }} </span>@enderror
			<div class="input-icon-group password-group">
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="Password" id="pasword" name="password"/>
				<span class="toggle-password" onclick="togglePassword('pasword', this)"><i class="fa fa-eye-slash"></i></span>
			</div>
			@error('password', 'login')<span class="text-danger"> {{ $message }} </span>@enderror
			<button type="submit">Se connecter</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bon retour !</h1>
				<p>Pour rester connecté, veuillez vous connecter avec vos informations personnelles.</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Salut !</h1>
				<p>Saisissez vos informations personnelles et commencez votre aventure avec nous.</p>
				<button class="ghost" id="signUp">S'inscrire</button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@include('inscription.script')
@include('message_erreur_sweet_alert')

	</body>
</html>
