@extends('layout')

@section('title')
    О нас
@endsection
<style>
    section{
        display: inline-block;
    }
    section span{
        font-size: x-large;
    }
    section img{
        max-height: 350px;

    }
    #about::-webkit-scrollbar-track {
        background: #f5cdcd; /* цвет фона у дорожки */
        box-shadow: 0 0 2px rgba(0, 0, 0, .2) inset; /* тень у дорожки */
    }
</style>
@section('main')
<script>
    const URL = 'https://speech.googleapis.com/v1p1beta1/speech:recognize'
let div = document.createElement('div');
div.id = 'messages';
let start = document.createElement('button');
start.id = 'start';
start.innerHTML = 'Start';
let stop = document.createElement('button');
stop.id = 'stop';
stop.innerHTML = 'Stop';
document.body.appendChild(div);
document.body.appendChild(start);
document.body.appendChild(stop);
navigator.mediaDevices.getUserMedia({ audio: true})
    .then(stream => {
        const mediaRecorder = new MediaRecorder(stream);

        document.querySelector('#start').addEventListener('click', function(){
            mediaRecorder.start();
        });
        let audioChunks = [];
        mediaRecorder.addEventListener("dataavailable",function(event) {
            audioChunks.push(event.data);
        });

        document.querySelector('#stop').addEventListener('click', function(){
            mediaRecorder.stop();
        });

        mediaRecorder.addEventListener("stop", function() {
            const audioBlob = new Blob(audioChunks, {
                type: 'audio/wav'
            });

            let fd = new FormData();
            fd.append('audio', {'content':audioBlob});
            fd.append('config',{
                "enableAutomaticPunctuation": true,
                "encoding": "LINEAR16",
                "languageCode": "en-US",
                "model": "default"
            })
            sendVoice(fd);
            audioChunks = [];
        });
    });
    async function sendVoice(form) {
    let promise = await fetch(URL, {
        method: 'POST',
        body: form});
    if (promise.ok) {
        let response =  await promise.json();
        console.log(response.data);
        let audio = document.createElement('audio');
        audio.src = response.data;
        audio.controls = true;
        audio.autoplay = true;
        document.querySelector('#messages').appendChild(audio);
    }
}
</script>

<button id="start">start</button>
<button id="stop">stop</button>

@endsection
