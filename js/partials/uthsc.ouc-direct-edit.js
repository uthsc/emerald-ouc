function directEdit() {
    var link = document.getElementById("uthsc-de").parentNode.innerHTML;
    document.getElementById("uthsc-de").parentNode.innerHTML = "";
    document.getElementById("uthsc-direct-edit").innerHTML = link;
}

$(document).ready(function(){
    directEdit();
});
