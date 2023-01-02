import '../scss/index.scss';

function main() {
    const navigationRoot = document.querySelector('.navigation');
    if(navigationRoot) {
        import('./modules/navigation').then(module => {
            const Navigation = module.default;
            window.navigation = new Navigation(navigationRoot);
        });
    }

    const footerRoot = document.querySelector('.footer');
    if(footerRoot) {
        import('./modules/footer').then(module => {
            const Footer = module.default;
            window.footer = new Footer(footerRoot);
        });
    }

    const workGrid = document.querySelector('.work-grid');
    if(workGrid) {
        import('./modules/work-grid').then(module => {
            const WorkGrid = module.default;
            window.workGrid = new WorkGrid(workGrid);
        });
    }

    const backgroundRoot = document.querySelector('.background');
    if(backgroundRoot) {
        import('./modules/background').then(module => {
            const Background = module.default;
            window.background = new Background(backgroundRoot);
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
  main();
});