document.addEventListener('DOMContentLoaded', () => {
  loadArtisti();
});

function loadArtisti() {
  fetch('load_artisti.php') // <-- Assicurati che sia il file corretto
    .then(response => response.json())
    .then(json => {
      console.log(json);
      if (json.artists) {
        mostraArtisti(json.artists);
      } else {
        console.log('Nessun artista trovato.');
      }
    })
    .catch(error => console.error('Errore nel caricamento:', error));
}

function mostraArtisti(lista) {
  const container = document.querySelector('#sezione-artisti');
  container.innerHTML = '';

  for (let item of lista) {
    const card = document.createElement('div');
    card.classList.add('singolo');

    const img = document.createElement('img');
    img.src = item.image;
    card.appendChild(img);

    const title = document.createElement('h1');
    title.textContent = item.title;
    card.appendChild(title);

    const artist = document.createElement('p');
    artist.textContent = item.artist;
    card.appendChild(artist);

    container.appendChild(card);
  }
}
