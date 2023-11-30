// Switch Tab
const tab_list = document.querySelectorAll(".detail__tablist-container li");
const divs = document.querySelectorAll(".detail__reviews-description > div")

if(divs) {
    divs.forEach((e, index) => { 
        if(index != 0)
            e.style.display = 'none' 
    })
}

if(tab_list) {
    tab_list.forEach((value,key) => {
        value.addEventListener('click', (e) => {
            e.preventDefault()    
            tab_list.forEach((e) => { e.classList.remove('active')})
            divs.forEach((e) => { e.style.display = 'none' })
            value.classList.add('active')
            divs[key].style.display = 'block';
        })
    })
}


// change quantity
const input_quantity = document.querySelector(".detail_product-input-plus-minus")
const btn_inc = document.querySelector(".detail__product-inc ")
const btn_dec = document.querySelector(".detail__product-dec ")
// const quantity = document.querySelector(".quantity");
// quantity.addEventListener('change',function(){
//     if(
//         quantity.value>quantity.max
//     ){
         
//         quantity.value=quantity.max;
//     }
//     if(
//         quantity.value>quantity.min
//     ){
//         quantity.min=quantity.min;
//     }
// })
if(input_quantity) {
    btn_inc.addEventListener('click', () => {
        let value = input_quantity.value
        if(parseInt(value) < input_quantity.id) {
            input_quantity.value = parseInt(value) + 1;
        }
    })

    btn_dec.addEventListener('click', () => {
        let value = input_quantity.value
        if(parseInt(value) > 1) {
            input_quantity.value = parseInt(value) - 1;
        }
    })
}
// const btn_inc = document.querySelectorAll(".detail__product-inc ")
// const btn_dec = document.querySelectorAll(".detail__product-dec ")

// for (const item of btn_inc) {
//     item.addEventListener('click', () => {
//         let input_quantity = item.previousElementSibling;
//         let vl = input_quantity.value
//         if(parseInt(vl) < input_quantity.id) {
//             input_quantity.value = parseInt(vl) + 1;
//         }
//     })
// }
// for (const item of btn_dec) {
//     item.addEventListener('click', () => {
//         let input_quantity = item.previousElementSibling.previousElementSibling;
//         let vl = input_quantity.value
//         if(parseInt(vl) < input_quantity.id) {
//             input_quantity.value = parseInt(vl) - 1;
//         }
//     })
// }