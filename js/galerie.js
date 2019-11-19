new Sortable(listeImagesDispo, {
    group: 'shared', // set both lists to same group
    animation: 300
});

new Sortable(listeImagesGalerie, {
    group: 'shared',
    animation: 300
});


let form = document.getElementById("formGalerie");
form.addEventListener("submit", () => {
    let images = document.querySelectorAll("#listeImagesGalerie img");
    images.forEach(element => {

        // Crée un input caché pour pouvoir récuperer les valeurs
        let input = document.createElement("input");
        input.value = element.getAttribute("src");
        input.name = "photos[]";
        input.classList.add("d-none");
        
        form.appendChild(input); // Ajoute au formulaire l'input caché
    });

})
