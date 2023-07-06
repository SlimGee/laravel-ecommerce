import { Controller } from '@hotwired/stimulus';
import { useClickOutside } from 'stimulus-use';

// Connects to data-controller="fields"
export default class extends Controller {
    static targets = ['template', 'input', 'typeahead'];

    connect() {
        useClickOutside(this, { element: this.typeaheadTarget });

        const template = this.templateTarget.innerHTML;
        this.templateTarget.insertAdjacentHTML('beforebegin', template);
    }

    addOptionValue(e) {
        const template = this.templateTarget.innerHTML;
        e.target.parentElement.nextElementSibling.classList.remove('d-none');
        e.target.parentElement.parentElement.insertAdjacentHTML(
            'afterend',
            template
        );
    }

    removeOptionValue(e) {
        e.target.closest('div').parentElement.remove();
    }

    updateInput({ params: { update } }) {
        this.inputTarget.value = update;
        this.typeaheadTarget.classList.add('d-none');
    }

    closeTypeahead(event) {
        if (this.inputTarget !== document.activeElement) {
            this.typeaheadTarget.classList.add('d-none');
        }
    }

    showTypeahead() {
        this.typeaheadTarget.classList.remove('d-none');
    }
}
