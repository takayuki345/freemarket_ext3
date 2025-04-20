<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            [
                // 'id' => 1,
                'item_id' => 2,
                'user_id' => 1,
                'content' => '購入いただきありがとうございます。',
                'image' => '',
                'unchecked' => 0,
            ],
            [
                'item_id' => 2,
                'user_id' => 2,
                'content' => '納入時期はどのくらいになりますか？',
                'image' => '',
                'unchecked' => 1,
            ],
            [
                'item_id' => 2,
                'user_id' => 2,
                'content' => 'どのくらい使用されていた商品になりますか？',
                'image' => '',
                'unchecked' => 1,
            ],
            [
                'item_id' => 2,
                'user_id' => 2,
                'content' => '上記、２件の質問への回答をおねがいします。',
                'image' => '',
                'unchecked' => 1,
            ],
            [
                'item_id' => 6,
                'user_id' => 3,
                'content' => '早速購入したのですが、マイクの接続端子の接触が悪いようです。どうしたらよいでしょうか？',
                'image' => '',
                'unchecked' => 0,
            ],
            [
                'item_id' => 6,
                'user_id' => 2,
                'content' => 'ご迷惑をおかけしてます。',
                'image' => '',
                'unchecked' => 1,
            ],
            [
                'item_id' => 6,
                'user_id' => 2,
                'content' => 'お手数ですが、接続端子部分を清掃後に、再度動作確認いただけないでしょうか。それでもダメな場合は、①代替品との交換、②ご返品確認後に返金のいづれかで考えております',
                'image' => '',
                'unchecked' => 1,
            ],
            [
                'item_id' => 6,
                'user_id' => 2,
                'content' => 'ご確認されましたら、返信をおねがいします。',
                'image' => '',
                'unchecked' => 1,
            ],
            [
                'item_id' => 6,
                'user_id' => 2,
                'content' => '本日4/20の日中は急用で不在となります。',
                'image' => '',
                'unchecked' => 1,
            ],
            [
                'item_id' => 6,
                'user_id' => 2,
                'content' => 'まだ、返信されていないようですが、念のために戻りました！',
                'image' => '',
                'unchecked' => 1,
            ],
        ];
        DB::table('messages')->insert($contents);
    }
}
