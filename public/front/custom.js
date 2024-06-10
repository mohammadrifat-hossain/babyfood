function toggleSearch(){
let search_modal = document.getElementById("search_modal");
search_modal.classList.toggle('top_search_hidden');
}
// Alert Script
const Toast = Swal.mixin({
    toast: true,
    position: 'center-center',
    showConfirmButton: false,
    background: '#E5F3FE',
    timer: 2000
});
function cAlert(type, text){
    Toast.fire({
        icon: type,
        title: text
    });
}

function changeProductImage(path){
    document.getElementById('product_preview').src = path;
}
function updateProQuantity(type){
    // console.log(type);
    let calculated_quantity = 0;
    let quantity = $('#single_cart_quantity').val();
    if(type == 'plus'){
        calculated_quantity = Number(quantity) + 1;
    }else{
        calculated_quantity = Number(quantity) - 1;
    }
    // // console.log(document.getElementById('single_cart_quantity').val);

    if(calculated_quantity > 0){
        $('#single_cart_quantity').val(calculated_quantity);
        // document.getElementById('single_cart_quantity').val = calculated_quantity;
        // this.cart_quantity = calculated_quantity;
    }
}
