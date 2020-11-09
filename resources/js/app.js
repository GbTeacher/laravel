let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let deleteButtons = document.querySelectorAll('.delete-button');

for (let deleteButton of deleteButtons) {
    deleteButton.addEventListener('click', deleteHandler);
}

async function deleteHandler(event) {
    event.preventDefault();

    let answer = confirm("Вы точно хотите удалить сущность?");

    if (answer) {
        let response = await fetch('/admin/' + this.dataset.type + '/' + this.dataset.id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        });

        let result = await response.json();

        if (result.status) {
            location.reload();
        }
    }
}


