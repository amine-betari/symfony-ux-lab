import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['button', 'label'];
    static values = {
        key: String,
    };

    connect() {
        this.active = localStorage.getItem(this.storageKey) === 'true';
        this.render();
    }

    toggle() {
        this.active = !this.active;
        localStorage.setItem(this.storageKey, String(this.active));
        this.render();
    }

    render() {
        this.buttonTarget.setAttribute('aria-pressed', String(this.active));
        this.buttonTarget.classList.toggle('is-active', this.active);
        this.labelTarget.textContent = this.active
            ? 'Retirer des favoris'
            : 'Ajouter aux favoris';
    }

    get storageKey() {
        return `favorite:${this.keyValue}`;
    }
}
