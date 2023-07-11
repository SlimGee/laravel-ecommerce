import { Controller } from '@hotwired/stimulus';
import axios from 'axios';

// Connects to data-controller="options"
export default class extends Controller {
    static targets = ['formTemplate', 'card', 'footer', 'form'];

    static values = {
        state: Boolean,
    };

    state;

    connect() {
        this.state = this.stateValue;
        if (this.state) {
            this.footerTarget.classList.remove('d-none');
        }
    }

    toggle(e) {
        this.state = !this.state;
        if (this.state) {
            this.addForm();
        } else {
            this.formTargets.forEach((item, i) => {
                item.remove();
            });

            this.footerTarget.classList.add('d-none');
        }
    }

    addForm() {
        const template = this.formTemplateTarget.innerHTML;
        this.cardTarget.insertAdjacentHTML('beforeend', template);
        this.footerTarget.classList.remove('d-none');
    }

    removeForm(e) {
        e.target.closest('form').parentElement.remove();
        if (e.target.dataset.option) {
            axios
                .delete(route('admin.options.destroy', e.target.dataset.option))
                .then((resp) => {})
                .catch((err) => {});
        }
    }
}
