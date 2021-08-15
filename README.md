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
├── LICENSE
├── Login.html
├── README.md
├── SignUp.html
├── aisles
│   ├── bakery.html
│   ├── beverages.html
│   ├── dairy.html
│   ├── meat.html
│   └── produce.html
├── backstore
│   ├── add-order.html
│   ├── order-list.html
│   ├── product-edit.html
│   ├── product-list.html
│   ├── user-edit.html
│   └── user-list.html
├── cart.html
├── css
│   ├── p3-style.css
│   ├── p3-style.css.map
│   ├── p3-style.scss
│   ├── p4-style.css
│   ├── styles-backstore.css
│   ├── styles-main.css
│   ├── styles-product.css
│   └── styles-universal.css
├── images
│   ├── apple.jpg
│   ├── b.jpeg
│   ├── background2.jpg
│   ├── banana.jpg
│   ├── blue-cheese.png
│   ├── c.jpg
│   ├── carrots.jpg
│   ├── cb.jpeg
│   ├── chris-abney-3Vfdiz2Re80-unsplash.jpg
│   ├── cl.jpeg
│   ├── cookie.jpg
│   ├── donut.jpg
│   ├── eggs.png
│   ├── fruits.jpg
│   ├── gouda.png
│   ├── grocery-front.jpg
│   ├── ice-cream.png
│   ├── icon-moo.png
│   ├── ja-san-miguel-xYSp0kkIUio-unsplash.jpg
│   ├── jarritos-mexican-soda-fW9O-VGwhCw-unsplash.jpg
│   ├── jason-jarrach-JAmAeLSU1CM-unsplash.jpg
│   ├── lia-regina-2TxmAfd3bxU-unsplash.jpg
│   ├── loginpage.jfif
│   ├── meat.jfif
│   ├── milk-aisle.jpg
│   ├── milk.png
│   ├── moomoo.ico
│   ├── moomoologo.png
│   ├── multigrain.jpg
│   ├── pear.jpg
│   ├── pexels-any-lane-5945669.jpg
│   ├── pexels-charlotte-may-5946611.jpg
│   ├── pexels-karolina-grabowska-4389681.jpg
│   ├── pie.jpg
│   ├── pr.jpeg
│   ├── produce-display.jpg
│   ├── radish.jpg
│   ├── s.jpeg
│   ├── steak.jpeg
│   ├── swiss.png
│   ├── tomato-header.jpg
│   ├── tomato.jpg
│   ├── waldemar-brandt-kPqaqug998Y-unsplash.jpg
│   ├── white-eggs.png
│   └── yogurt.png
├── index.html
├── js
│   ├── bakery-products.js
│   ├── beverage-products.js
│   ├── dairy-products.js
│   ├── meat-product.js
│   └── produce-products.js
└── products
    ├── B.html
    ├── BSC.html
    ├── CB.html
    ├── CL.html
    ├── PR.html
    ├── S.html
    ├── apples.html
    ├── baguette.html
    ├── bananas.html
    ├── blue-cheese.html
    ├── brown-eggs.html
    ├── cake.html
    ├── carrot.html
    ├── coca-cola.html
    ├── cookie.html
    ├── croissant.html
    ├── donut.html
    ├── gouda-cheese.html
    ├── ice-cream.html
    ├── jarritos.html
    ├── la-croix.html
    ├── mango-juice.html
    ├── milk.html
    ├── mixed-berry-juice.html
    ├── multigrain.html
    ├── orange-juice.html
    ├── pear.html
    ├── pepsi.html
    ├── perrier.html
    ├── pie.html
    ├── radish.html
    ├── sourdough.html
    ├── swiss-cheese.html
    ├── tomato.html
    ├── white-eggs.html
    └── yogurt.html
```
