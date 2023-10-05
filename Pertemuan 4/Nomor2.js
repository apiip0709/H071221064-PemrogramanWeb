function cipherText(kata, n) {
    const alphabet = 'abcdefghijklmnopqrstuvwxyz';
    const nAlphabet = alphabet.slice(n) + alphabet.slice(0, n);
    const hasil = [];

    for (let i = 0; i < kata.length; i++) {
        const huruf = kata[i];
        const hurufKapital = huruf === huruf.toUpperCase();

        // konversi setiap huruf menjadi huruf kecil
        const hurufKecil = huruf.toLowerCase();
        const indexAlphabet = alphabet.indexOf(hurufKecil);

        // kondisi jika karakter ada dalam alfabet
        if (indexAlphabet !== -1) {
            let nHuruf = nAlphabet[indexAlphabet];

            // kondisi kalau huruf besar, maka diubah ke huruf besar
            if (hurufKapital) {
                nHuruf = nHuruf.toUpperCase();
            }

            hasil.push(nHuruf);
        } else {
            // Kondisi selain huruf, kita tetap tambahkan
            hasil.push(huruf);
        }
    }

    return hasil.join('');
}

// menjalankan di terminal
let text = "abc";
let geser = 1;
console.log(cipherText(text, geser));

text1 = "Indonesia";
geser1 = 13;
console.log(cipherText(text1, geser1));

// menjalankan di web
// let text = prompt("Masukkan teks untuk di encrypt: ")
// let geser = parseInt(prompt("Mau digeser sebanyak berapa: "))
// alert(cipherText(text, geser))