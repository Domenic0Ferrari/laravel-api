import './bootstrap';
import '~resources/scss/app.scss';

import.meta.glob([
    '../img/**'
]);

import * as bootstrap from 'bootstrap';

// scrivo codice per intercettare l'eliminazione nell'index

// document.querySelectorAll('.js-delete').forEach(button => {
//     button.addEventListener('click', function () {
//         // il this punta al bottone cliccato, con dataset estraggo l'informazione dell'id
//         console.log('Hai cliccato il button con id: ' + this.dataset.id);
//         // devo conoscere la struttura delle rotte per scrivere così 
//         document.querySelector('#confirm-delete').action = `/admin/posts/${this.dataset.id}`;
//     })
// })

document.querySelectorAll('.js-delete-2').forEach(button => {
    button.addEventListener('click', function () {
        // il this punta al bottone cliccato, con dataset estraggo l'informazione dell'id
        console.log('Hai cliccato il button con id: ' + this.dataset.id);
        // devo conoscere la struttura delle rotte per scrivere così 
        document.querySelector('#confirm-delete-2').action = `/admin/projects/${this.dataset.id}`;
    })
})


document.querySelectorAll('.js-delete-2').forEach(button => {
    button.addEventListener('click', function () {
        // il this punta al bottone cliccato, con dataset estraggo l'informazione dell'id
        console.log('Hai cliccato il button con id: ' + this.dataset.id);
        // devo conoscere la struttura delle rotte per scrivere così 
        document.querySelector('#confirm-delete-3').action = `/admin/projects/${this.dataset.id}`;
    })
})

document.querySelectorAll('.js-delete-2').forEach(button => {
    button.addEventListener('click', function () {
        // il this punta al bottone cliccato, con dataset estraggo l'informazione dell'id
        console.log('Hai cliccato il button con id: ' + this.dataset.id);
        // devo conoscere la struttura delle rotte per scrivere così 
        document.querySelector('#confirm-delete-4').action = `/admin/projects/${this.dataset.id}`;
    })
})