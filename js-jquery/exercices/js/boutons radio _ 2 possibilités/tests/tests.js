//var users = [ 
//
//    {   
//        nom: "Jo",
//        age: 15,
//    },
//
//    {   
//        nom: "Albert",
//        age: 45,
//    },
//
//];
//
//    for (i=0; i<users.length; i++){
//        console.log("l'utilisateur : " + users[i].nom + " a " + users[i].age + " ans");
//    }

var users2 = [];

document.getElementById("GenerateBtn").onclick = function () {

    nom_user = document.getElementById("nom_user").value;
    age_user = document.getElementById("age_user").value;

    if (document.getElementById('sex-user1').checked) {
        var sex_user = document.getElementById('sex-user1').value;
    } else {
        var sex_user = document.getElementById('sex-user2').value;
    }

    users2.push({
        nom: nom_user,
        age: age_user,
        sexe: sex_user
    });

    for (i = 0; i < users2.length; i++) {
        console.log("l'utilisateur : " + users2[i].nom + " a " + users2[i].age + " ans. Il est :" + users2[i].sexe);
    }
}