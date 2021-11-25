<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>

    <div x-data="game()" class="px-10 flex items-center justify-center min-h-screen">
        <div class="flex-1 grid grid-cols-4 gap-10">
            <template x-for="card in cards">
                <div :style=" 'background: ' + (card.flipped ? card.color : '#999')" @click="card.flipped = ! card.flipped" class="h-32 cursor-pointer"></div>
            </template>
        </div>
    </div>

    <script>

        //function to generate cards
        function game() {
            return {
                cards: [
                    {color: 'green', flipped: false, cleared: false}, //generate card
                    {color: 'red', flipped: false, cleared: false},
                    {color: 'blue', flipped: false, cleared: false},
                    {color: 'yellow', flipped: false, cleared: false},
                    {color: 'green', flipped: false, cleared: false},
                    {color: 'red', flipped: false, cleared: false},
                    {color: 'blue', flipped: false, cleared: false},
                    {color: 'yellow', flipped: false, cleared: false},
                ]
            };
        }

    </script>

</body>
</html>
