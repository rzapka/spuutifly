const playButton = document.querySelector('i.playSong')
const audio = document.createElement('audio')
const songImage = document.querySelector('.songInfo img')
const author = document.querySelector('h6.author')
const title = document.querySelector('h6.title')
const endTimer = document.querySelector('.endTimer')
const repeatBtn = document.querySelector('.repeatSong')
let songSource = ''
const songDuration = document.querySelector('.endTimer')
let songs
let index = 0



fetch('../json/randSong.json')
    .then(response => response.json())
    .then(data => {
        songs = data
        songImage.src = data[0].album.photo
        author.textContent = data[0].artist.name
        title.textContent = data[0].title
        endTimer.textContent = data[0].duration
        songSource = data[0].file_name
        audio.src = data[0].file_name
    })
    .catch(err => console.log(err))




playButton.addEventListener('click', () => {
    if (playButton.classList.contains('fa-pause-circle')) {
        audio.pause()
        playButton.title = "Start"
        playButton.classList.remove('fa-pause-circle')
        playButton.classList.add('fa-play-circle')
    } else {
        audio.play()
        playButton.classList.remove('fa-play-circle')
        playButton.title = "Pauza"
        playButton.classList.add('fa-pause-circle')
    }
})

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

const changeActualSong = () => {
    playMusic(songs[index].file_name)
    songImage.src = '../' + songs[index].album.photo
    author.textContent = songs[index].artist.name
    title.textContent = songs[index].title
    songDuration.textContent = songs[index].duration
}


const prevBtn = document.querySelector('.prevSong')
const nextBtn = document.querySelector('.nextSong')

prevBtn.addEventListener('click', () => {
    if (index !== 0) {
        index--
    }
    changeActualSong()
})

nextBtn.addEventListener('click', () => {
    if (index !== songs.length - 1) {
        index++
    }
    changeActualSong()
})


repeatBtn.addEventListener('click', () => {
    changeActualSong()
    playButton.classList.remove('fa-play-circle')
    playButton.classList.add('fa-pause-circle')
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
        index++
        changeActualSong()
    }
})


progressBarOfSong.addEventListener('click', (e) => {
    const percentage = Math.floor(e.offsetX / progressBarOfSong.clientWidth * 100)
    progressOfSong.style.width =  percentage + '%'
    audio.currentTime =  percentage / 100 * audio.duration
})


const progressBarOfVolume = document.querySelector('.progressBarOfVolume')
const progressOfVolume = document.querySelector('.actualProgressOfVolume')

audio.volume = 0.5

progressBarOfVolume.addEventListener('click', e => {
    const percentage = Math.floor(e.offsetX / progressBarOfVolume.clientWidth * 100)
    progressOfVolume.style.width =  percentage + '%'
    audio.volume = percentage / 100
})

const shuffleBtn = document.querySelector('.shuffle')
    shuffleBtn.addEventListener('click', () => {
    shuffleBtn.classList.toggle('shuffled')
})

