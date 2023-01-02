export default class Navigation {

    constructor(root) {
        this.root = root;

        this.isOpen = false;

        this.toggleButton = this.root.querySelector('button.nav-toggle');
        this.navList = this.root.querySelector('ul.nav-list');

        this.init();
    }

    init() {
        this.toggleButton.addEventListener('click', () => {
            this.toggleMenu();
        });
        this.root.addEventListener('transitionend', () => {
            this.handleTransitionEnd();
        });
    }

    toggleMenu() {
        this.isOpen = !this.isOpen;
        this.root.classList.toggle('open', this.isOpen);
        this.toggleButton.setAttribute('aria-expanded', this.isOpen);
        this.navList.setAttribute('aria-hidden', !this.isOpen);
        document.body.classList.toggle('no-scroll', this.isOpen);
    }

    handleTransitionEnd() {
        document.body.dispatchEvent(new CustomEvent('navigation-toggle', {
            detail: {
                isOpen: this.isOpen
            }
        }));
    }
}