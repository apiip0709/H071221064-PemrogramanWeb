function hitungPangkat(angka, pangkat) {
    // menghitung pangkat
    let hasil = angka ** pangkat;
    return hasil;
}

// menjalankan di terminal
let angka = 2;
let pangkat = 10;
console.log(`Hasil = ${hitungPangkat(angka, pangkat)}`)

angka = 3;
pangkat = 4;
console.log(`Hasil = ${hitungPangkat(angka, pangkat)}`)

// menjalankan di web
// let angka = parseInt(prompt("Masukkan angka: "));
// let pangkat = parseInt(prompt("Masukkan pangkat: "));
// hitungPangkat(angka, pangkat);
