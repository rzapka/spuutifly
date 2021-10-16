const playlistsContainer = document.querySelector('.items')
const searchInput = document.querySelector('.searchInput')

searchInput.addEventListener('keyup', e => {
    axios({
        method: 'post',
        url: '/search-playlists',
        data: {
            'phrase': e.target.value
        },
    })
        .then(res => {
            playlistsContainer.innerHTML = ''
            res.data.forEach(item => {
                const route = `/playlist/${item.id}`
                playlistsContainer.innerHTML +=
                    ` <div class="item col-md-1 mt-3 mx-5">
                <a href=${route} class="playlist-link"><img src="../storage/images/playlist.png" alt=""
                    class="playlist-image"></a>
                <p class="">${item.name}</p>
            </div>`
            })
        })
        .catch(err => console.log(err))
})
searchInput.value = ''
