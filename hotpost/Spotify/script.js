/*
  Spotify - Player
  - Reformatado (indentação)
  - Comentários por seção
*/

// =========================
// Elementos do DOM
// =========================
const audioPlayer = document.getElementById('audio-player');
const btnPlayPause = document.getElementById('btn-play-pause');
const btnAnterior = document.getElementById('btn-anterior');
const btnProximo = document.getElementById('btn-proximo');
const barraProgresso = document.getElementById('barra-progresso');
const tempoAtual = document.getElementById('tempo-atual');
const tempoTotal = document.getElementById('tempo-total');
const musicaTitulo = document.getElementById('musica-titulo');
const musicaCards = document.querySelectorAll('.musica-card');

// =========================
// Estado do player
// =========================
let musicasArray = [];
let indiceAtual = 0;

// =========================
// Montar array de músicas a partir dos cards
// =========================
musicaCards.forEach((card) => {
  musicasArray.push({
    src: card.getAttribute('data-src'),
    titulo: card.querySelector('h3').textContent,
    artista: card.querySelector('p').textContent,
  });
});

// =========================
// Play/Pause
// =========================
btnPlayPause.addEventListener('click', () => {
  if (audioPlayer.paused) {
    audioPlayer.play();
    btnPlayPause.textContent = '⏸';
  } else {
    audioPlayer.pause();
    btnPlayPause.textContent = '▶';
  }
});

// =========================
// Próxima / Anterior
// =========================
btnProximo.addEventListener('click', () => {
  indiceAtual = (indiceAtual + 1) % musicasArray.length;
  carregarMusica(indiceAtual);
  audioPlayer.play();
});

btnAnterior.addEventListener('click', () => {
  indiceAtual = (indiceAtual - 1 + musicasArray.length) % musicasArray.length;
  carregarMusica(indiceAtual);
  audioPlayer.play();
});

// =========================
// Carregar música no <audio>
// =========================
function carregarMusica(index) {
  const musica = musicasArray[index];
  audioPlayer.src = musica.src;
  musicaTitulo.textContent = `${musica.titulo} - ${musica.artista}`;
  btnPlayPause.textContent = '⏸';
}

// =========================
// Clique no card para tocar a música
// =========================
musicaCards.forEach((card, index) => {
  card.addEventListener('click', () => {
    indiceAtual = index;
    carregarMusica(index);
    audioPlayer.play();
  });
});

// =========================
// Barra de progresso + tempos
// =========================
audioPlayer.addEventListener('timeupdate', () => {
  const duracao = audioPlayer.duration;
  const progresso = duracao ? (audioPlayer.currentTime / duracao) * 100 : 0;

  barraProgresso.value = progresso || 0;
  tempoAtual.textContent = formatarTempo(audioPlayer.currentTime);
});

barraProgresso.addEventListener('change', (e) => {
  if (!audioPlayer.duration) return;
  audioPlayer.currentTime = (e.target.value / 100) * audioPlayer.duration;
});

audioPlayer.addEventListener('loadedmetadata', () => {
  tempoTotal.textContent = formatarTempo(audioPlayer.duration);
});

// =========================
// Música seguinte ao terminar
// =========================
audioPlayer.addEventListener('ended', () => {
  btnProximo.click();
});

// =========================
// Utilitário: formatar tempo (mm:ss)
// =========================
function formatarTempo(segundos) {
  if (isNaN(segundos)) return '00:00';

  const minutos = Math.floor(segundos / 60);
  const segs = Math.floor(segundos % 60);

  return `${minutos.toString().padStart(2, '0')}:${segs.toString().padStart(2, '0')}`;
}

