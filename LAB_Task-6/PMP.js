const UNIT_PRICE = 1000;
const GIFT_THRESHOLD = 1000;


const quantityInput = document.getElementById('quantity-input');
const totalPriceDisplay = document.getElementById('total-price-display');

let hasNotified = false;

function updateTotal() {
 
    let quantity = parseInt(quantityInput.value);

    if (isNaN(quantity) || quantity < 0) {
        quantity = 0;
        quantityInput.value = 0; 
    }

   
    const total = UNIT_PRICE * quantity;

    
    totalPriceDisplay.value = `$${total}`;


    if (total > GIFT_THRESHOLD) {
        if (!hasNotified) {
       
            setTimeout(() => {
                alert("Congratulations! Your total exceeds $1000. You are now eligible for a gift coupon!");
                hasNotified = true; 
            }, 100);
        }
    } else {
        
        hasNotified = false;
    }
}


quantityInput.addEventListener('input', updateTotal);