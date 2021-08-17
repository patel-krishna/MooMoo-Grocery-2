//shows description of product
function moreDescription() {
    desc = document.getElementById("more-description").style;
    desc.display == "none" ? desc.display = "block" : desc.display = "none";
  }
  
  //saves quantity of product in Session Storage
  function saveQty() {
    var productName = document.getElementById("productName").innerHTML;
    var qty = document.getElementById("quantity");
    var flavour = document.getElementById("flavour");
    var cut = document.getElementById("cut");
    
    var flavourSelectedIndex = (flavour) ? flavour.selectedIndex : -100;
    var cutSelectedIndex = (cut) ? cut.selectedIndex : -100;
  
    sessionStorage.setItem(productName + "q", qty.value);
    if (flavourSelectedIndex >= 0) {
      sessionStorage.setItem(productName + "f", flavourSelectedIndex);
    }
    if (cutSelectedIndex >= 0) {
      sessionStorage.setItem(productName + "c", cutSelectedIndex);
    }
  }
  
  //loads quantity of product from Session Storage
  function loadQty() {
    var productName = document.getElementById("productName").innerHTML;
    var qty = document.getElementById("quantity");
    var flavour = document.getElementById("flavour");
    var cut = document.getElementById("cut");

    if (sessionStorage.getItem(productName + "q")) {
      qty.value = sessionStorage.getItem(productName + "q");
    }
    if (sessionStorage.getItem(productName + "f")) {
      flavour.selectedIndex = sessionStorage.getItem(productName + "f");
    }
    if (sessionStorage.getItem(productName + "c")) {
      cut.selectedIndex = sessionStorage.getItem(productName + "c");
    }
    calculateSubtotal();
  }
  
  //calculates subtotal of product based on quantity selected, and updates quantity for popup
  function calculateSubtotal() {
    var popupQty = document.getElementById("popup-quantity");
    var quantity = document.getElementById("quantity").value;
    var subtotal = document.getElementById("subtotal");
    var unitPrice = parseFloat(document.getElementById("unit-price").innerHTML);
  
    popupQty.innerHTML = quantity;
  
    subtotal.innerHTML = (quantity * unitPrice).toFixed(2);
  }
  