const url = "https://query1.finance.yahoo.com/v10/finance/quoteSummary/";

var el = document.getElementsByName('ticker-name');
console.log(el);
 

function findTicker() {
    var ticker = document.getElementById("ticker-form");   
    console.log(ticker.elements[0].value);
}