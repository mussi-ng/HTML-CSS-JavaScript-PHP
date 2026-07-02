// Elementos do DOM
const audioPlayer = document.getElementById('audio-player');
const btnPlayPause = document.getElementById('btn-play-pause');
const btnAnterior = document.getElementById('btn-anterior');
const btnProximo = document.getElementById('btn-proximo');
const barraProgresso = document.getElementById('barra-progressso');
const tempoAtual = document.getElementById('tempo-atual');
const tempoTotal = document.getElementById('tempo-total');
const musicaTitulo = document.getElementById('musica-titulo');
const musicaCards = document.querySelectorAll('.musica-card');
const botoesPlay = document.querySelectorAll('.btn-play');

let musicasArray = [];
let indiceAtual = 0;

// Preparar array de músicas
musicaCards.forEach((card, index) => {
    musicasArray.push({
        src: card.getAttribute('data-src'),
        titulo: card.querySelector('h3').textContent,
        artista: card.querySelector('p').textContent
    });
});

// Play/Pause do Player
btnPlayPause.addEventListener('click', () => {
    if (audioPlayer.paused) {
        audioPlayer.play();
        btnPlayPause.textContent = '⏸';
    } else {
        audioPlayer.pause();
        btnPlayPause.textContent = '▶';
    }
});

// Próxima Música
btnProximo.addEventListener('click', () => {
    indiceAtual = (indiceAtual + 1) % musicasArray.length;
    carregarMusica(indiceAtual);
    audioPlayer.play();
});

// Música Anterior
btnAnterior.addEventListener('click', () => {indiceAtual = (indiceAtual - 1 + musicasArray.length) % musicasArray.length;
    carregarMusica(indiceAtual);
    audioPlayer.play();
});

// Carregar Música
function carregarMusica(index) {
    const musica = musicasArray[index];
    audioPlayer.src = musica.src;
    musicaTitulo.textContent = `${musica.titulo} - ${musica.artista}`;
    btnPlayPause.textContent = '⏸';
}

// Clique nos cards de música
musicaCards.forEach((card, index) => {
    card.addEventListener('click', () => {
        indiceAtual = index;
        carregarMusica(index);
        audioPlayer.play();
    });
});

// Barra de Progresso
audioPlayer.addEventListener('timeupdate', () => {
    barraProgresso.value = (audioPlayer.currentTime / audioPlayer.duration) * 100 || 0;
    tempoAtual.textContent = formatarTempo(audioPlayer.currentTime);
});

barraProgresso.addEventListener('change', (e) => {
    audioPlayer.currentTime = (e.target.value / 100) * audioPlayer.duration;
});

// Tempo Total
audioPlayer.addEventListener('loadedmetadata', () => {
    tempoTotal.textContent = formatarTempo(audioPlayer.duration);
});

// Próxima música automaticamente
audioPlayer.addEventListener('ended', () => {
    btnProximo.click();
});

// Função para formatar tempo
function formatarTempo(segundos) {
    if (isNaN(segundos)) return '00:00';
    const minutos = Math.floor(segundos / 60);
    const segs = Math.floor(segundos % 60);
    return `${minutos.toString().padStart(2, '0')}:${segs.toString().padStart(2, '0')}`;
}