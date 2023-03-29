<template>
    <div class="container">
        
        <!-- カルーセル -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <!-- インジケーター -->
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- スライド内容 -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/src/views/images/camel.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/src/views/images/horse.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/src/views/images/sheep.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <!-- 前のスライドへのボタン -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <!-- 次のスライドへのボタン -->
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    <div class="container">
        <h2>{{ title }}</h2>
        <div class="row">
            <div class="col-12">
                <h3>メニュー</h3>
                <!-- 商品一覧 -->
                <div class="col-12">
                    <div class="row">
                        <div class="d-flex justify-content-center" v-for="item in items">
                            <div class="d-flex align-items-center item_row">
                                <div>
                                    <img v-if="item.image !== null" class="img-fluid thumbnail" :src="item.image">
                                    <img v-else src="images/no_image.png">
                                </div>
                                <section>
                                    <h2 class="item_title">
                                        {{ item.name }}
                                    </h2>
                                    <div>{{ item.description }}</div>
                                    <div v-if="item.stock > 0">
                                        <div>{{ item.price }}円</div>
                                        <button class="btn btn-primary m-1" @click="add_carts(item.id)">カートにいれる</button>
                                        <button type="button" class="btn btn-secondary ms-1" data-bs-toggle="modal" :data-bs-target="'#Modal1'+ item.id">くわしく</button>
                                    </div>
                                    <div v-else>うりきれ</div>
                                </section>
                            </div>
                            <!-- モーダル -->
                            <div class="modal fade" tabindex="-1" v-bind:id="'Modal1' + item.id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ item.name }}</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="とじる">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- /.modal-header -->
                                        <div class="modal-body">
                                            <div>
                                                <img v-if="item.image !== null" class="img-fluid thumbnail_modal" :src="item.image">
                                                <img v-else src="images/no_image.png">
                                            </div>
                                            <p>{{ item.description }}</p>
                                        </div>
                                        <!-- /.modal-body -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">とじる</button>
                                        </div>
                                        <!-- /.modal-footer -->
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                    </div>
                    <p>さいごまでみてくれてありがとう！</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from "axios";

    const URL = 'https://code-genius.com/textbook/202301-fukui-vue/api/api.php';

    export default {

        name: 'Main',
        data: function() {
            return {
                title: 'かえるもの',
                body: '',
                URL: URL,
            }
        },
        computed: {
            items() {
                //キーワード クエリ パラメータが存在しない場合は、getItems ゲッターからアイテムを返す
                if (!this.$route.query.keyword)
                    return this.$store.getters.getItems;

                const items = [];
                //getItemsのgetter から取得されたアイテムを一つずつ取り出す
                for (let item of this.$store.getters.getItems) {
                    //「name」プロパティが「keyword」と同じであるものを「items」配列に追加
                    if (~item.name.indexOf (this.$route.query.keyword)) {
                        items.push(item);
                    }
                }
                // コンポーネントのデータを計算するための getter 関数
                return items;
            }
        },
        methods: {
            add_carts(id) {
                // 商品をカートに追加するメソッド
                this.$store.commit('addCarts', {
                    id: id,
                });
            },
        },
        mounted: async function() {
            // アプリケーションのマウント後に呼び出されるライフサイクルフック
            const items = await axios.get(this.URL, {});
            // APIから商品一覧を取得する
            this.$store.commit('setItems', {
                items: items.data,
            });
            // 取得した商品一覧をストアに保存する
        }

    }
</script>

<style>
    img.thumbnail {
        max-width: 400px;
        min-width: 100px;
        width: 100%;
    }

    .thumbnail_modal {
        width: 50%;
    }

</style>
