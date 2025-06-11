
function createArtist(artistImage,artistName, artistDescription){

    const modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    const name = document.createElement('h2');
    name.textContent = artistName;

    const image = document.createElement('img');
    image.src = artistImage;

    const descr = document.createElement('p');
    descr.textContent = artistDescription;

    modalContent.appendChild(image);
    modalContent.appendChild(name);
    modalContent.appendChild(descr);

   
    modalView.appendChild(modalContent);
}

function onArtistClick(event){
    const artist= event.currentTarget;
    console.log('Hai cliccato su:', artist.textContent);
    
    const artistName= artist.querySelector('h2').textContent;
    const artistImage= artist.querySelector('img').src;
    const artistDescription= artist.querySelector('p').textContent;

    createArtist(artistImage,artistName, artistDescription);

    document.body.classList.add('no-scroll');
    modalView.style.top = window.pageYOffset + 'px';
    modalView.classList.remove('hidden');
}

function onModalClick(event) {
    document.body.classList.remove('no-scroll');  
    if (event.target === modalView) { 
    modalView.classList.add('hidden');
    modalView.innerHTML = '';
    }
}


const artistList = document.querySelectorAll('.artista');
console.log('Artisti trovati:', artistList);

for (let i = 0; i < artistList.length; i++) {
    artistList[i].addEventListener('click', onArtistClick);
}

const modalView = document.querySelector('#modal-view');
modalView.addEventListener('click', onModalClick);


console.log("JavaScript caricato correttamente!");


 


function onBlur(event) {
    const testo = event.target;
    if (testo.value === '') {
      testo.value = testo.dataset.text;  
    }
    
    const image=document.querySelector('#storage img');
    image.src='icons8-storage-24.png';
  }
  

  function onFocus(event) {
    const testo = event.target;
   
    if (testo.value === testo.dataset.text) {
      testo.value = '';  
    }
    const image=document.querySelector('#storage img');
    image.src='storage-white.png';
  }

const testo = document.getElementById('search-bar');
testo.value=testo.dataset.text;


testo.addEventListener('blur', onBlur);
testo.addEventListener('focus', onFocus);



function onPlaylistClick(event){
    const Playlistview= event.currentTarget;
    console.log('Hai cliccato su:', Playlistview.textContent);

    const create=document.querySelector('#creaPlaylist');
    create.classList.remove('hidden');
}

function onCloseClick(event){
    const create=document.querySelector('#creaPlaylist');
    create.classList.add('hidden');
}


const Playlistview=document.querySelector('#playlist');
Playlistview.addEventListener('click', onPlaylistClick);

const close=document.querySelector('#close');
close.addEventListener('click', onCloseClick);



function etichettaOpen(event){
    
    const etich=document.createElement('div');
    etich.classList.add('etichetta');

    const text = document.createElement('p');
    text.textContent= home.dataset.text;

    etich.appendChild(text);
    document.body.appendChild(etich);
}

function etichettaClose(event){
    const etich=document.querySelector('.etichetta');
    etich.classList.remove('etichetta');

    etich.innerHTML='';
}

const home=document.getElementById('house');
home.addEventListener('mouseover', etichettaOpen);
home.addEventListener('mouseout', etichettaClose);


/*
function mostraTutto(){
    const mostra=document.querySelector('#mostra-tutto');
    console.log('Hai cliccato su:', comp.textContent);
    mostra.classList.remove('nascondi');
}

function nonMostraTutto(event){
    const mostra=document.querySelector('#mostra-tutto');
    console.log('Hai cliccato su:', comp.textContent);
    mostra.classList.add('nascondi');
}

const comp=document.querySelector('.title h2');
comp.addEventListener('click', mostraTutto);

const noComp=document.querySelector('#chiudi-mostra-tutto');
noComp.addEventListener('click', nonMostraTutto);

*/


