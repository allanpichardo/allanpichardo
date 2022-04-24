export default class WorkCard {

    constructor(root) {
        this.root = root;

        this.image = this.root.querySelector('img.thumbnail')
        this.video = this.root.querySelector('video.thumbnail');
        if(this.video) {
            this.init();
        }
    }

    init() {
        this.video.addEventListener('mouseenter', () => {
            this.video.play();
        });
        this.video.addEventListener('mouseleave', () => {
            this.video.pause();
        });
    }
}