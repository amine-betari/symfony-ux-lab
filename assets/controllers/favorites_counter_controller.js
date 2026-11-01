import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['count', 'label', 'reset'];

    connect() {
        this.refresh();
    }

    refresh() {
        const count = this.favoriteKeys.filter(
            (key) => localStorage.getItem(key) === 'true',
        ).length;

        this.countTarget.textContent = String(count);
        this.labelTarget.textContent = count > 1
            ? 'articles favoris'
            : 'article favori';
        this.resetTarget.hidden = count === 0;
    }

    clear() {
        this.favoriteKeys.forEach((key) => localStorage.removeItem(key));
        window.dispatchEvent(new CustomEvent('favorites:cleared'));
        this.refresh();
    }

    get favoriteKeys() {
        return Object.keys(localStorage).filter(
            (key) => key.startsWith('favorite:'),
        );
    }
}