function onJson(json) {
    console.log('JSON ricevuto');
    console.log(json);

    const library = document.querySelector('#risultatiRicerca'); 
    library.innerHTML = '';
    
    
    const results = json.tracks.items;
    let num_results = results.length;

    console.log(json.tracks.items[0]);
    
    if (!num_results) {noResults(); return;}

    if(num_results > 12)
      num_results = 12;
    for(let i=0; i<num_results; i++){
      const album_data = results[i];
      const album = document.createElement('div');

      album.dataset.id = album_data.id;
        album.dataset.title = album_data.name;
        album.dataset.artist = album_data.artists[0].name;
        album.dataset.image = album_data.album.images[0].url;
      
      album.classList.add('singolo');
      
      const img = document.createElement('img');
      img.src = album_data.album.images[0].url;
      album.appendChild(img);

      const caption = document.createElement('h1');
      caption.textContent = album_data.name;
      album.appendChild(caption);
      
      const artist = document.createElement('a');
      artist.textContent = album_data.artists[0].name;
      album.appendChild(artist);

       const saveForm = document.createElement('div');
        saveForm.classList.add("saveForm");

        const save = document.createElement('div');
        save.value='';
        save.classList.add("save"); 
        saveForm.appendChild(save);
        saveForm.addEventListener('click',saveSong );

        album.appendChild(saveForm);

        console.log('Salvataggio creato', save);



    library.appendChild(album);

    }
  }


function clickLike(event){
  event.stopPropagation();
}

  
  function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }


function search(event){
    event.preventDefault();
    
    const form_data = new FormData(document.querySelector("#ricerca"));

    fetch("search_content.php?q="+encodeURIComponent(form_data.get('search'))).then(onResponse).then(onJson);

}


const ricerca=document.querySelector('#ricerca');
ricerca.addEventListener('submit', search);




function saveSong(event){
  event.stopPropagation();
  console.log("Salvataggio")
const album = event.currentTarget.closest('.singolo');
console.log(album.dataset.id); 

  const formData = new FormData();
  formData.append('id', album.dataset.id);
  formData.append('title', album.dataset.title);
  formData.append('artist', album.dataset.artist);
  formData.append('image', album.dataset.image);
  fetch("save_song.php", {method: 'post', body: formData}).then(dispatchResponse, dispatchError);
  
}

function dispatchResponse(response) {
  console.log(response);
  return response.json().then(databaseResponse); 
}

function dispatchError(error) { 
  console.log("Errore");
}

function databaseResponse(json) {
  if (!json.ok) {
      dispatchError();
      return null;
  }
}
















function mostraSezione(lista, titolo, selettore) {
  const container = document.querySelector(selettore);
  if (!container) return;

  container.innerHTML = ''; 
  const h2 = document.createElement('h2');
  h2.textContent = titolo;
  h2.style.gridColumn = "1 / -1"; 
  h2.style.color = "white";
  h2.style.marginBottom = "10px";
  container.appendChild(h2);

  for (let item of lista) {
    const card = document.createElement('div');

    if (selettore === '#sezione-artisti') {
      card.classList.add('artista');
    } else {
      card.classList.add('singolo');
    }

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


document.addEventListener("DOMContentLoaded", () => {
  fetch("load_dinamico_home.php")
    .then(r => r.json())
    .then(data => {
      mostraSezione(data.tracks, " Brani consigliati", "#sezione-brani");
      mostraSezione(data.albums, " Album del giorno", "#sezione-album");
      mostraSezione(data.artists, " Artisti Pop", "#sezione-artisti");
    });
});





























function adviceJson(json){
  console.log(json);
  const output=document.querySelector('#advice-box');
  output.innerHTML = '';
  output.textContent=json.slip.advice;

output.classList.add('box');
}

function adviceResponse(response){
  return response.json();
}

function advice(){
  fetch("https://api.adviceslip.com/advice").then(adviceResponse).then(adviceJson);

}



const adviceButton=document.querySelector('#gen-button');
adviceButton.addEventListener('click', advice);

