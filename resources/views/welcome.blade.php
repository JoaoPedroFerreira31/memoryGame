<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Memory game</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>

    <div x-data="game()" class="px-10 flex items-center justify-center min-h-screen">

        <h1 class="fixed top-0 rigth-0 p-10 font-bold text-3xl">
            <span x-text="points"></span>
            <span class="text-xs">pts</span>
        </h1>

        <div class="flex-1 grid grid-cols-4 gap-10">
            <template x-for="card in cards">
                <div>
                    <button x-show="!card.cleared" :style=" 'background: ' + (card.flipped ? card.color : '#999')" @click="flipCard(card)" class="w-full h-32"></button>
                </div>
            </template>
        </div>
    </div>

    <!-- Flash Message -->
    <div x-data="{show: false, message: 'Here is my flash Message'}"
         x-show="show"
         @flash.window="
            message = $event.detail.message;
            show = true;
            setTimeout(() => show = false, 1000)"
         class="fixed bottom-0 right-0 bg-green-500 text-white p-2 mb-4 mr-4 rounded"
    >
        <span x-text="message" class="pr-4"></span>
        <button @click="show = false">&times;</button>
    </div>

    <script>
        function pause(milliseconds = 1000) {
            return new Promise(resolve => setTimeout(resolve, milliseconds));
        }

        function flash(message) {
            window.dispatchEvent(new CustomEvent('flash', {
                detail: {message}
            }))
        }

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

                //get flipped cards
                get flippedCards() {
                    return this.cards.filter(card => card.flipped); //filter cards array and return only cards where flipped = true
                },

                //get cleared cards
                get clearedCards() {
                    return this.cards.filter(card => card.cleared);
                },

                get points() {
                    return this.clearedCards.length;
                },

                get remainingCards() {
                    return this.cards.filter(card => !card.cleared);
                },

                //function to change card color
                async flipCard(card) {
                    if(this.flippedCards.length === 2){
                        return;
                    }
                    card.flipped = !card.flipped;

                    //check how many cards was flipped
                    if(this.flippedCards.length === 2){

                        //if color match
                        if(this.hasMatch()) {
                            flash('You found a match!');
                            await pause();

                            this.flippedCards.forEach(card => card.cleared = true);

                            if(!this.remainingCards.length){
                                alert('You won');
                            }
                        }

                        await pause();

                        this.flippedCards.forEach(card => card.flipped = false);

                    }
                },

                hasMatch(){
                    return this.flippedCards[0]['color'] === this.flippedCards[1]['color'];
                },
            };

        }

    </script>

</body>
</html>
