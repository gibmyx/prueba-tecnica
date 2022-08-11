require('./bootstrap');

$("body").off("click", ".purchase-product").on("click", ".purchase-product", async function(e) {
    e.preventDefault();
    let id = $(this).data("id");
    const cantidad = $(`#count-${id}`).val()
    await axios.post("/purchase", {product_id: id, cantidad})
});
