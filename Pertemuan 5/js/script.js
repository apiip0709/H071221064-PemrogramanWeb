let aiSums = 0;
let yourSums = 0;

let aiASCards = 0;
let yourASCards = 0;

let hidden;
let cards;

let canHit = true;

const btnStartGame = document.getElementById("btn-start");
const btnTakeCard = document.getElementById("btn-take");
const btnHoldCard = document.getElementById("btn-hold");
const btnResetCard = document.getElementById("btn-reset");

const aiSumsResult = document.getElementById("ai-sums");
const aiCardsResult = document.getElementById("ai-cards");

const yourSumsResult = document.getElementById("your-sums");
const yourCardsResult = document.getElementById("your-cards");
const yourMoney = document.getElementById("money-sums");
const inputMoney = document.getElementById("input-money");

const cardsLeft = document.getElementById("cards-left");
const result = document.getElementById("result");

window.onload = function () {
    buildCards();
    shuffleCards();

    cardsLeft.textContent = cards.length;
    btnTakeCard.setAttribute("disabled", true);
    btnHoldCard.setAttribute("disabled", true);
}

function buildCards() {
    let types = ["K", "B", "H", "S"];
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    cards = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            cards.push(values[j] + "-" + types[i]);
        }
    }
}

function shuffleCards() {
    for (let i = 0; i < cards.length; i++) {
        let j = Math.floor(Math.random() * cards.length); //
        let temp = cards[i];
        cards[i] = cards[j];
        cards[j] = temp;
    }
}

btnStartGame.addEventListener("click", function () {
    if (isNaN(inputMoney.value) || inputMoney.value <= 0 || inputMoney.value < 1000) {
        alert("Please enter a valid bet amount.");
        return
    }

    if (btnStartGame.textContent === "TRY AGAIN?") {
        if (yourMoney.textContent <= 0) {
            alert("Habis Uang, tobat");
            return btnStartGame.textContent = "PLAY AGAIN?";
        }

        if (yourMoney.textContent < parseInt(inputMoney.value)) {
            alert("Uang Tidak Cukup");
            return inputMoney.value = "";
        }

        aiSums = 0;
        yourSums = 0;
        aiASCards = 0;
        yourASCards = 0;
        canHit = true;

        while (yourCardsResult.firstChild) {
            yourCardsResult.firstChild.remove();
        }

        while (aiCardsResult.firstChild) {
            aiCardsResult.firstChild.remove();
        }

        let cardImg = document.createElement("img");
        cardImg.src = "./img/BACK.png";
        cardImg.className = "hidden-card";
        aiCardsResult.append(cardImg);

        // buildCards();
        shuffleCards();
        aiSumsResult.textContent = "";
        yourSumsResult.textContent = "";
        result.textContent = "";
        inputMoney.textContent = "";
    } else if (btnStartGame.textContent === "PLAY AGAIN?") {
        aiSums = 0;
        yourSums = 0;
        aiASCards = 0;
        yourASCards = 0;
        canHit = true;

        while (yourCardsResult.firstChild) {
            yourCardsResult.firstChild.remove();
        }

        while (aiCardsResult.firstChild) {
            aiCardsResult.firstChild.remove();
        }

        let myCardImg = document.createElement("img");
        myCardImg.src = "./img/BACK.png";
        myCardImg.className = "hidden-card";
        yourCardsResult.append(myCardImg);

        let cardImg = document.createElement("img");
        cardImg.src = "./img/BACK.png";
        cardImg.className = "hidden-card";
        aiCardsResult.append(cardImg);

        buildCards();
        shuffleCards();
        cardsLeft.textContent = cards.length;
        yourMoney.textContent = "50000"
        btnStartGame.textContent = "START GAME";
        aiSumsResult.textContent = "";
        yourSumsResult.textContent = "";
        result.textContent = "";
        inputMoney.value = "";
        return;
    } else {
        if (yourMoney.textContent < parseInt(inputMoney.value)) {
            alert("Uang Tidak Cukup");
            return inputMoney.value = "";
        }

        setTimeout(function () {
            document.getElementsByClassName("hidden-card")[0].remove();
        });
    }
    if (cardsLeft.textContent < 4) {
        alert("Kartu Habis Silahkan di Reset")
        return;
    } 

    btnTakeCard.disabled = false;
    btnHoldCard.disabled = false;
    inputMoney.disabled = true;
    btnStartGame.textContent = "TRY AGAIN?";
    btnStartGame.setAttribute("disabled", true);


    setTimeout(() => {
        for (let i = 0; i < 2; i++) {
            let cardImg = document.createElement("img");
            let card = cards.pop();
            cardImg.src = `/img/${card}.png`;
            yourSums += getValueOfCard(card);
            yourASCards += checkASCard(card);
            yourSumsResult.textContent = yourSums;
            yourCardsResult.append(cardImg);
            cardsLeft.textContent = cards.length;
        }
    }, 200)
});

