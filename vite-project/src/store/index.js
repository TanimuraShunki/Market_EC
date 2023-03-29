import { createStore } from 'vuex'
 
export default createStore({
    strict: true, // 開発中は true に
    state: {
        items: [],
        carts: [],
    },
    mutations: {
        setItems(state,payload){
            state.items = payload.items;
        },
        // カートに商品を追加
        addCarts(state, payload) {
            // カート内の同一商品取得
            const selected_cart = state.carts.find((cart) => {
                return cart.item_id === payload.id;    
            }); 
            // カート内の同一商品有無で分岐
            if(selected_cart){
                selected_cart.amount++;
                console.log(`カートに商品を追加しました。購入数: ${selected_cart.amount}`);
                alert(`カートに商品を追加しました。購入数: ${selected_cart.amount}`);
            } else {
                state.carts.push({
                    item_id: payload.id,
                    amount: 1
                }); 
                console.log(`カートに商品を追加しました。購入数: 1`);
                alert(`カートに商品を追加しました。購入数: 1`);
            }
        }
    },
    getters: {
        getItems(state) {
            return state.items;
        },
        getCarts(state) {
            return state.carts;
        },
    },
    actions: {},
    modules: {},
});