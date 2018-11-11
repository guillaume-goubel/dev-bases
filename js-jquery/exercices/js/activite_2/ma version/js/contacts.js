//Activité : gestion des contacts


// TODO : complétez le programme
console.log("Bienvenue dans le gestionnaire des contacts !");

var Contact = { //création objet Contact 
    initContact: function (nom, prenom) {
        this.nom = nom;
        this.prenom = prenom;
    },

    decrire: function () {
        console.log("Nom: " + contactsArray[i].nom + ", Prénom : " + contactsArray[i].prenom);
    },

};

var contact1 = Object.create(Contact);
contact1.initContact("Lévisse", "Carole");

var contact2 = Object.create(Contact);
contact2.initContact("Nelsonne", "Mélodie");

var contactsArray = []; // Création du tableau contenant les contacts
contactsArray.push(contact1);
contactsArray.push(contact2);

while (choixUtilisateur !== 0) {

    console.log(" 1 -> Lister\n 2 -> Ajouter\n 0 -> Quitter \n")
    var choixUtilisateur = Number(prompt("Choisissez une option :"));

    if (choixUtilisateur === 0 || choixUtilisateur === 1 || choixUtilisateur === 2) {

        if (choixUtilisateur === 1) {
            console.log("Voici la liste de vos contacts :")
            for (var i = 0; i < contactsArray.length; i++) {
                Contact.decrire();
            }

        } else if (choixUtilisateur === 2) {
            var nom = prompt("Entrez le nom de la personne");
            var prenom = prompt("Entrez prénom de la personne");

            //Créer, initialiser et entrer dans le tableau le nouveau contact à partir de contact3
            var nouveauContact = "contact" + (contactsArray.length + 1);
            nouveauContact = Object.create(Contact);
            nouveauContact.initContact(nom, prenom)
            contactsArray.push(nouveauContact);

            console.log("Le contact est ajouté !");
        }

    } else {
        console.log("Merci de rentrer une option valide !");
    }

}

console.log("Au revoir !");

//En option (si vous ne le saviez pas), une commande pratique que j'ai trouvé pour afficher le tableau directement dans la console :
//console.table(contactsArray);
