
<style>
        @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css");

        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

:root {
    --header-height: 3rem;
    --nav-width: 68px;
    --first-color: #FF4B2B;
    --first-color-light: #ffffff;
    --white-color: #000000;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100;
}

*, ::before, ::after {
    box-sizing: border-box;
}

body {
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s;
}

a {
    text-decoration: none;
}

/* ===== Header ===== */
.header {
    width: 100%;
    font-family: var(--body-font);
    color: var(--first-color-light);
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: var(--white-color);
    border-bottom-right-radius: 10px;
    z-index: var(--z-fixed);
    transition: .5s;
}

.header_toggle {
    color: var(--first-color);
    font-size: 1.5rem;
    cursor: pointer;
}

.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden;
}

.header_img img {
    width: 40px;
}

/* ===== Nav ===== */
.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0px 10px 10px rgba(0,0,0,0.22);
    background-color: var(--first-color);
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed);
}


.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
}

.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: .5rem 0 .5rem 1.5rem;
}

.nav_logo {
    margin-bottom: 2rem;
}

.nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color);
}

.nav_logo-name {
    color: var(--white-color);
    font-weight: 700;
}

.nav_link {
    position: relative;
    color: var(--first-color-light);
    text-decoration: none;
    margin-bottom: 1.5rem;
    transition: .3s;
}

.nav_link:hover{
    color: var(--white-color);
    background-color: white;
    color: #FF4B2B;

}

.nav_icon {
    font-size: 1.25rem;
}

/* ===== Modifiers ===== */
.show {
    left: 0;
}

.body-pd {
    padding-left: calc(var(--nav-width) + 1rem);
}

.active{
}

.nav_link.active {
  background-color: white;  /* fond blanc */
  color: #FF4B2B;           /* texte orange */
  font-weight: bold;
}

/* Barre verticale gauche */
.nav_link.active::before {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%); /* centrer verticalement */
  width: 5px;
  height: 60%;                 /* adapte la hauteur */
  background-color: black;   /* orange */
  border-radius: 3px;
}

.height-100 {
    height: 100vh;
}

/* ===== Media Queries ===== */
@media screen and (min-width: 768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem);
    }

    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
    }

    .header_img {
        width: 40px;
        height: 40px;
    }

    .header_img img {
        width: 45px;
    }

    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0;
    }

    .show {
        width: calc(var(--nav-width) + 156px);
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 188px);
    }
}

body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 20px;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}



/* Classe pour imiter form-control avec style personnalisé */
.custom-input {
    width: 100%;
    padding: 0.5rem 0.75rem; /* padding similaire à form-control */
    font-size: 1.07em;        /* taille texte de ta charte */
    font-family: 'Nunito', 'Montserrat', Arial, sans-serif;
    border-radius: 10px;       /* arrondi personnalisé */
    border: 1px solid #FF4B2B; /* couleur bordure charte */
    background-color: #fff;    /* fond blanc */
    color: #000;               /* texte noir */
    transition: border-color 0.3s, box-shadow 0.3s; /* effet focus */ 
    font-weight: 600;
}

.custom-input:focus {
    outline: none;
    border-color: #FF4B2B;        /* accent sur focus */
    box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.2);
}

/* Hover bouton */
.form-container button:hover {
  background: #c1121f; /* rouge foncé */
  transform: translateY(-2px);
}

.princip1 {
  display: grid;
  place-items: center;   /* centre horizontalement et verticalement */
  height: 100vh;
}
.prin{
  background: #f8f9fa; /* fond doux */
  padding: 10px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,2);
  font-family: 'Nunito', 'Montserrat', Arial, sans-serif;
}
/* Arrière-plan du modal */
    .modal {
      display: none; /* caché par défaut */
      position: fixed;
      z-index: 1000;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.6);
      justify-content: center;
      align-items: center;
    }

    /* Contenu du modal */
    .modal-content {
      background: white;
      padding: 20px;
      border-radius: 8px;
      width: 400px;
      max-width: 90%;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    /* Bouton de fermeture */
    .close {
      float: right;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .submit-btn {
      background: #FF4B2B;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }
      /* Changer la couleur principale */
    .btn-orange {
      color: white;
      --bs-btn-hover-color: white;
      --bs-btn-bg: #FF4B2B;
      --bs-btn-border-color: #FF4B2B;
      --bs-btn-hover-bg: #e04327;   /* un peu plus foncé au hover */
      --bs-btn-hover-border-color: #e04327;
      --bs-btn-active-bg: #c73722;
      --bs-btn-active-border-color: #c73722;
      --bs-btn-focus-shadow-rgb: 255, 75, 43; /* couleur de l’ombre */
    }
.icon-button {
    /* Style de base d'un bouton */
    display: inline-block; /* Permet d'ajouter du padding et des marges */
    padding: 8px;
    border-radius: 30%;
    cursor: pointer;
    text-decoration: none; /* Supprime le soulignement par défaut du lien */
    background-color: transparent;
    border: none;
    transition: background-color 0.3s;
}

.icon-button:hover {
    background-color: rgba(0, 0, 0, 0.1);
}

.edit-button i {
    color: #3498db;
    font-size: 20px;
}

.delete-button i {
    color: #e74c3c;
    font-size: 20px;
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

</style>