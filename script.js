const btn = document.querySelector(".mercadopago-button")


btn.addEventListener("click", (e) => {
    const date = new FormData();
    date.append("name_product", e.target.getAttribute("name_product"))
    date.append("price", parseInt(e.target.getAttribute("price")))
    date.append("unit", parseInt(e.target.getAttribute("unit")))
    let opt = {
        method: "POST",
        body: date
    }
    async function Preferenc() {
        const response = await fetch("https://jgcode47-mp-ecommerce-php.herokuapp.com/server/server.php", opt)
        return response.json()
    }
    Promise.resolve(Preferenc()).then(item => {
        const mp = new MercadoPago('TEST-6d829d75-1d24-4339-a5b8-61fc5824d9d5');
        const bricksBuilder = mp.bricks();

        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: `${item.id}`,
            },
        });
    })
})









