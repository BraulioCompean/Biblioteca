const modalAgregarLibro = document.getElementById("modal-agregar-libro")

console.log("hola")
const openModalAgregarLibro = document.getElementById("agregar-libro")
const modalAgregarLibro_mensaje = document.getElementById("agregar-libro-mensaje")

const confirmarAgregarLibro = document.getElementById("confirmar-agregar-libro")

const formAgregarLibro = document.getElementById("form-agregar-libro")

confirmarAgregarLibro.addEventListener("click",async(event)=>{
    event.preventDefault();
    const formDatos = new FormData(formAgregarLibro)

    try{
        const response = await fetch("../../db/agregar-libro.php",{
            method: "POST",
            body: formDatos
        })
        if(!response.ok){
            throw new Error(`Error!: ${response.status}`);
        }
 
        const data = await response.json();
        formAgregarLibro.style.display = "none";

        if (data.exito) {
            modalAgregarLibro_mensaje.style.display = "flex"
            modalAgregarLibro_mensaje.innerHTML = `<h4 style="color: green;">${data.mensaje}</h4>`;
        } else {
            modalAgregarLibro_mensaje.style.display = "flex"
            modalAgregarLibro_mensaje.innerHTML = `<h4 style="color: red;">${data.mensaje}</h4>`;
        }
    } catch(error){
        console.error("Error al procesar el prestamo: ", error);
        formAgregarLibro.style.display = "none";
        modalAgregarLibro_mensaje.innerHTML = `<h4 style="color: red;">Ocurrio un error al procesar el prestamo, intentalo otra vez.</h4>`;    }
        
})


openModalAgregarLibro.addEventListener("click",()=>{
    modalAgregarLibro.style.display = "flex"
})



window.addEventListener("click", (event) => {
    switch (event.target) {
        case modalAgregarLibro:
            modalAgregarLibro.style.display = "none";
            formAgregarLibro.style.display ="flex"
            modalAgregarLibro_mensaje.innerHTML = ""
            break;
    }
});
