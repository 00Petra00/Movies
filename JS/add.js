const img = document.getElementById('image')
const name = document.getElementById('name')
const author = document.getElementById('author')
const date = document.getElementById('date')

const addform = document.getElementById('addform')
const errorElement = document.getElementById('error')

addform.addEventListener('submit', (e) => {
    let messages = []
    if (name.value === '' || name.value == null){
        messages.push('Name is required')
    }
    else if (author.value === '' || author.value == null){
        messages.push('Author is required')
    }
    else if (date.value === '' || date.value == null){
        messages.push('Date is required')
    }
    else if (date.value > 2023 || date.value < 1900){
        messages.push('Incorrect date')
    }


    if (messages.length > 0){
    e.preventDefault()
    errorElement.innerText
        = messages.join(',')
    }
})
