function binary(angka) {
    if (angka === 0) {
        return 0;
    }

    let binary = '';
    while (angka > 0) {
        const sisaBagi = angka % 2;
        binary = sisaBagi + binary;
        angka = Math.floor(angka / 2); 
    }

    return binary;
}

// Untuk menjalankan di terminal
let angka = 14;
console.log(`Angka biner dari ${angka} : ${binary(angka)}`)

angka = 31;
console.log(`Angka biner dari ${angka} : ${binary(angka)}`)

angka = 42;
console.log(`Angka biner dari ${angka} : ${binary(angka)}`)

// Ini untuk Menjalankan di Web
// let angka = parseInt(prompt("Masukkan angka: "));
// alert(`Angka biner dari ${angka} : ${binary(angka)}`);