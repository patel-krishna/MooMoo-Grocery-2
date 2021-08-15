// Global Variables
var quantities = document.getElementsByClassName("q-in");
var prices = document.getElementsByClassName("price");
var numItems = document.getElementById("num-items");
var subtotalSummary = document.getElementById("subtotal-summary");
var qst_string = document.getElementById("qst");
var gst_string = document.getElementById("gst");
var total_string = document.getElementById("total");
var qst;
var gst;
var total;

// determine individual product total
function productSubtotal(price, quantity, unitSubtotal){
    var productSub= (price*quantity).toFixed(2); 
    document.getElementById(unitSubtotal).innerHTML = productSub;
}

//--- Number of items
// count the number of items by the total quantity of items. Display.
function displayNumItems() {
    var items = 0;
    for (var i = 0; i < quantities.length; i++) {
        items += parseInt(quantities[i].value);
    }
    numItems.innerHTML = items;
}


//--- Subtotal price
// sum up all the prices. Display.
function sumSubtotal() {
    var total = 0;
    for (i = 0; i < prices.length; i++) {
        total += parseFloat(prices[i].innerHTML) * parseInt(quantities[i].value);
    }
    return total;
}

function displaySubtotal(subtotal) {
    subtotalSummary.innerHTML = subtotal.toFixed(2);
}

//----Taxes

function displayQST(subtotal) {
    qst = subtotal * 0.09975;
    qst_string.innerHTML = qst.toFixed(2);

    // Calculates QST from subtotal and updates display
}

function displayGST(subtotal) {
    gst = subtotal * 0.05; 
    gst_string.innerHTML = gst.toFixed(2);

    // Calculates GST from subtotal and updates display
}


//---- Total

function displayTotal(subtotal) {
    total = subtotal + qst + gst;
    total_string.innerHTML = total.toFixed(2);

    // Calculates Total from sum of subtotal and tax rates and updates display
}

// invoke the functions to update all elements of the summary
function updateSummary() {
    displayNumItems();
    var subtotal = sumSubtotal();
    displaySubtotal(subtotal);
    displayQST(subtotal);
    displayGST(subtotal);
    displayTotal(subtotal);
}

// when quantity changes, update the order summary

// register event listeners for quantity changes
for (var i = 0; i < quantities.length; i++) {
    quantities[i].addEventListener('change', updateSummary);
}
