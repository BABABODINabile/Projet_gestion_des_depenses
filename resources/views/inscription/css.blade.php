<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -10px 0 50px;
}
span.text-danger {
	display: block;
	text-align: left;
	width: 100%;
	font-size: 0.97em;
	margin-top: -4px;
	margin-bottom: 8px;
	padding-left: 2px;
}
.input-icon-group {
	position: relative;
	width: 100%;
	margin-bottom: 8px;
}
.input-icon-group i {
	position: absolute;
	left: 16px;
	top: 50%;
	transform: translateY(-50%);
	color: #FF4B2B;
	font-size: 17px;
	z-index: 2;
}
.input-icon-group input {
	padding-left: 40px !important;
}
.custom-file-label i {
	margin-right: 10px;
	color: #FF4B2B;
	font-size: 18px;
	vertical-align: middle;
}

/* Custom file input for image */
.custom-file-input {
	position: relative;
}
.custom-file-label {
	transition: border-color 0.2s, box-shadow 0.2s;
}
.custom-file-label:hover, .custom-file-label:focus {
	border-color: #FF4B2B;
	box-shadow: 0 0 0 2px rgba(255,75,43,0.15);
	color: #FF4B2B;
}
/* Amélioration de l'input image pour plus de visibilité */
.custom-file-input {
	width: 100%;
	margin-bottom: 12px;
}
.custom-file-label {
	display: flex !important;
	align-items: center;
	gap: 12px;
	background: linear-gradient(90deg, #fff 80%, #ffe5e0 100%);
	border: 2px solid #FF4B2B;
	border-radius: 12px;
	color: #FF4B2B;
	font-weight: 600;
	font-size: 16px;
	box-shadow: 0 2px 8px rgba(255,75,43,0.10);
	cursor: pointer;
	padding: 14px 18px;
	transition: box-shadow 0.2s, border-color 0.2s, background 0.2s, color 0.2s;
	position: relative;
	z-index: 1;
}
.custom-file-label::before {
	
	font-family: 'FontAwesome';
	font-size: 20px;
	color: #fff;
	background: #FF4B2B;
	border-radius: 50%;
	width: 36px;
	height: 36px;
	display: flex;
	align-items: center;
	justify-content: center;
	box-shadow: 0 2px 8px rgba(255,75,43,0.15);
	margin-right: 8px;
}
.custom-file-label.selected {
	color: #333;
	background: linear-gradient(90deg, #fff 80%, #ffe5e0 100%);
}
.custom-file-label:hover, .custom-file-label:focus {
	border-color: #FF4B2B;
	box-shadow: 0 4px 16px rgba(255,65,108,0.18);
	background: #fff0ed;
	color:  #FF4B2B;
}
h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="file"] {
	background-color: #f9f6f7;
	border: 2px solid #eee;
	border-radius: 8px;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
	font-size: 15px;
	transition: border-color 0.2s, box-shadow 0.2s;
	outline: none;
	box-shadow: 0 1px 2px rgba(255,75,43,0.04);
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="file"]:focus {
	border-color: #FF4B2B;
	box-shadow: 0 0 0 2px rgba(255,75,43,0.15);
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	height: 93%;
	overflow: hidden;
	width: 1000px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background:  #FF4B2B;
	background: -webkit-linear-gradient(to right, #FF4B2B,  #FF4B2B);
	background: linear-gradient(to right, #FF4B2B,  #FF4B2B);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}



</style>

<!-- Style pour le bouton d'affichage du mot de passe (fusionné et corrigé) -->
<style>
.password-group {
	position: relative;
}
.toggle-password {
	position: absolute;
	right: 10px;
	top: 50%;
	transform: translateY(-50%);
	cursor: pointer;
	color: #FF4B2B;
	font-size: 18px;
	z-index: 3;
	padding: 0;
	background: none;
	border: none;
	height: 32px;
	width: 32px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.toggle-password:active {
	color: #FF4B2B;
}
.password-group input {
	padding-right: 44px !important;
}
@media (max-width: 600px) {
	.toggle-password {
		right: 6px;
		font-size: 16px;
		height: 28px;
		width: 28px;
	}
	.password-group input {
		padding-right: 36px !important;
	}
}
</style>