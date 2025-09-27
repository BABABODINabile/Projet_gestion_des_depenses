<script>

document.addEventListener("DOMContentLoaded", function(event) {
   
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
  // change icon
toggle.classList.add('bx-x')
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}



showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

 // Your code to run since DOM is loaded and ready
});

const links = document.querySelectorAll('.nav_link[data-target]');
links.forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault(); // empêche le rechargement
        const target = link.dataset.target;
        document.querySelectorAll('.main-section').forEach(sec => sec.style.display='none');
        document.getElementById(target).style.display='block';
    });
});
   // Sélection des éléments
    const modal = document.getElementById("myModal");
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");

    // Ouvrir le modal
    openBtn.addEventListener("click", () => {
      modal.style.display = "flex";
    });

    // Fermer le modal
    closeBtn.addEventListener("click", () => {
      modal.style.display = "none";
    });

    // Fermer si on clique en dehors du contenu
    window.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
      }
    });
</script>