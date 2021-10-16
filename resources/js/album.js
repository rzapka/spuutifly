
const playButton = document.querySelector('i.playSong')

const audio = document.createElement('audio')


const playMusic = (src) => {

    audio.src = src;

    if (playButton.classList.contains('fa-play-circle')) {
        audio.play()
        playButton.classList.remove('fa-play-circle')
        playButton.classList.add('fa-pause-circle')
    } else {
        audio.pause()
        audio.play()
    }
}

playButton.addEventListener('click', () => {
    if (playButton.classList.contains('fa-pause-circle')) {
        audio.pause()
        playButton.title = "Start"
        playButton.classList.remove('fa-pause-circle')
        playButton.classList.add('fa-play-circle')
    } else {
        audio.play()
        playButton.title = "Pauza"
        playButton.classList.remove('fa-play-circle')
        playButton.classList.add('fa-pause-circle')
    }
})

const prevBtn = document.querySelector('.prevSong')
const nextBtn = document.querySelector('.nextSong')
const repeatBtn = document.querySelector('.repeatSong')


let songs
const songDuration = document.querySelector('.endTimer')
fetch('../json/album.json')
.then(response => response.json())
.then(data => {
    const myData = Object.keys(data).map(key => data[key]);
    if (myData[0]) {
        songs = myData
        audio.src = '../' + myData[0].file_name
        songDuration.textContent = myData[0].duration
    } else {
        document.querySelector('.playingBarContainer').innerHTML =
            '<h2 class="noSongsInPlaylist">Nie znaleziono piosenek! <i class="fas fa-poo"></i>  ' +
            '</h2>'
    }
})
.catch(err => console.log(err))


let index = 0


const albumImage = document.querySelector('.songInfo img')
const albumAuthor = document.querySelector('.capture .author')
const songTitle = document.querySelector('.capture .title')

const changeActualSong = () => {
    playMusic(songs[index].file_name)
    albumImage.src = '../' + songs[index].album.photo
    albumAuthor.textContent = songs[index].artist.name
    songTitle.textContent = songs[index].title
    songDuration.textContent = songs[index].duration
}

const playBtns = document.querySelectorAll('span.fa-play');
playBtns.forEach(playBtn => playBtn.addEventListener('click', () => {
    index = playBtn.getAttribute('index');
   changeActualSong()
}))

let isShuffled = false
const shuffleBtn = document.querySelector('.shuffle')
shuffleBtn.addEventListener('click', () => {
    shuffleBtn.classList.toggle('shuffled')
    isShuffled = !isShuffled
})
let lastIndex = index
prevBtn.addEventListener('click', () => {
    if (isShuffled) {
        index = lastIndex
    } else {
        if (index !== 0 && songs.length > 1) {
            index--
        }
    }
    changeActualSong()

})


nextBtn.addEventListener('click', () => {
    lastIndex = index
    if (isShuffled) {
        index = Math.floor(Math.random() * songs.length)
        while (lastIndex === index) {
            index = Math.floor(Math.random() * songs.length)
        }
    } else {
        if (index !== songs.length - 1 && songs.length > 1) {
            index++
        }
    }
    changeActualSong()
})

repeatBtn.addEventListener('click', () => {
    playButton.classList.remove('fa-play-circle')
    playButton.classList.add('fa-pause-circle')
    playMusic(songs[index].file_name)
})

const progressOfSong = document.querySelector('.actualProgressOfSong')
const progressBarOfSong = document.querySelector('.progressBarOfSong')

const formatTime = (sec) => {
    let time = Math.round(sec)
    let minutes = Math.floor(time / 60)
    let seconds = time - (minutes * 60)

    const extraZero = (seconds < 10) ? "0" : ""
    return minutes + ":" + extraZero + seconds
}

const timer = document.querySelector('.startTimer')
audio.addEventListener('timeupdate', () => {
    timer.textContent = formatTime(audio.currentTime)
    progressOfSong.style.width = audio.currentTime / audio.duration * 100 + '%'
    if (audio.currentTime === audio.duration) {
        if (isShuffled) {
            lastIndex = index
            index = Math.floor(Math.random() * songs.length)
            while (lastIndex === index) {
                index = Math.floor(Math.random() * songs.length)
            }
        } else {
            index++
        }
        changeActualSong()
    }
})


progressBarOfSong.addEventListener('click', (e) => {
    const percentage = Math.floor(e.offsetX / progressBarOfSong.clientWidth * 100)
    progressOfSong.style.width =  percentage + '%'
    audio.currentTime = percentage / 100 * audio.duration
})

const progressBarOfVolume = document.querySelector('.progressBarOfVolume')
const progressOfVolume = document.querySelector('.actualProgressOfVolume')

audio.volume = 0.5

progressBarOfVolume.addEventListener('click', e => {
    const percentage = Math.floor(e.offsetX / progressBarOfVolume.clientWidth * 100)
    progressOfVolume.style.width =  percentage + '%'
    audio.volume = percentage / 100
})


const hideOptionsMenu = () => {
    const menu = document.querySelector('.optionsMenu')
    if (menu.style.display !== "none") {
        menu.style.display = "none"
    }
}
window.addEventListener('scroll', hideOptionsMenu)
window.addEventListener('click', e => {
    const target = e.target
    if (!target.classList.contains('elem') && !target.classList.contains('fa-ellipsis-h')
        && !target.classList.contains('select-menu')) {
        hideOptionsMenu()
    }
})


