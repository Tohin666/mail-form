const formElem = document.getElementById('form');

formElem.onsubmit = async (e) => {
    e.preventDefault();

    fetch('mail.php', {
        method: 'POST',
        body: new FormData(formElem)
    })
        .then(response => console.log(response))
        .catch(error => console.log(error));
};