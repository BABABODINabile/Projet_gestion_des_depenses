<!-- Script pour activer automatiquement le panneau d'inscription si des erreurs de validation sont présentes -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	if (@json($errors->register->any())) {
		document.getElementById('container').classList.add('right-panel-active');
	}
	if (@json($errors->login->any())) {
		document.getElementById('container').classList.remove('right-panel-active');
	}
});
</script>
<script>
	const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>

<!-- JS pour afficher/masquer le mot de passe -->
<script>
function togglePassword(inputId, el) {
	const input = document.getElementById(inputId);
	const icon = el.querySelector('i');
	if (input.type === 'password') {
		input.type = 'text';
		icon.classList.remove('fa-eye-slash');
		icon.classList.add('fa-eye');
	} else {
		input.type = 'password';
		icon.classList.remove('fa-eye');
		icon.classList.add('fa-eye-slash');
	}
}
 

 @if (session('error'))
        document.getElementById('container').classList.remove('right-panel-active');
	@endif
</script>