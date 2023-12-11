// ***************************************************
// Shopping Cart functions

var shoppingCart = (function () {
    // Private methods and properties
    var cart = [];

    function Item(name, price, count, pro_ID, size_id, size, cutting, packag, cutting_id, packag_id, size_price,
                  cutting_price, packag_price,cutting_head,cutting_head_id,cutting_head_price, remain) {
        this.name = name
        if (!count) {
            count = 1;
        }
        if (!price) {
            price = 0;
        }
        if (!packag_price) {
            packag_price = 0;
        }
        if (!cutting_price) {
            cutting_price = 0;
        }
        if (!size_price) {
            size_price = 0;
        }
        if (!cutting_head_price) {
            cutting_head_price = 0;
        }
        this.price = price
        this.count = count
        this.pro_ID = pro_ID
        this.remain = remain
        this.packag = packag
        this.cutting = cutting
        this.size = size
        this.packag_id = packag_id
        this.cutting_id = cutting_id
        this.size_id = size_id
        this.packag_price = packag_price
        this.cutting_price = cutting_price
        this.size_price = size_price
        this.cutting_head_price = cutting_head_price
        this.cutting_head_id = cutting_head_id
        this.cutting_head = cutting_head
    }

    function saveCart() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (cart == null) {
            cart = []
        }
    }

    loadCart();


    // Public methods and properties
    var obj = {};

    obj.addItemToCart = function (name, price, count, pro_ID, size_id, size, cutting, packag, cutting_id, packag_id,
                                  size_price, cutting_price, packag_price,cutting_head,cutting_head_id,cutting_head_price, remain) {
        for (var i in cart) {
            if ((cart[i].pro_ID == pro_ID) && (cart[i].size_id == size_id)) {
                
                cart[i].count += count;
                saveCart();
                return;
            }
        }
        var item = new Item(name, price, count, pro_ID, size_id, size, cutting, packag, cutting_id, packag_id, size_price,
            cutting_price, packag_price,cutting_head,cutting_head_id,cutting_head_price, remain);

       
        //console.log("addItemToCart:", name, price, count, pro_ID);
        cart.push(item);
        saveCart();
    };

    obj.setCountForItem = function (pro_ID, count,size_id) {
        for (var i in cart) {
            if (cart[i].pro_ID == pro_ID && (cart[i].size_id == size_id)) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCart = function (pro_ID,size_id) { // Removes one item
        for (var i in cart) {
            if (cart[i].pro_ID == pro_ID && (cart[i].size_id == size_id)) {
                // "3" == 3 false
                cart[i].count--; // cart[i].count --
                if (cart[i].count == 0) {
                    cart.splice(i, 1);
                }
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCartAll = function (pro_ID,size_id) { // removes all item name
        for (var i in cart) {
            if (cart[i].pro_ID == pro_ID && (cart[i].size_id == size_id)) {
                cart.splice(i, 1);
                break;
            }
        }
        saveCart();
    };


    obj.clearCart = function () {
        cart = [];
        saveCart();
    }


    obj.countCart = function () { // -> return total count
        var totalCount = 0;
        for (var i in cart) {
            totalCount += cart[i].count;
        }

        return totalCount;
    };

    obj.totalCart = function () { // -> return total cost
        var totalCost = 0;
        for (var i in cart) {
            totalCost += (cart[i].size_price * cart[i].count) + (parseFloat(cart[i].size_price) + parseFloat(cart[i].cutting_price)
                + parseFloat(cart[i].packag_price)+ parseFloat(cart[i].cutting_head_price));
        }

        // return totalCost.toFixed(2);

        return totalCost;
    };

    obj.listCart = function () { // -> array of Items
        var cartCopy = [];
        //console.log("Listing cart");
        //console.log(cart);
        for (var i in cart) {
            //console.log(i);
            var item = cart[i];
            var itemCopy = {};
            for (var p in item) {
                itemCopy[p] = item[p];
            }
            /*itemCopy.total = ((item.price * item.count)+(item.size+item.cutting+item.packag)).toFixed(2);*/
            itemCopy.total = ((item.size_price * item.count) + (parseFloat(item.size_price) +
                parseFloat(item.cutting_price) + parseFloat(item.packag_price)+ parseFloat(item.cutting_head_price)));
            cartCopy.push(itemCopy);
        }
        return cartCopy;
    };

    // ----------------------------
    return obj;
})();