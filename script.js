const formElem = document.getElementById('form');

formElem.onsubmit = async (e) => {
    e.preventDefault();

    fetch('mail.php', {
        method: 'POST',
        body: new FormData(formElem)
    })
        .then(response => response.json())
        .then(json => {
            // const message = json['success'] ? 'Mail sent!' : 'Something wrong!';
            const messageElem = document.getElementById('status');
            messageElem.textContent = json['status'];
            // messageElem.textContent = message;
            formElem.after(messageElem);
        });
};