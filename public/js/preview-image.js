const placeholder =
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw_HeSzHfBorKS4muw4IIeVvvRgnhyO8Gn8w&usqp=CAU";
const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('preview');
const reset = document.getElementById('reset');

imageInput.addEventListener('change', () => {
    // Prima controllo se ci sono file
    if (imageInput.files && imageInput.files[0]) {
        // Istanzio il reader
        let reader = new FileReader();
        // Gli faccio leggere l'url del file caricato
        reader.readAsDataURL(imageInput.files[0]);
        // Gli faccio ascoltare il loader
        reader.onload = (e) => {
            // Setto l'immagine del file col risultato
            imagePreview.setAttribute('src', e.target.result);
        }
    } else {
        imagePreview.setAttribute('src', placeholder);
    }
});

// Aggiungo un event listener al bottone reset per svuotare tutti i campi del form e quindi anche l'eventuale immagine caricata
reset.addEventListener('click', () => {
    imagePreview.setAttribute('src', placeholder);
});