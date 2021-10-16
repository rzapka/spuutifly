const albumsContainer = document.querySelector('.items')
const searchInput = document.querySelector('.searchInput')

searchInput.addEventListener('keyup', e => {
    axios({
        method: 'post',
        url: '/search-albums',
        data: {
            'phrase': e.target.value
        },
    })
        .then(res => {
            albumsContainer.innerHTML = ''
            res.data.forEach(item => {
                const route = '/album=' + item.id
                albumsContainer.innerHTML +=
                    `<div class="item col-md-2">
                <a href="${route}"><img src="${item.photo}"></a>
                <p class="mt-2">${item.title}</p>
            </div>`
            })
        })
})
searchInput.value = ''
