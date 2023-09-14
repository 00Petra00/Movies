const username = document.getElementById('username')
const password = document.getElementById('password')
const loginform = document.getElementById('loginform')
const errorElement = document.getElementById('error')

let users = [{uname: "teszt1", pass: "12345678"},
             {uname: "teszt2", pass: "12345678"}]

loginform.addEventListener('submit', (e) =>{
    let messages = []
    let currentUser = null;
    const exists = users.find(user => {
        return user.uname === username.value && user.pass === password.value
    });

    if (username.value === '' || username.value == null){
        messages.push('Username is required')
    }
    else if (password.value === '' || password.value == null){
        messages.push('Password is required')
    }
    if (password.value.length <= 6){
        messages.push('Password must be longer than 6 characters')
    }
    else if(!exists){
        messages.push('Incorrect username or password')
    }
    else{
        currentUser = username
    }

    if (messages.length > 0){
        e.preventDefault()
        errorElement.innerText
            = messages.join(',')
    }
})


