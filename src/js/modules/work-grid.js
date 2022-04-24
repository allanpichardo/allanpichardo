import WorkCard from "./work-card";

export default class WorkGrid {

    constructor(root) {
        this.root = root;
        this.cards = [];
        this.intersectionObserver = new IntersectionObserver(this.handleIntersection.bind(this));

        this.root.querySelectorAll('.work-card').forEach(root => {
           this.cards.push(new WorkCard(root));
        });

        this.cards.forEach(card => {
            this.intersectionObserver.observe(card.root);
        });
    }

    handleIntersection(entries) {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                const source = entry.target.querySelector('video.thumbnail > source');
                if(source) {
                    source.src = source.dataset.src;
                    source.parentElement.load();
                    source.parentElement.addEventListener('loadeddata', () => {
                        entry.target.classList.remove('lazy');
                    });
                }

                const img = entry.target.querySelector('img.thumbnail')
                if(img) {
                    img.src = img.dataset.src;
                    img.addEventListener('load', () => {
                        entry.target.classList.remove('lazy');
                    });
                }

                this.intersectionObserver.unobserve(entry.target);
            }
        });
    }
}