
var body = document.getElementsByTagName(body)[0];

var table = document.createElement('table');
body.appendChild(table);

var addButton = document.getElementById("GenerateBtn");
addButton.addEventListener('click', add);

var users = [];


function add() {

    var FnameUser = document.getElementById("fName").value;
    var LnameUSer = document.getElementById("lName").value;

    users.push({
        
        firstname: FnameUser,
        lastname : LnameUSer
    });

    refreshView();
}




function refreshView (){
    table.innerHTML ='';

    for (user of users){

        var tr = document.createElement ('tr');
        var td1 = document.createElement ('td');
        var td2 = td1.cloneNode();

        td1.innerHTML = user.firstname;
        td2.innerHTML = user.lastname;

        tr.appendChild(td1);
        tr.appendChild(td2);
        table.appendChild(tr);
    }
}
