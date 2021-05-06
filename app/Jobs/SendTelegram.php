<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTelegram implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->message = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($post)
    {
        

        echo('Хуй');
        $chat_id = "-494292070";
        $token = "1655001833:AAHu9mPHk6fnlXcRwZN1x5O2hDUj7xrRCPg";
        /////
        ///
        $bot_url = "https://api.telegram.org/bot{$token}/";
        $url = $bot_url . "sendPhoto?chat_id={$chat_id}";

        $post_fields = array('chat_id' => $chat_id,
            'photo' => new \CURLFile("C:\\Users\\Mikhail\\Desktop\\project\\test\\storage\\app\\public\\files\\".substr($path, 13))
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        dd(curl_exec($ch));



        $arr = array(
            'Добавлен новый пост: ' => '',
            'Заголовок поста: ' => $post->topic,
            'Автор поста: ' => $post->username
        );

        $txt = "";
        foreach ($arr as $key => $value) {
            $txt .= $key . $value . "%0A";
        }

        $send_to_telegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$txt}","r");

    }
}
