<template>
    <ul>
        <li v-for="cart_item in cart_items">
            <img v-if="cart_item.item.image !== null" class="img-fluid cart_image" :src="cart_item.item.image">
            <img v-else src="images/no_image.png">
            しょうひんのid {{ cart_item.item.id }}:
            {{ cart_item.item.name }}:
            {{ cart_item.item.price }}えん:
            かず{{ cart_item.amount }}こ
        </li>
    </ul>
    <p class=m-3>合わせたお金: {{ totalAmount }} えん</p>
    <div class="d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary m-3" @click="add_buy(item.id)">かう</button>
    </div>
</template>

<script>
    export default {
        name: 'Cart',
        data: function() {
            return {
                title: 'カート一覧です。',
                cart_items: [],
            }
        },
        mounted: function() {
            this.cart_items = this.getCartItems(this.$store.getters.getCarts);
        },
        computed: {
            carts() {
                return this.$store.getters.getCarts;
            },
            totalAmount() {
                const cart_items = this.getCartItems(this.carts);
                return cart_items.reduce((accumulator, cart_item) => {
                    return accumulator + (cart_item.item.price * cart_item.amount);
                }, 0)
            }
        },
        methods: {
            getCartItems(carts) {
                const cart_items = [];
                const items = this.$store.getters.getItems;
                carts.forEach((cart) => {
                    const cart_item = items.find((item) => {
                        return item.id === cart.item_id;
                    });

                    cart_items.push({
                        item: cart_item,
                        amount: cart.amount,
                    });
                });
                return cart_items;
            }
        }
    }
</script>

<style scoped>
    .cart_image {
        max-height: 200px;
    }

    ul {
        list-style-type: none;
    }
</style>
