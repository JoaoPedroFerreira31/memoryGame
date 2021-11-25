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
                <div :style=" 'background: ' + (card.flipped ? card.color : '#999')" @click="flipCard(card)" class="h-32 cursor-pointer"></div>
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
                ],

                //function to check cards flipped
                get flippedCards() {
                    return this.cards.filter(card => card.flipped);
                },

                //function to change card color
                flipCard(card) {
                    card.flipped = !card.flipped;

                    //check how many cards was flipped
                    if(this.flippedCards.length === 2){
                        //if color match
                        if(this.flippedCards[0]['color'] === this.flippedCards[1]['color'])
                        {
                            alert('you have a match');
                        }

                    }
                }
            };
        }

    </script>

</body>
</html>
