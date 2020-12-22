function encryptString(stringToEncrypt){
    let hashString = "z8ECURAvh79pl0GSj9Y";
    let encrypted = CryptoJS.AES.encrypt(stringToEncrypt, hashString);
    //console.log("Encrypted: " + encrypted);
    return "" + encrypted;
}

function decryptString(stringToDecrypt){
    let hashString = "z8ECURAvh79pl0GSj9Y";
    let decrypted = CryptoJS.AES.decrypt(stringToDecrypt, hashString);
    let decryptedPretty = decrypted.toString(CryptoJS.enc.Utf8);
    //console.log("Decrypted: " + decrypted);
    //console.log("Original string after decryption: " + decryptedPretty);
    return "" + decryptedPretty;
}