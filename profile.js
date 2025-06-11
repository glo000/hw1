const overlay = document.getElementById("overlay");
overlay.classList.add("hidden");



function fetchSongs() {
        fetch("fetch_song.php").then(fetchResponse).then(fetchSongsJson);
}


function fetchResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

function fetchSongsJson(json) {
    console.log("Fetching...");
    console.log(json);

    const count= document.getElementById('count');
    count.textContent = json.length ;
    if (!json.length) {
  noResults();
  return;
}

for (let i = 0; i < json.length; i++) {
  const album_data = json[i];  

  const album = document.createElement('div');
  album.classList.add('singolo');

  const img = document.createElement('img');
  img.src = album_data.image;
  album.appendChild(img);

  const caption = document.createElement('h1');
  caption.textContent = album_data.title;
  album.appendChild(caption);

  const artist = document.createElement('p');
  artist.textContent = album_data.artist;
  artist.classList.add('artista');
  album.appendChild(artist);

  document.getElementById('results').appendChild(album);
}

      

}

function noResults() {
    const container = document.getElementById('results');
    container.innerHTML = '';
    const nores = document.createElement('div');
    nores.className = "nores";
    nores.textContent = "Nessun risultato.";
    container.appendChild(nores);
  }



fetchSongs();