const btn = document.querySelector(".mercadopago-button")

btn.addEventListener("click", (e)=>{
    const date = new FormData();
    date.append("name_product", e.target.getAttribute("name_product"))
    date.append("price", parseInt(e.target.getAttribute("price")))
    date.append("unit", parseInt(e.target.getAttribute("unit")))
    let opt = {
        method:"POST",
        body:date
    }
    async function Preferenc(){
        const response = await fetch("https://jgcode47-mp-ecommerce-php.herokuapp.com/server/server.php", opt)
    }
    Promise.resolve(Preferenc()).then(item=>console.log(item))
})