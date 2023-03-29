<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Market</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">リンク1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">リンク2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">リンク3</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2>{{ title }}</h2>
            <div class="row">
                <div class="col-3">
                    <h3>メニュー</h3>
                    <p>ここに各種メニューを追加してください。</p>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="card item col-4
                        " v-for="item in items">
                            <div class="row item_row">
                                <div>
                                    <img v-if="item.image !== null" class="img-fluid" :src="item.image">
                                    <img v-else src="images/no_image.png">
                                </div>
                                <section>
                                    <h2 class="item_title">
                                        {{ item.name }}
                                    </h2>
                                    <div>{{ item.description }}</div>
                                    <div v-if="item.stock > 0">
                                        <div>{{ item.price }}円</div>
                                        <button class="btn btn-primary" @click="add_carts">カートに入れる</button>
                                    </div>
                                    <div v-else>売り切れ</div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <p>出品商品はありません。</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const items = [
        {
            name: 'panda',
            price: 100,
            image: 'panda.jpg',
            description: 'パンダです。',
            stock: 10
        },
        {
            name: 'racoon',
            price: 100,
            image: 'racoon.jpg',
            description: 'ラッコです。',
            stock: 20
        },
        {
            name: 'panda',
            price: 100,
            image: 'panda.jpg',
            description: 'パンダです。',
            stock: 10
        },
        {
            name: 'racoon',
            price: 100,
            image: 'racoon.jpg',
            description: 'ラッコです。',
            stock: 20
        },
        {
            name: 'panda',
            price: 100,
            image: 'panda.jpg',
            description: 'パンダです。',
            stock: 10
        },
        {
            name: 'racoon',
            price: 100,
            image: 'racoon.jpg',
            description: 'ラッコです。',
            stock: 20
        },
        {
            name: 'panda',
            price: 100,
            image: 'panda.jpg',
            description: 'パンダです。',
            stock: 10
        },
        {
            name: 'racoon',
            price: 100,
            image: 'racoon.jpg',
            description: 'ラッコです。',
            stock: 20
        },
    ];

    export default {
        name: 'ItemIndex',
        data: function() {
            return {
                title: '商品一覧',
                body: '',
                items: items,
                carts:[]
            }
        },
        methods: {
            add_carts(id){
                const selected_cart = this.carts.find((cart) => {
                    return cart.item_id === id;    
                }); 
                if(selected_cart){
                    selected_cart.amount++;
                    console.log(`カートに商品を追加しました。購入数: ${selected_cart.amount}`);
                } else {
                    carts.push({
                        item_id: id,
                        amount: 1
                    }); 
                    console.log(`カートデータを作成しました`);
                }
                
            }
        }
    }
</script>
