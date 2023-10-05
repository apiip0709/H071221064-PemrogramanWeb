function palindrom(kata) {
    if (typeof kata === 'string') {
        let hasil = kata === kata.split('').reverse().join('');
        if (hasil) {
            console.log(`${kata} ADALAH kata palindrom`);
        } else {
            console.log(`${kata} BUKAN kata palindrom`);
        }
    } else {
        let angkaString = kata.toString();
        let hasil = angkaString === angkaString.split('').reverse().join('');
        if (hasil) {
            console.log(`${angkaString} ADALAH kata palindrom`);
        } else {
            console.log(`${angkaString} BUKAN kata palindrom`);
        }
    }
}

let kata = "malam";
palindrom(kata);

kata = 'apa';
palindrom(kata);

kata = 131;
palindrom(kata);

kata = 12321;
palindrom(kata);

kata = 'kodok';
palindrom(kata);

kata = 'kasur ini rusak';
palindrom(kata);

kata = 1.1;
palindrom(kata);

kata = "saya makan nasi";
palindrom(kata)