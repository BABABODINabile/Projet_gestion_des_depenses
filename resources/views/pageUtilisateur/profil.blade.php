


<div class="container princip1" style="max-width:1500px; margin: 0 auto; font-family: 'Nunito', 'Montserrat', Arial, sans-serif;">
	<div class="main-body">
		<div class="row g-4 justify-content-center align-items-center">
			<div class="col-lg-3 d-flex justify-content-center align-items-center">
				<div class="card shadow-sm border-0" style="background: #000000; border-radius: 18px; width: 100%; min-width: 260px;">
					<div class="card-body d-flex flex-column align-items-center text-center p-4">
						@if ($user->image)
							<img src="{{ $user->imageUrl()}}" alt="Avatar"  style="width:250px; height:250px; object-fit:cover;border-radius:10%;border:solid white 2px" >
						@else
							<span class="fa fa-user-circle fa-4x text-secondary mb-3"></span>
						@endif
						<h4 class="mb-1" style="color:#FF4B2B; font-weight:700; letter-spacing:0.5px;">{{ $user->nom }} {{ $user->prenom }}</h4>
						<p class="mb-1" style="font-size:1.08em;color:white"><i class="fa fa-briefcase me-1"></i> {{ $user->profession }}</p>
						<p class=" font-size-sm" style="font-size:1.08em;color:white"><i class="fa fa-envelope me-1"></i> {{ $user->email }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="card shadow-sm border-7 prin" style="background: #ffffff; border-radius: 18px;">
					<div class="card-body p-4">
						<form action="{{ route('update.user') }}" method="POST" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="row gy-3">
								<div class="col-sm-3 d-flex align-items-center">
									<label class="form-label mb-0 fw-bold w-100" style="color:#FF4B2B; font-size:1.07em; letter-spacing:0.5px; text-align:left; min-width:110px;"> <i class="fa fa-user me-1"></i> Nom : </label>
								</div>
								<div class="col-sm-9">
									<input type="text" class="custom-input" value="{{ $user->nom }}" name="nom">
									 @error('nom', 'updateuser')<span class="text-danger"> {{ $message }} </span>@enderror
								</div>
								<div class="col-sm-3 d-flex align-items-center">
									<label class="form-label mb-0 fw-bold w-100" style="color:#FF4B2B; font-size:1.07em; letter-spacing:0.5px; text-align:left; min-width:110px;"> <i class="fa fa-user me-1"></i> Prénom : </label>
								</div>
								<div class="col-sm-9">
									<input type="text" class="custom-input" value="{{ $user->prenom }}" name="prenom" >
									@error('prenom', 'updateuser')<span class="text-danger"> {{ $message }} </span>@enderror
								</div>
								<div class="col-sm-3 d-flex align-items-center">
									<label class="form-label mb-0 fw-bold w-100" style="color:#FF4B2B; font-size:1.07em; letter-spacing:0.5px; text-align:left; min-width:110px;"> <i class="fa fa-briefcase me-1"></i> Profession : </label>
								</div>
								<div class="col-sm-9">
									<input type="text" class="custom-input" value="{{ $user->profession }}" name="profession" >
									@error('profession', 'updateuser')<span class="text-danger"> {{ $message }} </span>@enderror
								</div>
								<div class="col-sm-3 d-flex align-items-center">
									<label class="form-label mb-0 fw-bold w-100" style="color:#FF4B2B; font-size:1.07em; letter-spacing:0.5px; text-align:left; min-width:110px;"> <i class="fa fa-envelope me-1"></i> Email : </label>
								</div>
								<div class="col-sm-9">
									<input type="email" class="custom-input" value="{{ $user->email }}"  name="email">
									@error('email', 'updateuser')<span class="text-danger"> {{ $message }} </span>@enderror
								</div>
								<div class="col-sm-3 d-flex align-items-center">
									<label class="form-label mb-0 fw-bold w-100" style="color:#FF4B2B; font-size:1.07em; letter-spacing:0.5px; text-align:left; min-width:110px;"> <i class="fa fa-lock me-1"></i> Ancien mot de passe : </label>
								</div>
								<div class="col-sm-9">
									<input type="password" class="custom-input"  name="password">
									@error('password', 'updateuser')<span class="text-danger"> {{ $message }} </span>@enderror
								</div>
								<div class="col-sm-3 d-flex align-items-center">
									<label class="form-label mb-0 fw-bold w-100" style="color:#FF4B2B; font-size:1em; letter-spacing:0.5px; text-align:left; min-width:110px;"> <i class="fa fa-lock me-1"></i>Nouveau mot de Passe : </label>
								</div>
								<div class="col-sm-9">
									<input type="password" class="custom-input" name="new_password" >
									@error('new_password', 'updateuser')<span class="text-danger"> {{ $message }} </span>@enderror
								</div>
								<div class="custom-file-input">
									<input type="file" id="image" name="image" accept="image/*" style="display:none;" onchange="const label=document.getElementById('file-label'); label.classList.add('selected'); label.innerText = this.files[0] ? this.files[0].name : 'Choisir une image'; label.insertAdjacentHTML('afterbegin', '<span></span>'); ">
									<label for="image" id="file-label" class="custom-file-label"><i class="fa fa-camera"></i> Choisir une image</label>
									@error('image', 'updateuser')<span class="text-danger"> {{ $message }} </span>@enderror
								</div>
								<div class="col-sm-9 offset-sm-3">
									<button type="submit" class="btn w-100 mt-2" style="background:#FF4B2B; color:#fff; border-radius:10px; font-weight:600; box-shadow:0 2px 8px rgba(255,160,122,0.08); font-size:1.07em;">Enregistrer les modifications</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
