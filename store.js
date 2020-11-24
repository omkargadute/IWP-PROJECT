if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
}else{
    ready()
}


function ready(){    
    var removecart = document.getElementsByClassName('btn-danger')
    console.log(removecart)
    for(var i=0;i<removecart.length; i++){
        var button = removecart[i]
        button.addEventListener('click',function(event){
            var butt_clicked = event.target
            butt_clicked.parentElement.parentElement.remove() // 2 times parent coz of 2 divs in section
            updatecart(event)    
        })


    }

    var quantityInput = document.getElementsByClassName('cart-quantity-input')
    for(var i=0;i<quantityInput.length;i++){
        var input = quantityInput[i]
        input.addEventListener('change',quantitychange)
    }


    var addtocart = document.getElementsByClassName('add')
    for(var i=0; i<addtocart.length; i++){
        var button = addtocart[i]
        console.log(addtocart)
        button.addEventListener('click',addToCart)
    }

    
}



function updatecart(event){
    var total=0 
    var cart_items = document.getElementsByClassName('cart-items')[0]
    var prize = cart_items.getElementsByClassName('cart-row')
    for(var i=0;i<prize.length; i++){
        var  p = prize[i]
        var cost =p.getElementsByClassName('cart-price')[0]
        var quant =  p.getElementsByClassName('cart-quantity-input')[0]
        console.log(cost, quant)  
        //var price = parseFloat(cost.innerHTML.replace('$',''))
        var price = parseFloat(cost.innerHTML.replace('Rs.',''))
        var quantity = quant.value
        total = total + (price * quantity) 

      
        
    }
    total = Math.round(total * 100) / 100
   document.getElementsByClassName('cart-total-price')[0].innerText = "Rs." +total 


}


function quantitychange(event){
    var input = event.target
    if(isNaN(input.value) || input.value <= 0){
        input.value = 1
    }
    updatecart()

}

function addToCart(event){
    var button  = event.target
    var item = button.parentElement
    var title = item.getElementsByClassName('title')[0].innerText
    var value = item.getElementsByClassName('price')[0].innerText
    var image = item.getElementsByClassName('img')[0].src
    console.log(title,value,image)
    additem(title,value,image)
    updatecart()


}
function additem(title,value,image){
    var cartrow = document.createElement('div')
    cartrow.classList.add('cart-row')
    var cartItem = document.getElementsByClassName('cart-items')[0]
    var cartItemName = cartItem.getElementsByClassName('cart-item-title')
    for(var i=0;i<cartItemName.length;i++){
        if(cartItemName[i].innerText == title){
            alert('This item is already in cart')
            return
        }
    }
     var rowcontent = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${(image)}" width="100" height="100">
            <span class="cart-item-title">${(title)}</span>
        </div>
        <span class="cart-price cart-column">${(value)}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`
        cartrow.innerHTML= rowcontent
    cartItem.appendChild(cartrow)
    //Document loaded first then the remove is added by us so it dont konw what that event is
    cartrow.getElementsByClassName('btn-danger')[0].addEventListener('click',function(event){
        var butt_clicked = event.target
        butt_clicked.parentElement.parentElement.remove() // 2 times parent coz of 2 divs in section
        updatecart(event)   

    })

    cartrow.getElementsByClassName('cart-quantity-input')[0].addEventListener('click',quantitychange)
}
