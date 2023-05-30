
const mp = new MercadoPago('TEST-6d829d75-1d24-4339-a5b8-61fc5824d9d5');
const bricksBuilder = mp.bricks();


mp.bricks().create("wallet", "wallet_container", {
    initialization: {
        preferenceId: "<pagarProducto>",
    },
 });