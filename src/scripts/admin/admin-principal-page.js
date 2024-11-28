const modal = document.getElementById("modal")
const añadirBtn = document.getElementById("agregar")


function openModalWindow(){
    modal.style.display = "flex"
}
function closeModalWindow(){
    modal.style.display = "none"
}


añadirBtn.addEventListener("click",()=>{
    openModalWindow()
})
window.addEventListener("click" ,function(event){
    if(event.target == modal){
        closeModalWindow()
    }
})
