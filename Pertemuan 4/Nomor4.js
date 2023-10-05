function sortArray(array) {
    // Melakukan Perulangan untuk membandingkan angka dalam array
    for (let i = 0; i < array.length - 1; i++) {
        for (let j = 0; j < array.length - i - 1; j++) {
            if (array[j] > array[j + 1]) {
                // Menukar angka jika angka sebelumnya lebih besar dari angka berikutnya
                const temp = array[j];
                array[j] = array[j + 1];
                array[j + 1] = temp;
            }
        }
    }
}

// Untuk menjalankan di terminal
let n = 5;
let input = "50 20 1 45 3";

let numberArray = input.split(" ").map(Number);
if (n === numberArray.length) {
    sortArray(numberArray);
    console.log("Angka yang sudah diurutkan: " + numberArray.join(" "));
} else {
    console.log("Jumlah angka yang dimasukkan tidak sesuai!");
}

// Untuk Menjalankan di web
// let n = parseInt(prompt("Jumlah angka yang diinginkan: "));
// let input = prompt("Masukkan angka, dipisahkan oleh spasi: ");

// // menyimpan inputan ke dalam array dan mengubah ke bentuk integer
// let numberArray = input.split(" ").map(Number);

// // Kondisi apakah inputan sesuai dengan jumlah yang diinginkan
// if (n === numberArray.length) {
//     sortArray(numberArray);
//     alert("Angka yang sudah diurutkan: " + numberArray.join(" "));
// } else {
//     alert("Jumlah angka yang dimasukkan tidak sesuai!");
// }
