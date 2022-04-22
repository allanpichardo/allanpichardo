export default class Footer {

    constructor(root) {
        this.root = root;

        this.header = document.querySelector('header');
        this.intersectionObserver = new IntersectionObserver(this.handleIntersection.bind(this));

        this.init();
    }

    init() {
        this.intersectionObserver.observe(this.root);
    }

    handleIntersection(entries) {
        entries.forEach(entry => {
            this.header.classList.toggle('invisible', entry.isIntersecting);
        });
    }
}