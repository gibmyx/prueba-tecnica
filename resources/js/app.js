require('./bootstrap');
const body = $("body");

body.off("click", ".purchase-product").on("click", ".purchase-product", async function(e) {
    e.preventDefault();
    const btnPurchase = $(".purchase-product");
    btnPurchase.prop('disabled', true)
    let id = $(this).data("id");

    await axios.post("/purchase", {product_id: id})
    btnPurchase.prop('disabled', false)
    return alert("Compra realizada con exito")
});


body.off("click", "#generar-facturas").on("click", "#generar-facturas", async function(e) {
    e.preventDefault();
    await axios.post("/product/generate-invoices")
    return alert("Reporte generado")
});
