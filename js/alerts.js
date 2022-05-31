const btnExcluir = document.querySelectorAll(".btnExcluir")

for(var i = 0; i < btnExcluir.length; i++){
    btnExcluir[i].addEventListener("click", function(event){
        if(confirm("Tem certeza que seja excluir esse registro?")){
        }else{
            event.preventDefault();
        }
    })
}