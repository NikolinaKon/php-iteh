let brojStavkiUKorpi = 0;

function dodajUKorpu(nazivProizvoda) {
brojStavkiUKorpi++;
azurirajKorpu();

const xhr = new XMLHttpRequest();
xhr.open("POST", "/cart/add", true);
xhr.setRequestHeader("Content-type", "application/json");
xhr.onreadystatechange = function() {
if (xhr.readyState === 4 && xhr.status === 200) {
console.log(xhr.responseText);
}
};
xhr.send(JSON.stringify({ product: nazivProizvoda }));
}

function azurirajKorpu() {
const elementBrojaStavkiUKorpi = document.getElementById("cart-items-count");

elementBrojaStavkiUKorpi.innerText = brojStavkiUKorpi;

const xhr = new XMLHttpRequest();
xhr.open("GET", "/cart", true);
xhr.setRequestHeader("Content-type", "application/json");
xhr.onreadystatechange = function() {
if (xhr.readyState === 4 && xhr.status === 200) {
const korpa = JSON.parse(xhr.responseText);
brojStavkiUKorpi = korpa.items.length;
elementBrojaStavkiUKorpi.innerText = brojStavkiUKorpi;
}
};
xhr.send();
}

function inicijalizujStranicu() {
azurirajKorpu();
}

window.onload = inicijalizujStranicu;