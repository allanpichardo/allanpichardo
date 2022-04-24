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
}

document.addEventListener('DOMContentLoaded', () => {
  main();
});