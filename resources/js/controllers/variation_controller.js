import { Controller } from '@hotwired/stimulus';
import { useDebounce } from 'stimulus-use';

export default class extends Controller {
    static debounces = ['submit'];

    connect() {
        useDebounce(this);
    }

    submit(e) {
        e.target.form.requestSubmit();
    }
}
