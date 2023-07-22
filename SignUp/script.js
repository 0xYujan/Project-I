function validateform(){
    var name = document.getElementById("name").value;
    let error = false;
    let msg = "";

    if(name == ""){
        msg("Username can't be blank");
        error = true;
    }

    if(error == true){
        window.alert(msg);
    }
}