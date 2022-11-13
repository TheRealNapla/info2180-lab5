function lookup(){
    document.getElementById("lookup").addEventListener("click", function(event){
        event.preventDefault();

        var lookupInput = document.querySelector("input").value;
        var lookupResult = document.getElementById("result");
        var httpReq = new XMLHttpRequest();
        var url = "http://localhost/info2180-lab5/world.php?country=";

        httpReq.onreadystatechange = function(){
            if(this.readyState == XMLHttpRequest.DONE && this.status == 200){
                lookupResult.innerHTML = this.responseText;
            }
        }

        httpReq.open("GET", url+lookupInput);
        httpReq.send();
    })
}

window.addEventListener("DOMContentLoaded", function(){
    lookup();
})