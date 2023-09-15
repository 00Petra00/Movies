const username = document.getElementById('username')
const password = document.getElementById('password')
const loginform = document.getElementById('loginform')
const errorElement = document.getElementById('error')

loginform.addEventListener('submit', (e) =>{
    let messages = []
    if (username.value === '' || username.value == null){
        messages.push('Username is required')
    }
    else if (password.value === '' || password.value == null){
        messages.push('Password is required')
    }

    if (messages.length > 0){
        e.preventDefault()
        errorElement.innerText
            = messages.join(',')
    }
})


