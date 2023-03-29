<?
header("Access-Control-Allow-Origin: *");
$items = [
    [
        'id' => 1,
        'name' => 'ラクダ',
        'price' => 100,
        'image' => 'https://code-genius.com/textbook/202301-fukui-vue/api/images/camel.png',
        'description' => 'ラクダです。',
        'descModal' => 'ラクダはからだにこぶがあり、さばくでせいかつしています。',
        'stock' => 10
    ],
    [
        'id' => 2,
        'name' => 'ハムスター',
        'price' => 200,
        'image' => 'https://code-genius.com/textbook/202301-fukui-vue/api/images/hamster.png',
        'description' => 'ハムスターです。',
        'descModal' => 'ハムスターはからだがちいさくてかわいいですが、すばしっこいです。',
        'stock' => 20
    ],
    [
        'id' => 3,
        'name' => '馬',
        'price' => 2000,
        'image' => 'https://code-genius.com/textbook/202301-fukui-vue/api/images/horse.png',
        'description' => '馬です。',
        'descModal' => 'うまは人をのせてはやくいどうできます。',
        'stock' => 20
    ],
    [
        'id' => 4,
        'name' => 'レッサーパンダ',
        'price' => 200,
        'image' => 'https://code-genius.com/textbook/202301-fukui-vue/api/images/lessor_panda.png',
        'description' => 'レッサーパンダです。',
        'descModal' => 'レッサーパンダはパンダのようにのんびりしています。',
        'stock' => 20
    ],
    [
        'id' => 5,
        'name' => 'ひつじ',
        'price' => 200,
        'image' => 'https://code-genius.com/textbook/202301-fukui-vue/api/images/sheep.png',
        'description' => '羊です。',
        'descModal' => 'ひつじはモフモフしていてとてもあたたかいです。',
        'stock' => 20
    ],
];
$json=json_encode($items);
echo $json;
