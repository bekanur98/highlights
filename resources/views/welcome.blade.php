<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .highlight {
                color: #d3b803;
                background-repeat: no-repeat;
                background-position: 3.4em 0;
                background-color: #071a36;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }


            .content {
                text-align: center;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <p>Choose sentence</p>
                <div id="sentences-div">
                    <select name="sentences" id="sentences" onchange="showSentenceWord(this.value)">
                        <option value="0">Choose sentence</option>
                        @foreach($sentences as $sentence)
                            <option value="{{$sentence->id}}">{{$sentence->sentence}}</option>
                        @endforeach
                    </select>
                </div>

                <div id="sentence-by-word">

                </div>
            </div>
        </div>
    </body>
    <script>
        function showSentenceWord(sentenceId) {
            if (parseInt(sentenceId)) {
                $('#sentence-by-word').html('')
                $('#play-button').remove()
                $.ajax({
                    url: "/getSentenceWordById",
                    data: {sentenceId: sentenceId},
                    success: function (data) {
                        for (let word of data) {
                            $('#sentence-by-word').append('<span id="word-order-'+word.order+'" data-delay='+word.delay+'>'+word.word+' </span>')
                        }
                    }
                }).done(function() {
                    let playButton = '<div id="play-button"><button onclick="highlightWords()">play</button></div>'
                    $('#sentences-div').append(playButton)
                })
            } else {
                $('#play-button').remove()
                $('#sentence-by-word').html('')
            }
        }

        const sleep = (milliseconds) => {
            return new Promise(resolve => setTimeout(resolve, milliseconds))
        }

        async function highlightWords() {
            let length = $('#sentence-by-word').children().length;
            for (let i=0;i<length;i++) {
                $('#word-order-' + i).addClass('highlight');
                await sleep(parseInt($('#word-order-' + i).data('delay')) * 1000)
                $('#word-order-' + (i)).removeClass('highlight');
            }
        }
    </script>
</html>
