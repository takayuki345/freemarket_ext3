<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
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
                'item_id' => 1,
                'comment_user_id' => 2,
                'content' => 'ＳＳＤはありませんでしょうか？'
            ],
            [
                'item_id' => 1,
                'comment_user_id' => 3,
                'content' => 'しばらく売れていないようであれば、購入を検討しています！'
            ],
            [
                'item_id' => 2,
                'comment_user_id' => 2,
                'content' => '先日購入したコーヒーミルを使用して、おいしいコーヒーをいただいています。'
            ],
            [
                'item_id' => 3,
                'comment_user_id' => 2,
                'content' => '売れないようであれば、割引も検討しています。'
            ],
            [
                'item_id' => 4,
                'comment_user_id' => 3,
                'content' => '色違いの同じメーカーのタンブラーを使用しています。こちらの商品は手入れがしやすく、使い勝手が良いですね。'
            ],
            [
                'item_id' => 5,
                'comment_user_id' => 1,
                'content' => 'メモリはいくらですか？'
            ],
            [
                'item_id' => 5,
                'comment_user_id' => 2,
                'content' => '１６ＧＢとなります'
            ],
            [
                'item_id' => 5,
                'comment_user_id' => 1,
                'content' => '回答ありがとうございます。資金が準備出来次第、残っていたら購入予定です。'
            ],
            [
                'item_id' => 8,
                'comment_user_id' => 2,
                'content' => '状態が良ければ買いたいのですが、残念です。'
            ],
            [
                'item_id' => 10,
                'comment_user_id' => 2,
                'content' => '購入予定ですが、沖縄への配送は可能でしょうか？'
            ],
            [
                'item_id' => 10,
                'comment_user_id' => 3,
                'content' => '沖縄への配送は可能です。ただし、お届けまでに３～４日はかかります。'
            ],
            [
                'item_id' => 10,
                'comment_user_id' => 2,
                'content' => '購入します。'
            ],
            [
                'item_id' => 10,
                'comment_user_id' => 2,
                'content' => 'さきほど購入しました。現物が届くのを楽しみにまっています！'
            ],
            [
                'item_id' => 10,
                'comment_user_id' => 3,
                'content' => 'ご購入ありがとうございます。' . "\n" . '補足ですが、支払いが確認でき次第の配送となります。' . "\n" . 'お手数ですが、お支払いのご対応をよろしくおねがいいたします。'
            ],
            [
                'item_id' => 10,
                'comment_user_id' => 1,
                'content' => '買おう思っていたのですが、もう、売り切れでしたか・・・'
            ]
        ];
        DB::table('comments')->insert($contents);
    }
}