btnTakeCard.addEventListener("click", function () {
    if (!canHit) {
        return
    };

    if (cardsLeft === 0) {
        alert("Kartu Habis Silahkan di Reset")
        return;
    }

    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `/img/${card}.png`;
    yourSums += getValueOfCard(card);
    yourASCards += checkASCard(card);
    yourSumsResult.textContent = yourSums;
    yourCardsResult.append(cardImg);
    cardsLeft.textContent = cards.length;

    if (reduceAS(yourSums, yourASCards) > 21) {
        canHit = false;
    }

    if (yourSums > 21) {
        btnTakeCard.disabled = true;
        btnHoldCard.disabled = true;
        btnStartGame.disabled = false;
        inputMoney.disabled = false;
        result.textContent = "YOU LOSE";
        yourMoney.textContent -= inputMoney.value;
    }
});

btnHoldCard.addEventListener("click", function () {
    btnHoldCard.disabled = true;
    setTimeout(function () {
        document.getElementsByClassName("hidden-card")[0].remove();
    }, 1000);

    function addBotCards() {
        setTimeout(function () {
            if (cardsLeft < 2) {
                alert("Kartu Habis Silahkan di Reset")
                return;
            }

            let cardImg = document.createElement("img");
            let card = cards.pop();
            cardImg.src = `/img/${card}.png`;
            aiSums += getValueOfCard(card);
            aiASCards += checkASCard(card);
            aiCardsResult.append(cardImg);
            aiSumsResult.textContent = aiSums;
            cardsLeft.textContent = cards.length;

            if (aiSums < 18) {
                addBotCards();
            } else {
                aiSums = reduceAS(aiSums, aiASCards);
                yourSums = reduceAS(yourSums, yourASCards);
                canHit = false;

                let message = "";
                if (yourSums > 21) {
                    message = "You Lose!";
                    yourMoney.textContent -= inputMoney.value;
                } else if (aiSums > 21) {
                    if (yourSums == 21) {
                        message = "You win!";
                        yourMoney.textContent = parseInt(yourMoney.textContent) + (inputMoney.value * 3 / 2);
                    } else if (yourSums < 21) {
                        message = "You win!";
                        yourMoney.textContent = parseInt(yourMoney.textContent) + parseInt(inputMoney.value);
                    }
                } else if (yourSums == aiSums) {
                    message = "Tie!";
                } else if (yourSums > aiSums) {
                    if (yourSums == 21) {
                        message = "You win!";
                        yourMoney.textContent = parseInt(yourMoney.textContent) + (inputMoney.value * 3 / 2);
                    } else if (yourSums < 21) {
                        message = "You Win!";
                        yourMoney.textContent = parseInt(yourMoney.textContent) + parseInt(inputMoney.value);
                    }
                } else if (yourSums < aiSums) {
                    message = "You Lose!";
                    yourMoney.textContent -= inputMoney.value;
                }

                result.textContent = message;
                btnStartGame.disabled = false;
                btnTakeCard.disabled = true;
                inputMoney.disabled = false;
            }
        }, 1000);
    }

    addBotCards();
});

btnResetCard.addEventListener("click", function () {
    while (yourCardsResult.firstChild) {
        yourCardsResult.firstChild.remove();
    }

    while (aiCardsResult.firstChild) {
        aiCardsResult.firstChild.remove();
    }

    setTimeout(function () {
        let myCardImg = document.createElement("img");
        myCardImg.src = "./img/BACK.png";
        myCardImg.className = "hidden-card";
        yourCardsResult.append(myCardImg);
    
        let cardImg = document.createElement("img");
        cardImg.src = "./img/BACK.png";
        cardImg.className = "hidden-card";
        aiCardsResult.append(cardImg);
    
        buildCards();
        shuffleCards();
    
        aiSumsResult.textContent = "";
        yourSumsResult.textContent = "";
        result.textContent = "";
        cardsLeft.textContent = cards.length;
        btnStartGame.disabled = false;
        btnTakeCard.setAttribute("disabled", true);
        btnHoldCard.setAttribute("disabled", true);
    }, 200);
})

function getValueOfCard(card) {
    let cardDetail = card.split("-");
    let value = cardDetail[0];

    if (isNaN(value)) {
        if (value == "A") {
            if (yourSums >= 11 || aiSums >= 11) {
                return 1
            } else if (yourSums < 11 || aiSums < 11) {
                return 11;
            }
        }
        return 10;
    }

    return parseInt(value);
}

function checkASCard(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

function reduceAS(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;
        playerAceCount -= 1;
    }

    return playerSum;
}