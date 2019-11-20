const formElem = document.getElementById('form');

formElem.onsubmit = async (e) => {
    e.preventDefault();

    fetch('mail.php', {
        method: 'POST',
        body: new FormData(formElem)
    })
        .then(response => response.json())
        .then(json => {
            const messageElem = document.getElementById('status');
            messageElem.textContent = json['status'];
            formElem.after(messageElem);
        });
};