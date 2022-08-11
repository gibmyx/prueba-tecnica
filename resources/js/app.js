require('./bootstrap');
const body = $("body");

body.off("click", ".purchase-product").on("click", ".purchase-product", async function(e) {
    e.preventDefault();
    const btnPurchase = $(".purchase-product");

    btnPurchase.prop('disabled', true)
    let id = $(this).data("id");
    const cantidad = $(`#count-${id}`).val()
    if (cantidad == '0'){
        btnPurchase.prop('disabled', false)
        return alert("La cantidad no puede ser 0")
    }

    await axios.post("/purchase", {product_id: id, cantidad})
    btnPurchase.prop('disabled', false)
    $(`#count-${id}`).val(0)
    return alert("Compra realizada con exito")
});


body.off("click", "#generar-facturas").on("click", "#generar-facturas", async function(e) {
    e.preventDefault();
    await axios.post("/product/generate-invoices")
    return alert("Reporte generado")
});
