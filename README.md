# Moomoo Grocery

## Live Website: [MooMooGrocery.live](https://www.moomoogrocery.live/)

Team members:

Sephora Maltais 40151723,
John Lin 40176227,
Zachary Bruce 40136585,
Youngjae Kim 40169282,
Krishna Patel 40176352

## Website uses Bootstrap 4

### User Data Structure

- User ID
- First Name
- Middle Name
- Last Name
- Email Address
- Phone Number
- Address - includes all the components that define an address
- Password
- Payment Method (Debit, Credit or Store Card)
- Card Number
- CVC Number

### Product Data Structure

- Aisle
- Section
- Item Name
- Product ID
- Serial Number
- Description
- Image
- Unit
- Price
- Price per unit
- Quantity
- Options

### Order Data Structure

- Order ID
- Customer ID - associates an order with a User (as defined above)
- Total Price
- Order Status
- List of Products

### Directory Tree

```
.
├── README.md
├── app
│   ├── public
│   │   ├── Afterlogin.php
│   │   ├── Login.php
│   │   ├── SignUp.php
│   │   ├── aisles
│   │   │   ├── bakery.php
│   │   │   ├── beverages.php
│   │   │   ├── dairy.php
│   │   │   ├── meat.php
│   │   │   └── produce.php
│   │   ├── backstore
│   │   │   ├── add-order-product.php
│   │   │   ├── add-order.php
│   │   │   ├── added-user.php
│   │   │   ├── delete-order-product.php
│   │   │   ├── delete_product.php
│   │   │   ├── delete_user.php
│   │   │   ├── edited-user.php
│   │   │   ├── order-delete.php
│   │   │   ├── order-existing.php
│   │   │   ├── order-list.php
│   │   │   ├── order-new.php
│   │   │   ├── product-edit.php
│   │   │   ├── product-list.php
│   │   │   ├── user-edit.php
│   │   │   └── user-list.php
│   │   ├── cart.php
│   │   ├── checkout.php
│   │   ├── css
│   │   │   ├── p4-style.css
│   │   │   ├── styles-backstore.css
│   │   │   ├── styles-main.css
│   │   │   ├── styles-p3.css
│   │   │   ├── styles-product.css
│   │   │   └── styles-universal.css
│   │   ├── images
│   │   │   ├── aisle_bakery.jpg
│   │   │   ├── aisle_beverages.jpg
│   │   │   ├── aisle_dairy.jpg
│   │   │   ├── aisle_meat.jpg
│   │   │   ├── aisle_produce.jpg
│   │   │   ├── background2.jpg
│   │   │   ├── eggs.png
│   │   │   ├── fruits.jpg
│   │   │   ├── grocery-front.jpg
│   │   │   ├── icon-moo.png
│   │   │   ├── loginpage.jfif
│   │   │   ├── meat.jfif
│   │   │   ├── milk-aisle.jpg
│   │   │   ├── moomoo.ico
│   │   │   ├── moomoologo.png
│   │   │   ├── produce-display.jpg
│   │   │   ├── steak.jpeg
│   │   │   ├── tomato-header.jpg
│   │   │   └── waldemar-brandt-kPqaqug998Y-unsplash.jpg
│   │   ├── index.php
│   │   ├── js
│   │   │   ├── cart.js
│   │   │   ├── login.js
│   │   │   ├── product.js
│   │   │   └── sign-up.js
│   │   ├── not_registered.php
│   │   ├── products
│   │   │   ├── add-to-cart.php
│   │   │   └── productDisplay.php
│   │   ├── remove-from-cart.php
│   │   ├── sign-out.php
│   │   ├── update-quantity.php
│   │   ├── uploads
│   │   │   ├── TP5X_open\ (2).png
│   │   │   ├── apple.jpg
│   │   │   ├── bacon.jpeg
│   │   │   ├── baguette.jpeg
│   │   │   ├── banana.jpg
│   │   │   ├── berry.jpg
│   │   │   ├── blue-cheese.png
│   │   │   ├── cake.jpeg
│   │   │   ├── carrots.jpg
│   │   │   ├── chickb.jpeg
│   │   │   ├── chickl.jpeg
│   │   │   ├── coke.jpg
│   │   │   ├── cookie.jpg
│   │   │   ├── croissant.jpg
│   │   │   ├── donut.jpg
│   │   │   ├── eggs.png
│   │   │   ├── gouda.png
│   │   │   ├── ice-cream.png
│   │   │   ├── jarrito.jpg
│   │   │   ├── lacroix.jpg
│   │   │   ├── mango.jpg
│   │   │   ├── milk.png
│   │   │   ├── multigrain.jpg
│   │   │   ├── orange.jpg
│   │   │   ├── pear.jpg
│   │   │   ├── pepsi.jpg
│   │   │   ├── perrier.jpg
│   │   │   ├── pie.jpg
│   │   │   ├── pork.jpeg
│   │   │   ├── radish.jpg
│   │   │   ├── sausage.jpeg
│   │   │   ├── sourdough.jpeg
│   │   │   ├── steak.jpeg
│   │   │   ├── swiss.png
│   │   │   ├── tomato.jpg
│   │   │   ├── white-eggs.png
│   │   │   └── yogurt.png
│   │   ├── user.php
│   │   └── wrong_password.php
│   └── resources
│       ├── config.php
│       ├── data
│       │   ├── orders.xml
│       │   ├── products.xml
│       │   └── users.xml
│       ├── functions.php
│       └── templates
│           ├── back
│           │   ├── header.php
│           │   └── side-nav.php
│           └── front
│               ├── aisle-footer.php
│               ├── aisle-header.php
│               ├── footer.php
│               ├── header.php
│               ├── product-header.php
│               └── product-navbar.php
├── docker-compose.yml
└── nginx.conf
```
